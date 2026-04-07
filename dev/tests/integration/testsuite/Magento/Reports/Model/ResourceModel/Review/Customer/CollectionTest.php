<?php
/**
<<<<<<< HEAD
 * Copyright 2017 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
namespace Magento\Reports\Model\ResourceModel\Review\Customer;

/**
 * @magentoAppArea adminhtml
 */
class CollectionTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Magento\Reports\Model\ResourceModel\Review\Customer\Collection
     */
    private $collection;

    protected function setUp(): void
    {
        $this->collection = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
            \Magento\Reports\Model\ResourceModel\Review\Customer\Collection::class
        );
    }

    /**
     * This tests covers issue described in:
     * https://github.com/magento/magento2/issues/10301
     *
     * @magentoDataFixture Magento/Review/_files/customer_review.php
     */
    public function testSelectCountSql()
    {
        $this->collection->addFieldToFilter('customer_name', ['like' => '%John%'])->getItems();
        $this->assertEquals(1, $this->collection->getSize());
    }
}
