<?php
declare(strict_types=1);

namespace YourVendor\PVModern\Model\Shipping\Provider;

class GhnProvider extends AbstractShippingProvider
{
    public function getCode(): string
    {
        return 'ghn';
    }

    public function getLabel(): string
    {
        return 'Giao Hang Nhanh (GHN)';
    }

    protected function getBaseAmount(): float
    {
        return 4.20;
    }

    protected function getEtaRange(): array
    {
        return [1, 2];
    }

    protected function getProviderNote(): string
    {
        return 'Giao nhanh, ưu tiên nội thành và đơn hàng giá trị cao.';
    }

    protected function getProviderBrand(): array
    {
        return ['color' => '#f97316', 'short_name' => 'GHN', 'logo_key' => 'ghn'];
    }
}
