<?php
declare(strict_types=1);

namespace YourVendor\PVModern\Controller\Payments;

use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\Request\InvalidRequestException;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\CsrfAwareActionInterface;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\Serialize\Serializer\Json;
use Magento\Sales\Model\ResourceModel\Order\CollectionFactory as OrderCollectionFactory;
use YourVendor\PVModern\Model\Payment\PaymentManager;

class Create implements HttpPostActionInterface, CsrfAwareActionInterface
{
    public function __construct(
        private readonly RequestInterface $request,
        private readonly JsonFactory $resultJsonFactory,
        private readonly Json $json,
        private readonly OrderCollectionFactory $orderCollectionFactory,
        private readonly PaymentManager $paymentManager
    ) {
    }

    public function execute()
    {
        $result = $this->resultJsonFactory->create();
        $payload = $this->readPayload();
        $method = strtolower(trim((string) ($payload['method'] ?? '')));
        $orderId = preg_replace('/[^A-Za-z0-9_-]/', '', (string) ($payload['orderId'] ?? $payload['order_id'] ?? '')) ?: '';
        $currency = strtoupper(trim((string) ($payload['currency'] ?? 'VND')));

        if (!in_array($method, ['bank', 'bank_transfer', 'card', 'wallet'], true)) {
            return $result->setHttpResponseCode(422)->setData(['success' => false, 'message' => 'Unsupported payment method.']);
        }
        if ($currency !== 'VND') {
            return $result->setHttpResponseCode(422)->setData(['success' => false, 'message' => 'Only VND is supported by this checkout flow.']);
        }

        $order = $orderId !== '' ? $this->findOrder($orderId) : null;
        $amount = $order ? (float) $order->getGrandTotal() : (float) ($payload['amount'] ?? 0);
        if ($amount <= 0) {
            return $result->setHttpResponseCode(422)->setData(['success' => false, 'message' => 'Invalid payment amount.']);
        }

        $providerCode = in_array($method, ['bank', 'bank_transfer'], true) ? 'bank_transfer' : 'online_gateway';
        $provider = $this->paymentManager->getProvider($providerCode);
        if (!$provider) {
            return $result->setHttpResponseCode(503)->setData(['success' => false, 'message' => 'Payment provider unavailable.']);
        }

        $gatewayChannel = $method === 'wallet'
            ? strtolower((string) ($payload['wallet'] ?? $payload['gateway_channel'] ?? 'momo'))
            : 'vnpay';
        $payment = $provider->initialize([
            'order_increment_id' => $order ? (string) $order->getIncrementId() : ($orderId ?: 'PENDING-' . time()),
            'amount' => $amount,
            'gateway_channel' => $gatewayChannel,
            'wallet_id' => $gatewayChannel,
            'bank_id' => (string) ($payload['bank_id'] ?? ''),
        ]);

        $reference = (string) ($payment['reference'] ?? ('PAY-' . time()));
        return $result->setData([
            'success' => true,
            'paymentId' => $reference,
            'orderId' => $order ? (string) $order->getIncrementId() : $orderId,
            'status' => (string) ($payment['status'] ?? 'pending'),
            'method' => $method,
            'amount' => $amount,
            'currency' => 'VND',
            'paymentUrl' => (string) ($payment['redirect_url'] ?? ''),
            'qrCodeUrl' => (string) ($payment['qr_code_url'] ?? ''),
            'qrPayload' => $this->buildQrPayload($method, $payment, $amount, $reference),
            'expiresAt' => gmdate('c', time() + 15 * 60),
            'mock' => (bool) ($payment['mock'] ?? !$order),
            'message' => $payment['message'] ?? ($order ? 'Payment session created.' : 'Demo payment session created; no order was marked paid.'),
        ]);
    }

    /**
     * @return array<string, mixed>
     */
    private function readPayload(): array
    {
        $raw = (string) $this->request->getContent();
        if ($raw === '') {
            return $this->request->getParams();
        }

        try {
            $decoded = $this->json->unserialize($raw);
            return is_array($decoded) ? $decoded : [];
        } catch (\Throwable) {
            return [];
        }
    }

    private function findOrder(string $incrementId): ?\Magento\Sales\Model\Order
    {
        $collection = $this->orderCollectionFactory->create();
        $collection->addFieldToFilter('increment_id', $incrementId);
        $collection->setPageSize(1);
        $order = $collection->getFirstItem();
        return $order && $order->getId() ? $order : null;
    }

    /**
     * @param array<string, mixed> $payment
     */
    private function buildQrPayload(string $method, array $payment, float $amount, string $reference): string
    {
        if (!in_array($method, ['bank', 'bank_transfer'], true)) {
            return (string) ($payment['qr_payload'] ?? '');
        }

        $instructions = (array) ($payment['instructions'] ?? []);
        return sprintf(
            'TECHIEWORLD|BANK=%s|ACCOUNT=%s|AMOUNT=%d|REF=%s',
            (string) ($instructions['bank_name'] ?? 'BANK'),
            (string) ($instructions['account_number'] ?? ''),
            (int) round($amount),
            (string) ($instructions['transfer_reference'] ?? $reference)
        );
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
