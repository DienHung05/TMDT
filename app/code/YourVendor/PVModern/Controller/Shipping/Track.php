<?php
declare(strict_types=1);

namespace YourVendor\PVModern\Controller\Shipping;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Controller\Result\JsonFactory;
use YourVendor\PVModern\Model\Shipping\ShippingManager;

class Track implements HttpGetActionInterface
{
    public function __construct(
        private readonly RequestInterface $request,
        private readonly JsonFactory $resultJsonFactory,
        private readonly ShippingManager $shippingManager
    ) {
    }

    public function execute()
    {
        $provider = (string) $this->request->getParam('provider', '');
        $trackingNumber = (string) $this->request->getParam('tracking_number', '');

        return $this->resultJsonFactory->create()->setData(
            $this->shippingManager->track($provider, $trackingNumber)
        );
    }
}
