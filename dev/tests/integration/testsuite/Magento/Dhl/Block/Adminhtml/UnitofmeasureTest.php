<?php
/**
<<<<<<< HEAD
 * Copyright 2014 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
namespace Magento\Dhl\Block\Adminhtml;

/**
 * @magentoAppArea adminhtml
 */
class UnitofmeasureTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @magentoAppIsolation enabled
     */
    public function testToHtml()
    {
        /** @var $layout \Magento\Framework\View\Layout */
        $layout = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->get(
            \Magento\Framework\View\LayoutInterface::class
        );
        /** @var $block \Magento\Dhl\Block\Adminhtml\Unitofmeasure */
        $block = $layout->createBlock(\Magento\Dhl\Block\Adminhtml\Unitofmeasure::class);
        $this->assertNotEmpty($block->toHtml());
    }
}
