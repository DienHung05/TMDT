<?php
declare(strict_types=1);

namespace YourVendor\PVModern\Controller\Checkout;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Controller\Result\RedirectFactory;
use Psr\Log\LoggerInterface;
use YourVendor\PVModern\Model\IntegrationConfig;

class MomoReturn implements HttpGetActionInterface
{
    public function __construct(
        private readonly RequestInterface $request,
        private readonly RedirectFactory $redirectFactory,
        private readonly IntegrationConfig $integrationConfig,
        private readonly LoggerInterface $logger
    ) {
    }

    public function execute()
    {
        $params = $this->request->getParams();
        $isValid = $this->verifySignature($params);
        $isPaid = $isValid && ((string) ($params['resultCode'] ?? '')) === '0';

        $this->logger->info('[PVModern][MoMo] return received', [
            'valid' => $isValid,
            'result_code' => $params['resultCode'] ?? null,
            'order_id' => $params['orderId'] ?? null,
            'trans_id' => $params['transId'] ?? null,
        ]);

        return $this->redirectFactory->create()->setPath('checkout', [
            '_query' => [
                'payment_result' => $isPaid ? 'success' : 'failed',
                'gateway' => 'momo',
                'txn' => (string) ($params['orderId'] ?? ''),
            ],
        ]);
    }

    /**
     * @param array<string, mixed> $payload
     */
    private function verifySignature(array $payload): bool
    {
        $config = $this->integrationConfig->getMomoConfig();
        $secret = (string) ($config['secret_key'] ?? '');
        $signature = (string) ($payload['signature'] ?? '');
        if ($secret === '' || $signature === '') {
            return false;
        }

        $raw = 'accessKey=' . (string) ($payload['accessKey'] ?? $config['access_key'] ?? '') .
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
}
