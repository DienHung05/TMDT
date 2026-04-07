<?php
/**
<<<<<<< HEAD
 * Copyright 2013 Adobe
 * All Rights Reserved.
 */
namespace Magento\ImportExport\Model;

use PHPUnit\Framework\Attributes\DataProvider;
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\ImportExport\Model;

>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
use ReflectionClass;

class ExportTest extends \PHPUnit\Framework\TestCase
{
    /**
     * Model object which used for tests
     *
     * @var \Magento\ImportExport\Model\Export
     */
    protected $_model;

    protected function setUp(): void
    {
        $this->_model = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
            \Magento\ImportExport\Model\Export::class
        );
    }

    /**
     * Test method '_getEntityAdapter' in case when entity is valid
     *
     * @param string $entity
     * @param string $expectedEntityType
<<<<<<< HEAD
     * @covers \Magento\ImportExport\Model\Export::_getEntityAdapter
     */
    #[DataProvider('getEntityDataProvider')]
=======
     * @dataProvider getEntityDataProvider
     * @covers \Magento\ImportExport\Model\Export::_getEntityAdapter
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testGetEntityAdapterWithValidEntity($entity, $expectedEntityType)
    {
        $this->_model->setData(['entity' => $entity]);
        $this->_model->getEntityAttributeCollection();
<<<<<<< HEAD
        $this->assertIsObject($this->_model);
        $this->assertTrue(property_exists($this->_model, '_entityAdapter'));
        $object = new ReflectionClass(get_class($this->_model));
        $attribute = $object->getProperty('_entityAdapter');
        $propertyObject = $attribute->getValue($this->_model);
=======
        $this->assertClassHasAttribute('_entityAdapter', get_class($this->_model));
        $object = new ReflectionClass(get_class($this->_model));
        $attribute = $object->getProperty('_entityAdapter');
        $attribute->setAccessible(true);
        $propertyObject = $attribute->getValue($this->_model);
        $attribute->setAccessible(false);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $this->assertInstanceOf($expectedEntityType, $propertyObject);
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function getEntityDataProvider()
    {
        return [
            'product' => [
                'entity' => 'catalog_product',
                'expectedEntityType' => \Magento\CatalogImportExport\Model\Export\Product::class,
            ],
            'customer main data' => [
                'entity' => 'customer',
                'expectedEntityType' => \Magento\CustomerImportExport\Model\Export\Customer::class,
            ],
            'customer address' => [
                'entity' => 'customer_address',
                'expectedEntityType' => \Magento\CustomerImportExport\Model\Export\Address::class,
=======
    public function getEntityDataProvider()
    {
        return [
            'product' => [
                '$entity' => 'catalog_product',
                '$expectedEntityType' => \Magento\CatalogImportExport\Model\Export\Product::class,
            ],
            'customer main data' => [
                '$entity' => 'customer',
                '$expectedEntityType' => \Magento\CustomerImportExport\Model\Export\Customer::class,
            ],
            'customer address' => [
                '$entity' => 'customer_address',
                '$expectedEntityType' => \Magento\CustomerImportExport\Model\Export\Address::class,
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            ]
        ];
    }

    /**
     * Test method '_getEntityAdapter' in case when entity is invalid
     *
     * @covers \Magento\ImportExport\Model\Export::_getEntityAdapter
     */
    public function testGetEntityAdapterWithInvalidEntity()
    {
        $this->expectException(\Magento\Framework\Exception\LocalizedException::class);

        $this->_model->setData(['entity' => 'test']);
        $this->_model->getEntityAttributeCollection();
    }
}
