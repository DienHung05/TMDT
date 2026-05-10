<?php
declare(strict_types=1);

namespace YourVendor\PVModern\Controller\Adminhtml\Payments;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\Serialize\Serializer\Json;
use YourVendor\PVModern\Helper\PaymentDb;

class Reject extends Action
{
    public const ADMIN_RESOURCE = 'YourVendor_PVModern::payments';

    public function __construct(
        Context $context,
        private readonly JsonFactory $resultJsonFactory,
        private readonly Json $json,
        private readonly PaymentDb $paymentDb
    ) {
        parent::__construct($context);
    }

    public function execute()
    {
        $result = $this->resultJsonFactory->create();

        try {
            $body = $this->json->unserialize((string)$this->getRequest()->getContent());
        } catch (\Throwable) {
            $body = [];
        }

        $id   = (int)($body['id'] ?? $this->getRequest()->getParam('id') ?? 0);
        $note = (string)($body['note'] ?? 'Rejected by admin');

        if ($id <= 0) {
            return $result->setHttpResponseCode(400)->setData(['success' => false, 'message' => 'Invalid order ID']);
        }

        $pvOrder = $this->paymentDb->findById($id);
        if (!$pvOrder) {
            return $result->setHttpResponseCode(404)->setData(['success' => false, 'message' => 'Order not found']);
        }

        $adminUser = $this->_auth->getUser()->getUserName();

        $this->paymentDb->updateOrder($id, [
            'payment_status' => 'failed',
            'admin_note'     => $note,
        ]);

        $this->paymentDb->logVerification([
            'pv_order_id'    => $id,
            'source'         => 'manual_admin',
            'amount'         => (float)$pvOrder['total_amount'],
            'transaction_id' => null,
            'raw_payload'    => null,
            'admin_user'     => $adminUser,
            'note'           => 'Rejected. ' . $note,
        ]);

        return $result->setData(['success' => true, 'message' => 'Đã từ chối thanh toán']);
    }
}
