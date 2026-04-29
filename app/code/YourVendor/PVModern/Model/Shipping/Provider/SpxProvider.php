<?php
declare(strict_types=1);

namespace YourVendor\PVModern\Model\Shipping\Provider;

class SpxProvider extends AbstractShippingProvider
{
    public function getCode(): string
    {
        return 'spx';
    }

    public function getLabel(): string
    {
        return 'Shopee Express (SPX)';
    }

    protected function getBaseAmount(): float
    {
        return 3.85;
    }

    protected function getEtaRange(): array
    {
        return [2, 4];
    }

    protected function getProviderNote(): string
    {
        return 'Tiết kiệm chi phí, phù hợp đơn hàng tiêu dùng hàng ngày.';
    }

    protected function getProviderBrand(): array
    {
        return ['color' => '#ee4d2d', 'short_name' => 'SPX', 'logo_key' => 'spx'];
    }
}
