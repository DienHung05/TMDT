<?php
declare(strict_types=1);

namespace YourVendor\PVModern\Controller\CurrencyRate;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\View\Result\PageFactory;

class Index implements HttpGetActionInterface
{
    public function __construct(private readonly PageFactory $resultPageFactory)
    {
    }

    public function execute()
    {
        $page = $this->resultPageFactory->create();
        $page->getConfig()->getTitle()->set(__('Currency Rate'));
        return $page;
    }
}
