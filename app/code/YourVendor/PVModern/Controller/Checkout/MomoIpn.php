<?php
declare(strict_types=1);

namespace YourVendor\PVModern\Controller\Checkout;

use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\CsrfAwareActionInterface;
use Magento\Framework\App\Request\InvalidRequestException;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\Serialize\Serializer\Json;
use Magento\Sales\Api\OrderRepositoryInterface;
use Magento\Sales\Model\ResourceModel\Order\CollectionFactory as OrderCollectionFactory;
use Psr\Log\LoggerInterface;
use YourVendor\PVModern\Model\Checkout\OrderPaymentStatus;
use YourVendor\PVModern\Model\IntegrationConfig;

class MomoIpn implements HttpPostActionInterface, CsrfAwareActionInterface
{
    public function __construct(
        private readonly RequestInterface $request,
        private readonly JsonFactory $resultJsonFactory,
        private readonly Json $json,
        private readonly IntegrationConfig $integrationConfig,
        private readonly OrderCollectionFactory $orderCollectionFactory,
        private readonly OrderRepositoryInterface $orderRepository,
        private readonly LoggerInterface $logger
    ) {
    }

    public function execute()
    {
        $result = $this->resultJsonFactory->create();
        $payload = $this->readPayload();
        $isValid = $this->verifySignature($payload);
        if ($isValid) {
            $this->updateOrderPayment($payload);
        }

        $this->logger->info('[PVModern][MoMo] IPN received', [
            'valid' => $isValid,
            'result_code' => $payload['resultCode'] ?? null,
            'order_id' => $payload['orderId'] ?? null,
            'trans_id' => $payload['transId'] ?? null,
        ]);

        return $result->setData([
            'resultCode' => $isValid ? 0 : 1,
            'message' => $isValid ? 'Received' : 'Invalid signature',
        ]);
    }

    /**
     * @return array<string, mixed>
     */
    private function readPayload(): array
    {
        $raw = (string) $this->request->getContent();
        if ($raw !== '') {
            try {
                $decoded = $this->json->unserialize($raw);
                if (is_array($decoded)) {
                    return $decoded;
                }
            } catch (\Throwable) {
                return [];
            }
        }

        return $this->request->getParams();
    }

    /**
     * @param array<string, mixed> $payload
     */
    private function verifySignature(array $payload): bool
    {
        $config = $this->integrationConfig->getMomoConfig();
        $secret = (string) ($config['secret_key'] ?? '');
        $accessKey = (string) ($payload['accessKey'] ?? $config['access_key'] ?? '');
        $signature = (string) ($payload['signature'] ?? '');
        if ($secret === '' || $signature === '') {
            return false;
        }

        $raw = 'accessKey=' . $accessKey .
            '&amount=' . (string) ($payload['amount'] ?? '') .
            '&extraData=' . (string) ($payload['extraData'] ?? '') .
            '&message=' . (string) ($payload['message'] ?? '') .
            '&orderId=' . (string) ($payload['orderId'] ?? '') .
            '&orderInfo=' . (string) ($payload['orderInfo'] ?? '') .
            '&orderType=' . (string) ($payload['orderType'] ?? '') .
            '&partnerCode=' . (string) ($payload['partnerCode'] ?? '') .
            '&payType=' . (string) ($payload['payType'] ?? '') .
            '&requestId=' . (string) ($payload['requestId'] ?? '') .
            '&responseTime=' . (string) ($payload['responseTime'] ?? '') .
            '&resultCode=' . (string) ($payload['resultCode'] ?? '') .
            '&transId=' . (string) ($payload['transId'] ?? '');

        return hash_equals(hash_hmac('sha256', $raw, $secret), $signature);
    }

    /**
     * @param array<string, mixed> $payload
     */
    private function updateOrderPayment(array $payload): void
    {
        $incrementId = $this->extractIncrementId((string) ($payload['orderId'] ?? ''));
        if ($incrementId === '') {
            return;
        }

        $collection = $this->orderCollectionFactory->create();
        $collection->addFieldToFilter('increment_id', $incrementId);
        $collection->setPageSize(1);
        $order = $collection->getFirstItem();
        if (!$order || !$order->getId() || !$order->getPayment()) {
            return;
        }

        $isPaid = ((string) ($payload['resultCode'] ?? '')) === '0';
        $status = $isPaid ? OrderPaymentStatus::PAID : OrderPaymentStatus::FAILED;
        $payment = $order->getPayment();
        $payment->setAdditionalInformation('pvmodern_payment_status', $status);
        $payment->setAdditionalInformation('pvmodern_payment_gateway', 'momo');
        $payment->setAdditionalInformation('pvmodern_payment_transaction_id', (string) ($payload['transId'] ?? ''));
        $order->addCommentToStatusHistory(
            sprintf('MoMo IPN verified. Payment status: %s. Transaction: %s', $status, (string) ($payload['transId'] ?? ''))
        );
        $this->orderRepository->save($order);
    }

    private function extractIncrementId(string $gatewayOrderId): string
    {
        if (str_starts_with($gatewayOrderId, 'MOMO-')) {
            return substr($gatewayOrderId, 5);
        }

        return preg_replace('/[^A-Za-z0-9_-]/', '', $gatewayOrderId) ?: '';
    }

    public function createCsrfValidationException(RequestInterface $request): ?InvalidRequestException
    {
        return null;
    }

    public function validateForCsrf(RequestInterface $request): ?bool
    {
        return true;
    }
}
