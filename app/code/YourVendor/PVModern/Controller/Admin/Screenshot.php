<?php
declare(strict_types=1);
namespace YourVendor\PVModern\Controller\Admin;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\Response\Http as HttpResponse;
use Magento\Framework\Controller\Result\RawFactory;
use Magento\Framework\Filesystem\DirectoryList;
use YourVendor\PVModern\Helper\PaymentDb;

class Screenshot implements HttpGetActionInterface
{
    public function __construct(
        private readonly RequestInterface $request,
        private readonly RawFactory $rawFactory,
        private readonly DirectoryList $directoryList,
        private readonly PaymentDb $paymentDb,
        private readonly Login $loginHelper
    ) {}

    public function execute()
    {
        $raw = $this->rawFactory->create();
        if (!$this->loginHelper->isAuthenticated()) {
            return $raw->setHttpResponseCode(401)->setContents('Unauthorized');
        }

        $id = (int)($this->request->getParam('id') ?? 0);
        if ($id <= 0) { return $raw->setHttpResponseCode(400)->setContents('Bad request'); }

        $pvOrder = $this->paymentDb->findById($id);
        if (!$pvOrder || empty($pvOrder['screenshot_url'])) {
            return $raw->setHttpResponseCode(404)->setContents('Not found');
        }

        $pubPath = $this->directoryList->getPath('pub') . '/media/' . $pvOrder['screenshot_url'];
        if (!file_exists($pubPath) || !is_file($pubPath)) {
            return $raw->setHttpResponseCode(404)->setContents('File not found');
        }

        $ext = strtolower(pathinfo($pubPath, PATHINFO_EXTENSION));
        $mimeMap = ['jpg' => 'image/jpeg', 'jpeg' => 'image/jpeg', 'png' => 'image/png', 'webp' => 'image/webp', 'gif' => 'image/gif'];
        $mime = $mimeMap[$ext] ?? 'image/jpeg';

        $raw->setHeader('Content-Type', $mime);
        $raw->setHeader('Cache-Control', 'private, max-age=3600');
        $raw->setContents(file_get_contents($pubPath));
        return $raw;
    }
}
