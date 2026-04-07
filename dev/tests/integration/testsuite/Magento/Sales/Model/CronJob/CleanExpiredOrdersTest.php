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
namespace Magento\Sales\Model\CronJob;

use Magento\TestFramework\Helper\Bootstrap;
use \Magento\Sales\Model\Order;

class CleanExpiredOrdersTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @magentoConfigFixture default sales/orders/delete_pending_after 0
     * @magentoConfigFixture current_store sales/orders/delete_pending_after 0
     * @magentoDataFixture Magento/Sales/_files/order_pending_payment.php
     */
    public function testExecute()
    {
        /** @var CleanExpiredOrders $job */
        $job = Bootstrap::getObjectManager()->create(\Magento\Sales\Model\CronJob\CleanExpiredOrders::class);
        $job->execute();

        /** @var Order $order */
        $order = Bootstrap::getObjectManager()->create(\Magento\Sales\Model\Order::class);
        $order->load('100000001', 'increment_id');
        $this->assertEquals(Order::STATE_CANCELED, $order->getStatus());
    }
}
