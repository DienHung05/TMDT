<?php
declare(strict_types=1);
namespace YourVendor\PVModern\Controller\Admin;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\CsrfAwareActionInterface;
use Magento\Framework\App\Request\InvalidRequestException;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Controller\Result\RawFactory;
use Magento\Framework\Controller\Result\RedirectFactory;
use Magento\Framework\App\DeploymentConfig;
use Magento\Framework\App\Response\Http as HttpResponse;

class Login implements HttpGetActionInterface, HttpPostActionInterface, CsrfAwareActionInterface
{
    public function __construct(
        private readonly RequestInterface $request,
        private readonly RawFactory $rawFactory,
        private readonly RedirectFactory $redirectFactory,
        private readonly DeploymentConfig $deploymentConfig,
        private readonly HttpResponse $response
    ) {}

    public function createCsrfValidationException(RequestInterface $request): ?InvalidRequestException { return null; }
    public function validateForCsrf(RequestInterface $request): ?bool { return true; }

    public function execute()
    {
        if ($this->request->isPost()) {
            $password = (string)($this->request->getParam('password') ?? '');
            $adminPassword = (string)$this->deploymentConfig->get('pvmodern/admin_password', 'pvadmin123');

            if (hash_equals($adminPassword, $password)) {
                $token = $this->makeToken($adminPassword);
                setcookie('pv_admin', $token, [
                    'expires' => time() + 86400,
                    'path' => '/',
                    'httponly' => true,
                    'samesite' => 'Strict',
                ]);
                $redirect = $this->redirectFactory->create();
                $redirect->setPath('pvadmin/admin/dashboard');
                return $redirect;
            }
            return $this->renderLogin('Mật khẩu không đúng.');
        }

        if ($this->isAuthenticated()) {
            $redirect = $this->redirectFactory->create();
            $redirect->setPath('pvadmin/admin/dashboard');
            return $redirect;
        }
        return $this->renderLogin();
    }

    public function isAuthenticated(): bool
    {
        $adminPassword = (string)$this->deploymentConfig->get('pvmodern/admin_password', 'pvadmin123');
        $cookie = $_COOKIE['pv_admin'] ?? '';
        $expected = $this->makeToken($adminPassword);
        return $cookie !== '' && hash_equals($expected, $cookie);
    }

    private function makeToken(string $password): string
    {
        $day = (string)floor(time() / 86400);
        return hash_hmac('sha256', 'pvadmin_' . $day, $password);
    }

    private function renderLogin(string $error = ''): \Magento\Framework\Controller\Result\Raw
    {
        $raw = $this->rawFactory->create();
        $raw->setHeader('Content-Type', 'text/html; charset=utf-8');
        $errHtml = $error ? '<div class="pva-error">' . htmlspecialchars($error) . '</div>' : '';
        $raw->setContents('<!DOCTYPE html><html lang="vi"><head><meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>PVModern Admin Login</title>
<style>
*{box-sizing:border-box;margin:0;padding:0}
body{min-height:100vh;display:flex;align-items:center;justify-content:center;background:#0f172a;font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",sans-serif}
.login-card{background:#1e293b;border:1px solid #334155;border-radius:16px;padding:40px 36px;width:100%;max-width:380px;box-shadow:0 20px 60px rgba(0,0,0,.5)}
.login-logo{text-align:center;margin-bottom:28px}
.login-logo .logo-ring{display:inline-flex;align-items:center;justify-content:center;width:56px;height:56px;background:linear-gradient(135deg,#3b82f6,#8b5cf6);border-radius:14px;font-size:24px;margin-bottom:12px}
.login-logo h1{color:#f1f5f9;font-size:20px;font-weight:700}
.login-logo p{color:#94a3b8;font-size:13px;margin-top:4px}
.pva-error{background:#450a0a;border:1px solid #dc2626;color:#fca5a5;padding:10px 14px;border-radius:8px;font-size:13px;margin-bottom:16px}
label{display:block;color:#cbd5e1;font-size:13px;font-weight:500;margin-bottom:6px}
input[type=password]{width:100%;padding:10px 14px;background:#0f172a;border:1px solid #475569;border-radius:8px;color:#f1f5f9;font-size:14px;outline:none;transition:border-color .2s}
input[type=password]:focus{border-color:#3b82f6}
.login-btn{width:100%;margin-top:20px;padding:11px;background:linear-gradient(135deg,#3b82f6,#8b5cf6);border:none;border-radius:8px;color:#fff;font-size:15px;font-weight:600;cursor:pointer;transition:opacity .2s}
.login-btn:hover{opacity:.9}
.login-hint{text-align:center;color:#64748b;font-size:12px;margin-top:16px}
</style></head>
<body>
<div class="login-card">
  <div class="login-logo">
    <div class="logo-ring">🔐</div>
    <h1>PVModern Admin</h1>
    <p>Cổng xác nhận thanh toán</p>
  </div>
  ' . $errHtml . '
  <form method="post" action="/pvadmin/admin/login">
    <label>Mật khẩu quản trị</label>
    <input type="password" name="password" placeholder="Nhập mật khẩu..." autofocus required>
    <button type="submit" class="login-btn">Đăng nhập →</button>
  </form>
  <p class="login-hint">Cấu hình mật khẩu trong env.php → pvmodern/admin_password</p>
</div>
</body></html>');
        return $raw;
    }
}
