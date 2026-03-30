<?php
namespace Vendor\VnPay\Controller\Payment;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;

class Response extends Action
{
    public function execute()
    {
        $response = $this->getRequest()->getParams();

        // TODO: xác thực vnp_SecureHash
        // Cập nhật trạng thái đơn hàng:
        // $order = $this->_objectManager->create('Magento\Sales\Model\Order')->loadByIncrementId($response['vnp_TxnRef']);
        // if($response['vnp_ResponseCode'] == '00') $order->setState('processing')->save();
        // else $order->setState('canceled')->save();
    }
}
