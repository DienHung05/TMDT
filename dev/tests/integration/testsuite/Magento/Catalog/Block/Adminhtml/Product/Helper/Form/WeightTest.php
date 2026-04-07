<?php
/**
<<<<<<< HEAD
 * Copyright 2013 Adobe
 * All Rights Reserved.
 */
namespace Magento\Catalog\Block\Adminhtml\Product\Helper\Form;

use PHPUnit\Framework\Attributes\DataProvider;

=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Catalog\Block\Adminhtml\Product\Helper\Form;

>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
class WeightTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Magento\Framework\ObjectManagerInterface
     */
    protected $_objectManager;

    /**
     * @var \Magento\Framework\Data\FormFactory
     */
    protected $_formFactory;

    protected function setUp(): void
    {
        $this->_objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();
        $this->_formFactory = $this->_objectManager->create(\Magento\Framework\Data\FormFactory::class);
    }

    /**
     * @param string $type
<<<<<<< HEAD
     */
    #[DataProvider('virtualTypesDataProvider')]
=======
     * @dataProvider virtualTypesDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testProductWithoutWeight($type)
    {
        /** @var $currentProduct \Magento\Catalog\Model\Product */
        $currentProduct = $this->_objectManager->create(\Magento\Catalog\Model\Product::class);
        $currentProduct->setTypeInstance($this->_objectManager->create($type));
        /** @var $block \Magento\Catalog\Block\Adminhtml\Product\Helper\Form\Weight */
        $block = $this->_objectManager->create(\Magento\Catalog\Block\Adminhtml\Product\Helper\Form\Weight::class);
        $form = $this->_formFactory->create();
        $form->setDataObject($currentProduct);
        $block->setForm($form);

        $this->assertMatchesRegularExpression(
            '/value="0".*checked="checked"/',
            $block->getElementHtml(),
            '"Does this have a weight" is set to "Yes" for virtual products'
        );
    }

    /**
     * @return array
     */
    public static function virtualTypesDataProvider()
    {
        return [
            [\Magento\Catalog\Model\Product\Type\Virtual::class],
            [\Magento\Downloadable\Model\Product\Type::class]
        ];
    }

    /**
     * @param string $type
<<<<<<< HEAD
     */
    #[DataProvider('physicalTypesDataProvider')]
=======
     * @dataProvider physicalTypesDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testProductHasWeight($type)
    {
        /** @var $currentProduct \Magento\Catalog\Model\Product */
        $currentProduct = $this->_objectManager->create(\Magento\Catalog\Model\Product::class);
        $currentProduct->setTypeInstance($this->_objectManager->create($type));

        /** @var $block \Magento\Catalog\Block\Adminhtml\Product\Helper\Form\Weight */
        $block = $this->_objectManager->create(\Magento\Catalog\Block\Adminhtml\Product\Helper\Form\Weight::class);
        $form = $this->_formFactory->create();
        $form->setDataObject($currentProduct);
        $block->setForm($form);
        $this->assertDoesNotMatchRegularExpression(
            '/value="0".*checked="checked"/',
            $block->getElementHtml(),
            '"Does this have a weight" is set to "No" for physical products'
        );
    }

    /**
     * @return array
     */
    public static function physicalTypesDataProvider()
    {
        return [[\Magento\Catalog\Model\Product\Type\Simple::class], [\Magento\Bundle\Model\Product\Type::class]];
    }
}
