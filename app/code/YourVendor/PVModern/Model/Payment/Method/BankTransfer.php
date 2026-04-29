<?php
declare(strict_types=1);

namespace YourVendor\PVModern\Model\Payment\Method;

class BankTransfer extends \Magento\Payment\Model\Method\AbstractMethod
{
    protected $_code = 'pvmodern_banktransfer';

    protected $_isOffline = true;
}
