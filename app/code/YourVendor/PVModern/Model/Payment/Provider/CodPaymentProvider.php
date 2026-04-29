<?php
declare(strict_types=1);

namespace YourVendor\PVModern\Model\Payment\Provider;

use YourVendor\PVModern\Model\Checkout\OrderPaymentStatus;

class CodPaymentProvider extends AbstractPaymentProvider
{
    public function getCode(): string
    {
        return 'cod';
    }

    public function getLabel(): string
    {
        return 'Cash on Delivery';
    }

    public function getMethodCode(): string
    {
        return 'pvmodern_cod';
    }

    public function getInitialStatus(): string
    {
        return OrderPaymentStatus::COD_PENDING;
    }

    public function initialize(array $context): array
    {
        return [
            'status' => $this->getInitialStatus(),
            'label' => $this->getLabel(),
            'message' => 'Collect cash when the shipment is handed to the customer.',
            'mock' => true,
        ];
    }
}
