<?php
/**
<<<<<<< HEAD
 * Copyright 2013 Adobe
 * All Rights Reserved.
 */
namespace Magento\Catalog\Model\Product;

use PHPUnit\Framework\Attributes\DataProvider;

=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Catalog\Model\Product;

>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
class TypeTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Magento\Catalog\Model\Product\Type
     */
    protected $_productType;

    protected function setUp(): void
    {
        $this->_productType = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->get(
            \Magento\Catalog\Model\Product\Type::class
        );
    }

    /**
     * @param string|null $typeId
     * @param string $expectedClass
<<<<<<< HEAD
     */
    #[DataProvider('factoryDataProvider')]
=======
     * @dataProvider factoryDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testFactory($typeId, $expectedClass)
    {
        $product = new \Magento\Framework\DataObject();
        if ($typeId) {
            $product->setTypeId($typeId);
        }
        $type = $this->_productType->factory($product);
        $this->assertInstanceOf($expectedClass, $type);
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function factoryDataProvider()
=======
    public function factoryDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            [null, \Magento\Catalog\Model\Product\Type\Simple::class],
            [\Magento\Catalog\Model\Product\Type::TYPE_SIMPLE, \Magento\Catalog\Model\Product\Type\Simple::class],
            [\Magento\Catalog\Model\Product\Type::TYPE_VIRTUAL, \Magento\Catalog\Model\Product\Type\Virtual::class],
            [\Magento\Catalog\Model\Product\Type::TYPE_BUNDLE, \Magento\Bundle\Model\Product\Type::class],
            [
                \Magento\Downloadable\Model\Product\Type::TYPE_DOWNLOADABLE,
                \Magento\Downloadable\Model\Product\Type::class
            ]
        ];
    }

    /**
     * @param string|null $typeId
<<<<<<< HEAD
     */
    #[DataProvider('factoryReturnsSingletonDataProvider')]
=======
     * @dataProvider factoryReturnsSingletonDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testFactoryReturnsSingleton($typeId)
    {
        $product = new \Magento\Framework\DataObject();
        if ($typeId) {
            $product->setTypeId($typeId);
        }

        $type = $this->_productType->factory($product);
        $otherType = $this->_productType->factory($product);
        $this->assertSame($otherType, $type);
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function factoryReturnsSingletonDataProvider()
=======
    public function factoryReturnsSingletonDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            [null],
            [\Magento\Catalog\Model\Product\Type::TYPE_SIMPLE],
            [\Magento\Catalog\Model\Product\Type::TYPE_VIRTUAL],
            [\Magento\Catalog\Model\Product\Type::TYPE_BUNDLE],
            [\Magento\Downloadable\Model\Product\Type::TYPE_DOWNLOADABLE]
        ];
    }

    /**
     * @param string|null $typeId
     * @param string $expectedClass
<<<<<<< HEAD
     */
    #[DataProvider('priceFactoryDataProvider')]
=======
     * @dataProvider priceFactoryDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testPriceFactory($typeId, $expectedClass)
    {
        $type = $this->_productType->priceFactory($typeId);
        $this->assertInstanceOf($expectedClass, $type);
    }

<<<<<<< HEAD
    public static function priceFactoryDataProvider()
=======
    public function priceFactoryDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            [null, \Magento\Catalog\Model\Product\Type\Price::class],
            [\Magento\Catalog\Model\Product\Type::TYPE_SIMPLE, \Magento\Catalog\Model\Product\Type\Price::class],
            [\Magento\Catalog\Model\Product\Type::TYPE_VIRTUAL, \Magento\Catalog\Model\Product\Type\Price::class],
            [\Magento\Catalog\Model\Product\Type::TYPE_BUNDLE, \Magento\Bundle\Model\Product\Price::class],
            [
                \Magento\Downloadable\Model\Product\Type::TYPE_DOWNLOADABLE,
                \Magento\Downloadable\Model\Product\Price::class
            ]
        ];
    }

    public function testGetOptionArray()
    {
        $options = $this->_productType->getOptionArray();
        $this->assertArrayHasKey(\Magento\Catalog\Model\Product\Type::TYPE_SIMPLE, $options);
        $this->assertArrayHasKey(\Magento\Catalog\Model\Product\Type::TYPE_VIRTUAL, $options);
        $this->assertArrayHasKey(\Magento\Catalog\Model\Product\Type::TYPE_BUNDLE, $options);
        $this->assertArrayHasKey(\Magento\Downloadable\Model\Product\Type::TYPE_DOWNLOADABLE, $options);
    }

    public function testGetAllOption()
    {
        $options = $this->_productType->getAllOption();
        $this->assertTrue(isset($options[0]['value']));
        $this->assertTrue(isset($options[0]['label']));
        // doesn't make sense to test other values, because the structure of resulting array is inconsistent
    }

    public function testGetAllOptions()
    {
        $options = $this->_productType->getAllOptions();
        $types = $this->_assertOptions($options);
        $this->assertContains('', $types);
    }

    public function testGetOptions()
    {
        $options = $this->_productType->getOptions();
        $this->_assertOptions($options);
    }

    /**
     * @param string $typeId
<<<<<<< HEAD
     */
    #[DataProvider('getOptionTextDataProvider')]
=======
     * @dataProvider getOptionTextDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testGetOptionText($typeId)
    {
        $this->assertNotEmpty($this->_productType->getOptionText($typeId));
    }

<<<<<<< HEAD
    public static function getOptionTextDataProvider()
=======
    public function getOptionTextDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            [\Magento\Catalog\Model\Product\Type::TYPE_SIMPLE],
            [\Magento\Catalog\Model\Product\Type::TYPE_VIRTUAL],
            [\Magento\Catalog\Model\Product\Type::TYPE_BUNDLE],
            [\Magento\Downloadable\Model\Product\Type::TYPE_DOWNLOADABLE]
        ];
    }

    public function testGetTypes()
    {
        $types = $this->_productType->getTypes();
        $this->assertArrayHasKey(\Magento\Catalog\Model\Product\Type::TYPE_SIMPLE, $types);
        $this->assertArrayHasKey(\Magento\Catalog\Model\Product\Type::TYPE_VIRTUAL, $types);
        $this->assertArrayHasKey(\Magento\Catalog\Model\Product\Type::TYPE_BUNDLE, $types);
        $this->assertArrayHasKey(\Magento\Downloadable\Model\Product\Type::TYPE_DOWNLOADABLE, $types);
        foreach ($types as $type) {
            $this->assertArrayHasKey('label', $type);
            $this->assertArrayHasKey('model', $type);
            $this->assertArrayHasKey('composite', $type);
            // possible bug: index_priority is not defined for each type
        }
    }

    public function testGetCompositeTypes()
    {
        $types = $this->_productType->getCompositeTypes();
        $this->assertIsArray($types);
        $this->assertContains(\Magento\Catalog\Model\Product\Type::TYPE_BUNDLE, $types);
    }

    public function testGetTypesByPriority()
    {
        $types = $this->_productType->getTypesByPriority();
        // collect the types and priority in the same order as the method returns
        $result = [];
        foreach ($types as $typeId => $type) {
            if (!isset($type['index_priority'])) {
                // possible bug: index_priority is not defined for each type
                $priority = 0;
            } else {
                $priority = (int)$type['index_priority'];
            }
            // non-composite must be before composite
            if (1 != $type['composite']) {
                $priority = -1 * $priority;
            }
            $result[$typeId] = $priority;
        }

        $expectedResult = $result;
        asort($expectedResult);
        $this->assertEquals($expectedResult, $result);
    }

    /**
     * Perform assertions on type "options" structure
     *
     * @param array $options
     * @return array collected types found in options
     */
    protected function _assertOptions($options)
    {
        $this->assertIsArray($options);
        $types = [];
        foreach ($options as $option) {
            $this->assertArrayHasKey('value', $option);
            $this->assertArrayHasKey('label', $option);
            $types[] = $option['value'];
        }
        $this->assertContains(\Magento\Catalog\Model\Product\Type::TYPE_SIMPLE, $types);
        $this->assertContains(\Magento\Catalog\Model\Product\Type::TYPE_VIRTUAL, $types);
        $this->assertContains(\Magento\Catalog\Model\Product\Type::TYPE_BUNDLE, $types);
        $this->assertContains(\Magento\Downloadable\Model\Product\Type::TYPE_DOWNLOADABLE, $types);
        return $types;
    }
}
