<?php
declare(strict_types=1);

namespace YourVendor\PVModern\Model;

use Magento\Sales\Api\Data\OrderInterface;

class PurchaseCodeGenerator
{
    public function generateFromOrder(OrderInterface $order): string
    {
        $seed = implode('|', array_filter([
            (string) $order->getIncrementId(),
            (string) $order->getEntityId(),
            (string) $order->getCustomerEmail(),
            'techieworld-purchase',
        ]));

        $raw = strtoupper(substr(hash('sha256', $seed), 0, 10));

        return substr($raw, 0, 5) . '-' . substr($raw, 5);
    }
}
