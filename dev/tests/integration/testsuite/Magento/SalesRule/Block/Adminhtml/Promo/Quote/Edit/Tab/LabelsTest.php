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
namespace Magento\SalesRule\Block\Adminhtml\Promo\Quote\Edit\Tab;

/**
 * @magentoAppArea adminhtml
 */
class LabelsTest extends \PHPUnit\Framework\TestCase
{
    public function testConstruct()
    {
        $this->assertInstanceOf(
            \Magento\SalesRule\Block\Adminhtml\Promo\Quote\Edit\Tab\Labels::class,
            \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->get(
                \Magento\Framework\View\Element\UiComponent\Argument\Interpreter\ConfigurableObject::class
            )->evaluate(
                [
                    'name' => 'block',
                    'value' => \Magento\SalesRule\Block\Adminhtml\Promo\Quote\Edit\Tab\Labels::class
                ]
            )
        );
    }
}
