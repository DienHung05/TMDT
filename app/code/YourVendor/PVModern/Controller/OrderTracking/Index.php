<?php
declare(strict_types=1);

namespace YourVendor\PVModern\Controller\OrderTracking;

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
        $page->getConfig()->getTitle()->set(__('Theo dõi đơn hàng'));
        return $page;
    }
}
