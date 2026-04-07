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
namespace Magento\Catalog\Block\Adminhtml\Category;

/**
 * @magentoAppArea adminhtml
 */
class TreeTest extends \PHPUnit\Framework\TestCase
{
    /** @var \Magento\Catalog\Block\Adminhtml\Category\Tree */
    protected $_block;

    protected function setUp(): void
    {
        parent::setUp();
        $this->_block = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
            \Magento\Catalog\Block\Adminhtml\Category\Tree::class
        );

        $this->_block = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->get(
            \Magento\Framework\View\LayoutInterface::class
        )->createBlock(
            \Magento\Catalog\Block\Adminhtml\Category\Tree::class,
            '',
            []
        );
    }

    public function testGetSuggestedCategoriesJson()
    {
        $this->assertEquals(
            '[{"id":"2","children":[],"is_active":"1","label":"Default Category"}]',
            $this->_block->getSuggestedCategoriesJson('Default')
        );
        $this->assertEquals('[]', $this->_block->getSuggestedCategoriesJson(strrev('Default')));
    }
}
