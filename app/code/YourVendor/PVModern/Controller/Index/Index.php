<?php
namespace YourVendor\PVModern\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

/**
 * Generic page controller — the layout handle ( deals_index_index,
 * terms_index_index, privacy_index_index, cookies_index_index,
 * pcbuilder_index_index ) determines which template is rendered.
 */
class Index extends Action
{
    /** @var PageFactory */
    protected $resultPageFactory;

    public function __construct(Context $context, PageFactory $resultPageFactory)
    {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    public function execute()
    {
        return $this->resultPageFactory->create();
    }
}
