<?php
/**
<<<<<<< HEAD
 * Copyright 2013 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
namespace Magento\User\Block\Role\Grid;

/**
 * @magentoAppArea adminhtml
 */
class UserTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Magento\User\Block\Role\Grid\User
     */
    protected $_block;

    protected function setUp(): void
    {
        $layout = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->get(
            \Magento\Framework\View\LayoutInterface::class
        );
        $this->_block = $layout->createBlock(\Magento\User\Block\Role\Grid\User::class);
    }

    public function testPreparedCollection()
    {
        $this->_block->toHtml();
        $this->assertInstanceOf(
            \Magento\User\Model\ResourceModel\Role\User\Collection::class,
            $this->_block->getCollection()
        );
    }
}
