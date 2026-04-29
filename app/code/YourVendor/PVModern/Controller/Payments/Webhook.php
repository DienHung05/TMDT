<?php
declare(strict_types=1);

namespace YourVendor\PVModern\Controller\Payments;

use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\CsrfAwareActionInterface;
use Magento\Framework\App\Request\InvalidRequestException;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Controller\Result\JsonFactory;
use Psr\Log\LoggerInterface;
use YourVendor\PVModern\Model\IntegrationConfig;

class Webhook implements HttpPostActionInterface, CsrfAwareActionInterface
{
    public function __construct(
        private readonly RequestInterface $request,
        private readonly JsonFactory $resultJsonFactory,
        private readonly IntegrationConfig $integrationConfig,
        private readonly LoggerInterface $logger
    ) {
    }

    public function execute()
    {
        $body = (string) $this->request->getContent();
        $secret = (string) $this->integrationConfig->getString('PAYMENT_WEBHOOK_SECRET', '');
        $signature = (string) $this->request->getHeader('X-PVModern-Signature');

        if ($secret === '') {
            return $this->resultJsonFactory->create()->setHttpResponseCode(501)->setData([
                'success' => false,
                'message' => 'Generic payment webhook is not configured. Use MoMo/VNPay verified callbacks or set PAYMENT_WEBHOOK_SECRET.',
            ]);
        }

        $expected = hash_hmac('sha256', $body, $secret);
        if ($signature === '' || !hash_equals($expected, $signature)) {
            return $this->resultJsonFactory->create()->setHttpResponseCode(401)->setData([
                'success' => false,
                'message' => 'Invalid webhook signature.',
            ]);
        }

        $this->logger->info('[PVModern][Payments] generic webhook accepted');
        return $this->resultJsonFactory->create()->setData([
            'success' => true,
            'message' => 'Webhook accepted. Provider-specific status update should be handled in a payment adapter.',
        ]);
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
