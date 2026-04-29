<?php
declare(strict_types=1);

namespace YourVendor\PVModern\Model;

class IntegrationConfig
{
    public function getString(string $key, ?string $default = null): ?string
    {
        $value = $_ENV[$key] ?? $_SERVER[$key] ?? getenv($key);
        if ($value === false || $value === null) {
            return $default;
        }

        $value = trim((string) $value);
        return $value === '' ? $default : $value;
    }

    public function getInt(string $key, int $default = 0): int
    {
        return (int) ($this->getString($key, (string) $default) ?? $default);
    }

    public function getBool(string $key, bool $default = false): bool
    {
        $value = $this->getString($key);
        if ($value === null) {
            return $default;
        }

        return in_array(strtolower($value), ['1', 'true', 'yes', 'on'], true);
    }

    public function isMockModeEnabled(string $scope): bool
    {
        $global = $this->getBool('PVMODERN_CHECKOUT_MOCK', true);

        if ($scope === 'shipping') {
            return $this->getBool('PVMODERN_SHIPPING_MOCK', $global);
        }

        if ($scope === 'payment') {
            return $this->getBool('PVMODERN_PAYMENT_MOCK', $global);
        }

        return $global;
    }

    public function getShippingToken(string $provider): ?string
    {
        return $this->getString(strtoupper($provider) . '_API_TOKEN');
    }

    public function getShippingShopId(string $provider): ?string
    {
        return $this->getString(strtoupper($provider) . '_SHOP_ID');
    }

    /**
     * @return array<string, string>
     */
    public function getBankTransferDetails(): array
    {
        return [
            'account_name' => $this->getString('PVMODERN_BANK_ACCOUNT_NAME', 'TECHIEWORLD CO., LTD.') ?? 'TECHIEWORLD CO., LTD.',
            'account_number' => $this->getString('PVMODERN_BANK_ACCOUNT_NUMBER', '0123 456 789 012') ?? '0123 456 789 012',
            'bank_name' => $this->getString('PVMODERN_BANK_NAME', 'Vietcombank') ?? 'Vietcombank',
            'branch' => $this->getString('PVMODERN_BANK_BRANCH', 'Tech District Branch') ?? 'Tech District Branch',
            'note_prefix' => $this->getString('PVMODERN_BANK_TRANSFER_PREFIX', 'TW') ?? 'TW',
        ];
    }

    /**
     * @return array<string, string>
     */
    public function getGatewayConfig(): array
    {
        return [
            'merchant_code' => $this->getString('PVMODERN_GATEWAY_MERCHANT_CODE', 'sandbox-techieworld') ?? 'sandbox-techieworld',
            'public_key' => $this->getString('PVMODERN_GATEWAY_PUBLIC_KEY', 'mock-public-key') ?? 'mock-public-key',
            'callback_url' => $this->getString('PVMODERN_GATEWAY_CALLBACK_URL', '/pvmodern/checkout/callback') ?? '/pvmodern/checkout/callback',
        ];
    }

    /**
     * @return array<string, string|null>
     */
    public function getMomoConfig(): array
    {
        return [
            'endpoint' => $this->getString('MOMO_ENDPOINT', 'https://test-payment.momo.vn/v2/gateway/api/create'),
            'partner_code' => $this->getString('MOMO_PARTNER_CODE'),
            'access_key' => $this->getString('MOMO_ACCESS_KEY'),
            'secret_key' => $this->getString('MOMO_SECRET_KEY'),
            'redirect_url' => $this->getString('MOMO_REDIRECT_URL', $this->getString('PVMODERN_GATEWAY_RETURN_URL', '/pvmodern/checkout/momoReturn')),
            'ipn_url' => $this->getString('MOMO_IPN_URL', $this->getString('PVMODERN_GATEWAY_IPN_URL', '/pvmodern/checkout/momoIpn')),
            'request_type' => $this->getString('MOMO_REQUEST_TYPE', 'captureWallet'),
        ];
    }

    /**
     * @return array<string, string|null>
     */
    public function getVnpayConfig(): array
    {
        return [
            'payment_url' => $this->getString('VNPAY_PAYMENT_URL', 'https://sandbox.vnpayment.vn/paymentv2/vpcpay.html'),
            'tmn_code' => $this->getString('VNPAY_TMN_CODE'),
            'hash_secret' => $this->getString('VNPAY_HASH_SECRET'),
            'return_url' => $this->getString('VNPAY_RETURN_URL', $this->getString('PVMODERN_GATEWAY_RETURN_URL', '/pvmodern/checkout/vnpayReturn')),
            'locale' => $this->getString('VNPAY_LOCALE', 'vn'),
        ];
    }
}
