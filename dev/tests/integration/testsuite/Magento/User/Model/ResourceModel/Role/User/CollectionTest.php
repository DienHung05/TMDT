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
namespace Magento\User\Model\ResourceModel\Role\User;

/**
 * Role user collection test
 * @magentoAppArea adminhtml
 */
class CollectionTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Magento\User\Model\ResourceModel\Role\User\Collection
     */
    protected $_collection;

    protected function setUp(): void
    {
        $this->_collection = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
            \Magento\User\Model\ResourceModel\Role\User\Collection::class
        );
    }

    public function testSelectQueryInitialized()
    {
        $this->assertStringContainsString('user_id > 0', $this->_collection->getSelect()->__toString());
    }
}
