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
namespace Magento\Newsletter\Block\Adminhtml;

/**
 * @magentoAppArea adminhtml
 */
class SubscriberTest extends \PHPUnit\Framework\TestCase
{
    public function testGetShowQueueAdd()
    {
        /** @var $layout \Magento\Framework\View\Layout */
        $layout = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->get(
            \Magento\Framework\View\LayoutInterface::class
        );
        /** @var $block \Magento\Newsletter\Block\Adminhtml\Subscriber */
        $block = $layout->createBlock(\Magento\Newsletter\Block\Adminhtml\Subscriber::class, 'block');
        /** @var $childBlock \Magento\Framework\View\Element\Template */
        $childBlock = $layout->addBlock(\Magento\Framework\View\Element\Template::class, 'grid', 'block');

        $expected = 'test_data';
        $this->assertNotEquals($expected, $block->getShowQueueAdd());
        $childBlock->setShowQueueAdd($expected);
        $this->assertEquals($expected, $block->getShowQueueAdd());
    }
}
