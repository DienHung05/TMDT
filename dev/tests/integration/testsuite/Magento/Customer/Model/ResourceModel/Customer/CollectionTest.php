<?php
/**
 * \Magento\Customer\Model\ResourceModel\Customer\Collection
 *
<<<<<<< HEAD
 * Copyright 2015 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
namespace Magento\Customer\Model\ResourceModel\Customer;

class CollectionTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Magento\Customer\Model\ResourceModel\Customer\Collection
     */
    protected $_collection;

    protected function setUp(): void
    {
        $this->_collection = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
            \Magento\Customer\Model\ResourceModel\Customer\Collection::class
        );
    }

    public function testAddNameToSelect()
    {
        $this->_collection->addNameToSelect();
        $joinParts = $this->_collection->getSelect()->getPart(\Magento\Framework\DB\Select::FROM);

        $this->assertArrayHasKey('e', $joinParts);
        $this->assertCount(1, $joinParts);
    }
}
