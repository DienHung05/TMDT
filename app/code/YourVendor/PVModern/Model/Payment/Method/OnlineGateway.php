<?php
declare(strict_types=1);

namespace YourVendor\PVModern\Model\Payment\Method;

class OnlineGateway extends \Magento\Payment\Model\Method\AbstractMethod
{
    protected $_code = 'pvmodern_onlinegateway';

    protected $_isOffline = true;
}
