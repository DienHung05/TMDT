<?php
declare(strict_types=1);
namespace YourVendor\PVModern\Controller\Admin;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Controller\Result\RedirectFactory;

class Logout implements HttpGetActionInterface
{
    public function __construct(
        private readonly RequestInterface $request,
        private readonly RedirectFactory $redirectFactory
    ) {}

    public function execute()
    {
        setcookie('pv_admin', '', ['expires' => time() - 3600, 'path' => '/', 'httponly' => true, 'samesite' => 'Strict']);
        $redirect = $this->redirectFactory->create();
        $redirect->setPath('pvadmin/admin/login');
        return $redirect;
    }
}
