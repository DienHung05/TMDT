<?php
/**
<<<<<<< HEAD
 * Copyright 2015 Adobe
 * All Rights Reserved.
 */
namespace Magento\Tax\Model\ResourceModel\Calculation\Rule;

use PHPUnit\Framework\Attributes\DataProvider;

=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Tax\Model\ResourceModel\Calculation\Rule;

>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
class CollectionTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Magento\TestFramework\ObjectManager
     */
    protected $_objectManager;

    protected function setUp(): void
    {
        $this->_objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();
    }

    /**
     * Test setClassTypeFilter with correct Class Type
     *
     * @param $classType
     * @param $elementId
     * @param $expected
<<<<<<< HEAD
     */
    #[DataProvider('setClassTypeFilterDataProvider')]
=======
     *
     * @dataProvider setClassTypeFilterDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testSetClassTypeFilter($classType, $elementId, $expected)
    {
        $collection = $this->_objectManager->create(
            \Magento\Tax\Model\ResourceModel\Calculation\Rule\Collection::class
        );
        $collection->setClassTypeFilter($classType, $elementId);
        $this->assertMatchesRegularExpression($expected, (string)$collection->getSelect());
    }

<<<<<<< HEAD
    public static function setClassTypeFilterDataProvider()
=======
    public function setClassTypeFilterDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            [
                \Magento\Tax\Model\ClassModel::TAX_CLASS_TYPE_PRODUCT,
                1,
                '/`?cd`?\.`?product_tax_class_id`? = [\S]{0,1}1[\S]{0,1}/',
            ],
            [
                \Magento\Tax\Model\ClassModel::TAX_CLASS_TYPE_CUSTOMER,
                1,
                '/`?cd`?\.`?customer_tax_class_id`? = [\S]{0,1}1[\S]{0,1}/'
            ]
        ];
    }

    /**
     * Test setClassTypeFilter with wrong Class Type
     *
     */
    public function testSetClassTypeFilterWithWrongType()
    {
        $this->expectException(\Magento\Framework\Exception\LocalizedException::class);

        $collection = $this->_objectManager->create(
            \Magento\Tax\Model\ResourceModel\Calculation\Rule\Collection::class
        );
        $collection->setClassTypeFilter('WrongType', 1);
    }
}
