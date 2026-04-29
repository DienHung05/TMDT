<?php
declare(strict_types=1);

namespace YourVendor\PVModern\Block\Checkout;

use Magento\Framework\Data\Form\FormKey;
use Magento\Framework\Serialize\Serializer\Json;
use Magento\Framework\View\Element\Template;
use YourVendor\PVModern\Model\Checkout\CheckoutService;

class Flow extends Template
{
    public function __construct(
        Template\Context $context,
        private readonly CheckoutService $checkoutService,
        private readonly FormKey $formKey,
        private readonly Json $serializer,
        array $data = []
    ) {
        parent::__construct($context, $data);
    }

    public function getFormKey(): string
    {
        return $this->formKey->getFormKey();
    }

    public function getSerializedBootstrap(): string
    {
        $payload = $this->checkoutService->buildCheckoutBootstrap() + [
            'form_key' => $this->getFormKey(),
        ];

        return $this->serializer->serialize($payload);
    }
}
