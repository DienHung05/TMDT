<?php
declare(strict_types=1);

namespace YourVendor\PVModern\Model\Payment\Provider;

use Psr\Log\LoggerInterface;
use YourVendor\PVModern\Api\PaymentProviderInterface;
use YourVendor\PVModern\Model\IntegrationConfig;

abstract class AbstractPaymentProvider implements PaymentProviderInterface
{
    public function __construct(
        protected readonly IntegrationConfig $integrationConfig,
        protected readonly LoggerInterface $logger
    ) {
    }

    public function isAvailable(array $context = []): bool
    {
        return true;
    }

    public function describeCheckoutMethod(array $context = []): array
    {
        return [
            'code' => $this->getCode(),
            'label' => $this->getLabel(),
            'method_code' => $this->getMethodCode(),
            'status_on_submit' => $this->getInitialStatus(),
        ];
    }
}
