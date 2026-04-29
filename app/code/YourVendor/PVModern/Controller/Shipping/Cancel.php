<?php
declare(strict_types=1);

namespace YourVendor\PVModern\Controller\Shipping;

use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\CsrfAwareActionInterface;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\App\Request\InvalidRequestException;
use YourVendor\PVModern\Model\Shipping\ShippingManager;

class Cancel implements HttpPostActionInterface, CsrfAwareActionInterface
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
        $shipmentId = (string) $this->request->getParam('shipment_id', '');

        return $this->resultJsonFactory->create()->setData(
            $this->shippingManager->cancel($provider, $shipmentId)
        );
    }

    public function createCsrfValidationException(RequestInterface $request): ?InvalidRequestException
    {
        return null;
    }

    public function validateForCsrf(RequestInterface $request): ?bool
    {
        return true;
    }
}
