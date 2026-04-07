<?php
/**
<<<<<<< HEAD
 * Copyright 2015 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

namespace Magento\Sales\Model\Convert;

use Magento\TestFramework\Helper\Bootstrap;

/**
 * Class OrderTest
 */
class OrderTest extends \PHPUnit\Framework\TestCase
{
    /** @var Order */
    protected $_model;

    protected function setUp(): void
    {
        $this->_model = Bootstrap::getObjectManager()->create(\Magento\Sales\Model\Convert\Order::class);
    }

    /**
     * @magentoDataFixture Magento/Sales/_files/order.php
     */
    public function testConvertToCreditmemo()
    {
        /** @var \Magento\Sales\Model\Order $order */
        $order = Bootstrap::getObjectManager()->create(\Magento\Sales\Model\Order::class);
        $order->loadByIncrementId('100000001');
        //MAGETWO-45612 fix
        $order->setBaseShippingAmount(5);
        $this->assertNull($this->_model->toCreditmemo($order)->getBaseShippingAmount());
    }
}
