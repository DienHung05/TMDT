<?php
declare(strict_types=1);

namespace YourVendor\PVModern\Controller\Adminhtml\Payments;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action
{
    public const ADMIN_RESOURCE = 'YourVendor_PVModern::payments';

    public function __construct(
        Context $context,
        private readonly PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
    }

    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('YourVendor_PVModern::payments');
        $resultPage->getConfig()->getTitle()->prepend(__('Xác nhận thanh toán'));
        return $resultPage;
    }
}
