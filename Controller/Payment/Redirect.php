<?php
namespace Vendor\VnPay\Controller\Payment;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;

class Redirect extends Action
{
    protected $checkoutSession;

    public function __construct(
        Context $context,
        \Magento\Checkout\Model\Session $checkoutSession
    ) {
        $this->checkoutSession = $checkoutSession;
        parent::__construct($context);
    }

    public function execute()
    {
        $order = $this->checkoutSession->getLastRealOrder();

        $vnp_TmnCode = '1GDLWWBH';
        $vnp_HashSecret = 'XY13KAZQ9DQBITTWR15KC0EMH6368CZP';
        $vnp_Url = 'https://sandbox.vnpayment.vn/paymentv2/vpcpay.html';

        $vnp_TxnRef = $order->getIncrementId();
        $vnp_Amount = $order->getGrandTotal() * 100;
        $vnp_OrderInfo = 'Thanh toan don hang ' . $vnp_TxnRef;
        $vnp_ReturnUrl = $this->_url->getUrl('vnpay/payment/response');

        $inputData = [
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_Create" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $_SERVER['REMOTE_ADDR'],
            "vnp_Locale" => "vn",
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => "other",
            "vnp_ReturnUrl" => $vnp_ReturnUrl,
            "vnp_TxnRef" => $vnp_TxnRef
        ];

        ksort($inputData);

        $hashdata = "";
        $query = "";

        foreach ($inputData as $key => $value) {
            if ($hashdata != "") {
                $hashdata .= '&';
                $query .= '&';
            }

            // hash (raw)
            $hashdata .= $key . "=" . $value;

            // encode + replace space -> +
            $encodedValue = urlencode($value);
            $encodedValue = str_replace('%20', '+', $encodedValue);

            $query .= urlencode($key) . "=" . $encodedValue;
        }

// hash
        $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);

// final url
        $vnp_Url = $vnp_Url
            . "?" . $query
            . "&vnp_SecureHashType=SHA512"
            . "&vnp_SecureHash=" . $vnpSecureHash;

        return $this->resultFactory->create(ResultFactory::TYPE_REDIRECT)->setUrl($vnp_Url);
    }
}
