<?php
namespace Vendor\VnPay\Model;

use Magento\Payment\Model\Method\AbstractMethod;

class Payment extends AbstractMethod
{
    protected $_code = 'vnpay';

    public function getOrderPlaceRedirectUrl()
    {
        return '/vnpay/payment/redirect';
    }
}
