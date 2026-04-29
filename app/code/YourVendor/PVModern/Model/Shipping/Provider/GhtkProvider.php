<?php
declare(strict_types=1);

namespace YourVendor\PVModern\Model\Shipping\Provider;

class GhtkProvider extends AbstractShippingProvider
{
    public function getCode(): string
    {
        return 'ghtk';
    }

    public function getLabel(): string
    {
        return 'Giao Hang Tiet Kiem (GHTK)';
    }

    protected function getBaseAmount(): float
    {
        return 3.60;
    }

    protected function getEtaRange(): array
    {
        return [2, 3];
    }

    protected function getProviderNote(): string
    {
        return 'Phủ sóng toàn quốc, giá cước hợp lý, phù hợp mọi khu vực.';
    }

    protected function getProviderBrand(): array
    {
        return ['color' => '#10b981', 'short_name' => 'GHTK', 'logo_key' => 'ghtk'];
    }
}
