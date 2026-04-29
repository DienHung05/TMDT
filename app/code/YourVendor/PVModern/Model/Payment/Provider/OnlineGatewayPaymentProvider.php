<?php
declare(strict_types=1);

namespace YourVendor\PVModern\Model\Payment\Provider;

use YourVendor\PVModern\Model\Checkout\OrderPaymentStatus;

class OnlineGatewayPaymentProvider extends AbstractPaymentProvider
{
    public function getCode(): string
    {
        return 'online_gateway';
    }

    public function getLabel(): string
    {
        return 'Online Payment Gateway';
    }

    public function getMethodCode(): string
    {
        return 'pvmodern_onlinegateway';
    }

    public function getInitialStatus(): string
    {
        return OrderPaymentStatus::AWAITING_PAYMENT;
    }

    public function describeCheckoutMethod(array $context = []): array
    {
        return parent::describeCheckoutMethod($context) + [
            'description' => 'Gateway abstraction for future VNPay, MoMo, ZaloPay, or card processing.',
        ];
    }

    public function initialize(array $context): array
    {
        $config = $this->integrationConfig->getGatewayConfig();
        $isMock = $this->integrationConfig->isMockModeEnabled('payment');
        $increment = $context['order_increment_id'] ?? 'PENDING';
        $channel = strtolower((string) ($context['gateway_channel'] ?? $context['wallet_id'] ?? 'vnpay'));
        $amount = max(1000, (int) round((float) ($context['amount'] ?? 0)));

        if ($channel === 'momo') {
            return $this->initializeMomo($increment, $amount, $isMock);
        }

        if ($channel === 'vnpay') {
            return $this->initializeVnpay($increment, $amount, $isMock);
        }

        return [
            'status' => $this->getInitialStatus(),
            'label' => $this->getLabel(),
            'redirect_url' => $isMock ? '' : '/todo-live-gateway-redirect',
            'reference' => sprintf('GW-%s-%s', $config['merchant_code'], $increment),
            'message' => $isMock
                ? 'Mock gateway initialized. Replace with a live redirect/init endpoint when credentials are ready.'
                : 'Gateway initialized.',
            'mock' => $isMock,
        ];
    }

    private function initializeVnpay(string $increment, int $amount, bool $isMock): array
    {
        $config = $this->integrationConfig->getVnpayConfig();
        $hasCredentials = !empty($config['tmn_code']) && !empty($config['hash_secret']);
        $reference = 'VNPAY-' . $increment;

        if ($isMock || !$hasCredentials) {
            return [
                'status' => $this->getInitialStatus(),
                'label' => 'VNPay',
                'provider' => 'vnpay',
                'redirect_url' => '',
                'reference' => $reference,
                'message' => 'VNPay is in mock mode. Set VNPAY_TMN_CODE, VNPAY_HASH_SECRET, VNPAY_PAYMENT_URL, VNPAY_RETURN_URL for live payment URLs.',
                'mock' => true,
            ];
        }

        $params = [
            'vnp_Version' => '2.1.0',
            'vnp_Command' => 'pay',
            'vnp_TmnCode' => (string) $config['tmn_code'],
            'vnp_Amount' => (string) ($amount * 100),
            'vnp_CurrCode' => 'VND',
            'vnp_TxnRef' => preg_replace('/[^A-Za-z0-9_-]/', '', $increment) ?: (string) time(),
            'vnp_OrderInfo' => 'Thanh toan don hang ' . $increment,
            'vnp_OrderType' => 'other',
            'vnp_Locale' => (string) ($config['locale'] ?: 'vn'),
            'vnp_ReturnUrl' => (string) $config['return_url'],
            'vnp_IpAddr' => $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1',
            'vnp_CreateDate' => date('YmdHis'),
            'vnp_ExpireDate' => date('YmdHis', time() + 15 * 60),
        ];

        ksort($params);
        $hashData = [];
        $query = [];
        foreach ($params as $key => $value) {
            $hashData[] = urlencode((string) $key) . '=' . urlencode((string) $value);
            $query[] = urlencode((string) $key) . '=' . urlencode((string) $value);
        }

        $secureHash = hash_hmac('sha512', implode('&', $hashData), (string) $config['hash_secret']);
        $redirectUrl = rtrim((string) $config['payment_url'], '?') . '?' . implode('&', $query) . '&vnp_SecureHash=' . $secureHash;

        return [
            'status' => $this->getInitialStatus(),
            'label' => 'VNPay',
            'provider' => 'vnpay',
            'redirect_url' => $redirectUrl,
            'reference' => $reference,
            'message' => 'VNPay payment URL created.',
            'mock' => false,
        ];
    }

    private function initializeMomo(string $increment, int $amount, bool $isMock): array
    {
        $config = $this->integrationConfig->getMomoConfig();
        $hasCredentials = !empty($config['partner_code']) && !empty($config['access_key']) && !empty($config['secret_key']);
        $reference = 'MOMO-' . $increment;

        if ($isMock || !$hasCredentials) {
            return [
                'status' => $this->getInitialStatus(),
                'label' => 'MoMo',
                'provider' => 'momo',
                'redirect_url' => '',
                'reference' => $reference,
                'message' => 'MoMo is in mock mode. Set MOMO_PARTNER_CODE, MOMO_ACCESS_KEY, MOMO_SECRET_KEY, MOMO_ENDPOINT, MOMO_REDIRECT_URL, MOMO_IPN_URL for live payUrl creation.',
                'mock' => true,
            ];
        }

        $requestId = $reference . '-' . time();
        $orderId = preg_replace('/[^A-Za-z0-9_.-]/', '', $reference) ?: $requestId;
        $extraData = base64_encode(json_encode(['order' => $increment], JSON_UNESCAPED_SLASHES));
        $rawSignature = sprintf(
            'accessKey=%s&amount=%s&extraData=%s&ipnUrl=%s&orderId=%s&orderInfo=%s&partnerCode=%s&redirectUrl=%s&requestId=%s&requestType=%s',
            $config['access_key'],
            $amount,
            $extraData,
            $config['ipn_url'],
            $orderId,
            'Thanh toan don hang ' . $increment,
            $config['partner_code'],
            $config['redirect_url'],
            $requestId,
            $config['request_type']
        );

        $payload = [
            'partnerCode' => $config['partner_code'],
            'accessKey' => $config['access_key'],
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => 'Thanh toan don hang ' . $increment,
            'redirectUrl' => $config['redirect_url'],
            'ipnUrl' => $config['ipn_url'],
            'extraData' => $extraData,
            'requestType' => $config['request_type'],
            'lang' => 'vi',
            'signature' => hash_hmac('sha256', $rawSignature, (string) $config['secret_key']),
        ];

        $response = $this->postJson((string) $config['endpoint'], $payload);
        $payUrl = (string) ($response['payUrl'] ?? $response['shortLink'] ?? '');

        return [
            'status' => $this->getInitialStatus(),
            'label' => 'MoMo',
            'provider' => 'momo',
            'redirect_url' => $payUrl,
            'reference' => $reference,
            'message' => $payUrl !== '' ? 'MoMo payUrl created.' : 'MoMo did not return a payUrl.',
            'mock' => false,
            'gateway_response' => $response,
        ];
    }

    /**
     * @param array<string, mixed> $payload
     * @return array<string, mixed>
     */
    private function postJson(string $url, array $payload): array
    {
        if (!function_exists('curl_init')) {
            return [];
        }

        $ch = curl_init($url);
        if (!$ch) {
            return [];
        }

        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_HTTPHEADER => ['Content-Type: application/json'],
            CURLOPT_POSTFIELDS => json_encode($payload, JSON_UNESCAPED_SLASHES),
            CURLOPT_TIMEOUT => 12,
        ]);

        $body = curl_exec($ch);
        curl_close($ch);

        $decoded = json_decode((string) $body, true);
        return is_array($decoded) ? $decoded : [];
    }
}
