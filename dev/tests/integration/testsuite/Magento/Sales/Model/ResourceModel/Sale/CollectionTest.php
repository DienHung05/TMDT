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
namespace Magento\Sales\Model\ResourceModel\Sale;

use Magento\TestFramework\Helper\Bootstrap;

class CollectionTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @magentoDataFixture Magento/Sales/_files/order_with_customer.php
     */
    public function testSetCustomerFilter()
    {
        $collectionModel = Bootstrap::getObjectManager()->create(
            \Magento\Sales\Model\ResourceModel\Sale\Collection::class
        );
        $this->assertEquals(1, $collectionModel->setCustomerIdFilter(1)->count());
        $collectionModel = Bootstrap::getObjectManager()->create(
            \Magento\Sales\Model\ResourceModel\Sale\Collection::class
        );
        $this->assertEquals(0, $collectionModel->setCustomerIdFilter(2)->count());
    }
}
