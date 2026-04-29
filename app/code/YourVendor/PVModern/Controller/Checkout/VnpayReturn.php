<?php
declare(strict_types=1);

namespace YourVendor\PVModern\Controller\Checkout;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Controller\Result\RedirectFactory;
use Psr\Log\LoggerInterface;
use YourVendor\PVModern\Model\IntegrationConfig;

class VnpayReturn implements HttpGetActionInterface
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
        $isPaid = $isValid && (($params['vnp_ResponseCode'] ?? '') === '00');

        $this->logger->info('[PVModern][VNPay] return received', [
            'valid' => $isValid,
            'response_code' => $params['vnp_ResponseCode'] ?? null,
            'txn_ref' => $params['vnp_TxnRef'] ?? null,
        ]);

        return $this->redirectFactory->create()->setPath('checkout', [
            '_query' => [
                'payment_result' => $isPaid ? 'success' : 'failed',
                'gateway' => 'vnpay',
                'txn' => (string) ($params['vnp_TxnRef'] ?? ''),
            ],
        ]);
    }

    /**
     * @param array<string, mixed> $params
     */
    private function verifySignature(array $params): bool
    {
        $secret = (string) ($this->integrationConfig->getVnpayConfig()['hash_secret'] ?? '');
        $secureHash = (string) ($params['vnp_SecureHash'] ?? '');
        if ($secret === '' || $secureHash === '') {
            return false;
        }

        unset($params['vnp_SecureHash'], $params['vnp_SecureHashType']);
        ksort($params);

        $pairs = [];
        foreach ($params as $key => $value) {
            if (str_starts_with((string) $key, 'vnp_') && $value !== '' && $value !== null) {
                $pairs[] = (string) $key . '=' . urlencode((string) $value);
            }
        }

        $expected = hash_hmac('sha512', implode('&', $pairs), $secret);
        return hash_equals(strtolower($expected), strtolower($secureHash));
    }
}
