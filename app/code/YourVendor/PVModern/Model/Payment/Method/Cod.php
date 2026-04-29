<?php
declare(strict_types=1);

namespace YourVendor\PVModern\Model\Payment\Method;

class Cod extends \Magento\Payment\Model\Method\AbstractMethod
{
    protected $_code = 'pvmodern_cod';

    protected $_isOffline = true;
}
