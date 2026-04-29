<?php
declare(strict_types=1);

namespace YourVendor\PVModern\Controller\Currency;

use Magento\Framework\App\RequestInterface;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\View\Asset\Repository as AssetRepository;

class Latest extends \YourVendor\PVModern\Controller\Api\Currency
{
    public function __construct(
        private readonly RequestInterface $aliasRequest,
        JsonFactory $resultJsonFactory,
        AssetRepository $assetRepository
    ) {
        parent::__construct($aliasRequest, $resultJsonFactory, $assetRepository);
    }

    public function execute()
    {
        $this->aliasRequest->setParam('mode', 'latest');
        return parent::execute();
    }
}
