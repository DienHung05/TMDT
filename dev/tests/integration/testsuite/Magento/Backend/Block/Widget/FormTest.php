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
namespace Magento\Backend\Block\Widget;

/**
 * Test class for \Magento\Backend\Block\Widget\Form
 * @magentoAppArea adminhtml
 */
class FormTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @magentoAppIsolation enabled
     */
    public function testSetFieldset()
    {
        $objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();
        $objectManager->get(
            \Magento\Framework\View\DesignInterface::class
        )->setArea(
            \Magento\Backend\App\Area\FrontNameResolver::AREA_CODE
        )->setDefaultDesignTheme();
        $layout = $objectManager->create(\Magento\Framework\View\Layout::class);
        $formBlock = $layout->addBlock(\Magento\Backend\Block\Widget\Form::class);
        $fieldSet = $objectManager->create(\Magento\Framework\Data\Form\Element\Fieldset::class);
        $arguments = [
            'data' => [
                'attribute_code' => 'date',
                'backend_type' => 'datetime',
                'frontend_input' => 'date',
                'frontend_label' => 'Date',
            ],
        ];
        $attributes = [$objectManager->create(\Magento\Eav\Model\Entity\Attribute::class, $arguments)];
        $method = new \ReflectionMethod(\Magento\Backend\Block\Widget\Form::class, '_setFieldset');
<<<<<<< HEAD
=======
        $method->setAccessible(true);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $method->invoke($formBlock, $attributes, $fieldSet);
        $fields = $fieldSet->getElements();

        $this->assertCount(1, $fields);
        $this->assertInstanceOf(\Magento\Framework\Data\Form\Element\Date::class, $fields[0]);
        $this->assertNotEmpty($fields[0]->getDateFormat());
    }
}
