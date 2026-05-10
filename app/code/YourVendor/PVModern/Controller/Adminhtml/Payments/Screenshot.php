<?php
declare(strict_types=1);

namespace YourVendor\PVModern\Controller\Adminhtml\Payments;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\Result\RawFactory;
use Magento\Framework\Filesystem\DirectoryList;
use YourVendor\PVModern\Helper\PaymentDb;

class Screenshot extends Action
{
    public const ADMIN_RESOURCE = 'YourVendor_PVModern::payments';

    public function __construct(
        Context $context,
        private readonly RawFactory $rawFactory,
        private readonly DirectoryList $directoryList,
        private readonly PaymentDb $paymentDb
    ) {
        parent::__construct($context);
    }

    public function execute()
    {
        $raw = $this->rawFactory->create();
        $id  = (int)$this->getRequest()->getParam('id');

        if ($id <= 0) {
            return $raw->setHttpResponseCode(400)->setContents('Bad request');
        }

        $pvOrder = $this->paymentDb->findById($id);
        if (!$pvOrder || empty($pvOrder['screenshot_url'])) {
            return $raw->setHttpResponseCode(404)->setContents('No screenshot for this order');
        }

        $filePath = $this->directoryList->getPath('pub') . '/media/' . $pvOrder['screenshot_url'];
        if (!is_file($filePath)) {
            return $raw->setHttpResponseCode(404)->setContents('File not found on disk');
        }

        $ext      = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));
        $mimeMap  = ['jpg' => 'image/jpeg', 'jpeg' => 'image/jpeg', 'png' => 'image/png', 'webp' => 'image/webp', 'gif' => 'image/gif'];
        $mime     = $mimeMap[$ext] ?? 'application/octet-stream';

        $raw->setHeader('Content-Type', $mime, true);
        $raw->setHeader('Cache-Control', 'private, max-age=3600', true);
        $raw->setHeader('Content-Disposition', 'inline; filename="proof-' . $id . '.' . $ext . '"', true);
        $raw->setContents((string)file_get_contents($filePath));
        return $raw;
    }
}
