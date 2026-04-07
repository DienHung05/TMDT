<?php
/**
<<<<<<< HEAD
 * Copyright 2014 Adobe
 * All Rights Reserved.
 */
namespace Magento\CatalogImportExport\Model\Import\Product\Type;

use PHPUnit\Framework\Attributes\DataProvider;

=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\CatalogImportExport\Model\Import\Product\Type;

>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
/**
 * Tests \Magento\CatalogImportExport\Model\Import\Product\Type\AbstractType.
 */
class AbstractTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Magento\CatalogImportExport\Model\Import\Product\Type\AbstractType
     */
    protected $_model;

    /**
     * @var \Magento\TestFramework\ObjectManager
     */
    private $objectManager;

    /**
     * On product import abstract class methods level it doesn't matter what product type is using.
     * That is why current tests are using simple product entity type by default
     */
    protected function setUp(): void
    {
        $this->objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();
        $params = [$this->objectManager->create(\Magento\CatalogImportExport\Model\Import\Product::class), 'simple'];
<<<<<<< HEAD
        $this->_model = $this->getMockBuilder(
            \Magento\CatalogImportExport\Model\Import\Product\Type\AbstractType::class
        )
            ->setConstructorArgs([
=======
        $this->_model = $this->getMockForAbstractClass(
            \Magento\CatalogImportExport\Model\Import\Product\Type\AbstractType::class,
            [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                $this->objectManager->get(
                    \Magento\Eav\Model\ResourceModel\Entity\Attribute\Set\CollectionFactory::class
                ),
                $this->objectManager->get(
                    \Magento\Catalog\Model\ResourceModel\Product\Attribute\CollectionFactory::class
                ),
                $this->objectManager->get(
                    \Magento\Framework\App\ResourceConnection::class
                ),
                $params
<<<<<<< HEAD
            ])
            ->onlyMethods([])
            ->getMock();
    }

    /**
=======
            ]
        );
    }

    /**
     * @dataProvider prepareAttributesWithDefaultValueForSaveDataProvider
     *
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @param array $rowData
     * @param bool  $withDefaultValue
     * @param array $expectedAttributes
     * @return void
     */
<<<<<<< HEAD
    #[DataProvider('prepareAttributesWithDefaultValueForSaveDataProvider')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testPrepareAttributesWithDefaultValueForSave(
        array $rowData,
        bool $withDefaultValue,
        array $expectedAttributes
    ): void {
        $actualAttributes = $this->_model->prepareAttributesWithDefaultValueForSave($rowData, $withDefaultValue);
        foreach ($expectedAttributes as $key => $value) {
            $this->assertArrayHasKey($key, $actualAttributes);
            $this->assertEquals($value, $actualAttributes[$key]);
        }
    }

    /**
     * @return array
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
<<<<<<< HEAD
    public static function prepareAttributesWithDefaultValueForSaveDataProvider(): array
=======
    public function prepareAttributesWithDefaultValueForSaveDataProvider(): array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            'Updating existing product with attributes that do not have default values' => [
                ['sku' => 'simple_product_1', 'price' => 55, '_attribute_set' => 'Default', 'product_type' => 'simple'],
                false,
                ['price' => 55],
            ],
            'Updating existing product with attributes that have default values' => [
                [
                    'sku' => 'simple_product_2',
                    'price' => 65,
                    '_attribute_set' => 'Default',
                    'product_type' => 'simple',
                    'visibility' => 'not visible individually',
                    'tax_class_id' => '',
                ],
                false,
                ['price' => 65, 'visibility' => 1, 'tax_class_id' => ''],
            ],
            'Adding new product with attributes that do not have default values' => [
                [
                    'sku' => 'simple_product_3',
                    'store_view_code' => '',
                    '_attribute_set' => 'Default',
                    'product_type' => 'simple',
                    'categories' => '_root_category',
                    'website_code' => '',
                    'name' => 'Simple Product 3',
                    'price' => 150,
                    'status' => 1,
                    'tax_class_id' => '2',
                    'weight' => 1,
                    'description' => 'a',
                    'short_description' => 'a',
                    'visibility' => 'not visible individually',
                ],
                true,
                [
                    'name' => 'Simple Product 3',
                    'price' => 150,
                    'status' => 1,
                    'tax_class_id' => '2',
                    'weight' => 1,
                    'description' => 'a',
                    'short_description' => 'a',
                    'visibility' => 1,
                    'options_container' => 'container2',
                    'msrp_display_actual_price_type' => 0
                ],
            ],
            'Adding new product with attributes that have default values' => [
                [
                    'sku' => 'simple_product_4',
                    'store_view_code' => '',
                    '_attribute_set' => 'Default',
                    'product_type' => 'simple',
                    'categories' => '_root_category',
                    'website_code' => 'base',
                    'name' => 'Simple Product 4',
                    'price' => 100,
                    'status' => 1,
                    'tax_class_id' => '2',
                    'weight' => 1,
                    'description' => 'a',
                    'short_description' => 'a',
                    'visibility' => 'catalog',
                    'msrp_display_actual_price_type' => 'In Cart',
                ],
                true,
                [
                    'name' => 'Simple Product 4',
                    'price' => 100,
                    'status' => 1,
                    'tax_class_id' => '2',
                    'weight' => 1,
                    'description' => 'a',
                    'short_description' => 'a',
                    'visibility' => 2,
                    'options_container' => 'container2',
                    'msrp_display_actual_price_type' => 2
                ],
            ],
            'Adding new product with empty attribute value for attribute_type = select' => [
                [
                    'sku' => 'simple_product_5',
                    'store_view_code' => '',
                    '_attribute_set' => 'Default',
                    'product_type' => 'simple',
                    'categories' => '_root_category',
                    'website_code' => '',
                    'name' => 'Simple Product 5',
                    'price' => 150,
                    'status' => 1,
                    'tax_class_id' => ' ',
                    'weight' => 1,
                    'description' => 'a',
                    'short_description' => 'a',
                    'visibility' => 'not visible individually',
                    'addition_attribute' => '',
                ],
                true,
                [
                    'name' => 'Simple Product 5',
                    'price' => 150,
                    'status' => 1,
                    'tax_class_id' => ' ',
                    'weight' => 1,
                    'description' => 'a',
                    'short_description' => 'a',
                    'visibility' => 1,
                    'options_container' => 'container2',
                    'msrp_display_actual_price_type' => 0,
                ],
            ],
        ];
    }

    /**
     * Test cleaning imported attribute data from empty values (note '0' is not empty).
     *
     * @magentoDataFixture  Magento/CatalogImportExport/Model/Import/_files/custom_attributes.php
<<<<<<< HEAD
=======
     * @dataProvider        clearEmptyDataDataProvider
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @param array $rowData
     * @param array $expectedAttributes
     * @return void
     */
<<<<<<< HEAD
    #[DataProvider('clearEmptyDataDataProvider')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testClearEmptyData(array $rowData, array $expectedAttributes): void
    {
        $actualAttributes = $this->_model->clearEmptyData($rowData);
        foreach ($expectedAttributes as $key => $value) {
            $this->assertArrayHasKey($key, $actualAttributes);
            $this->assertEquals($value, $actualAttributes[$key]);
        }
    }

    /**
     * Data provider for testClearEmptyData.
     *
     * @return array
     */
<<<<<<< HEAD
    public static function clearEmptyDataDataProvider(): array
=======
    public function clearEmptyDataDataProvider(): array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        // We use sku attribute to test static attributes.
        return [
            [
                [
                    'sku' => 'simple1',
                    'store_view_code' => '',
                    '_attribute_set' => 'Default',
                    'product_type' => 'simple',
                    'name' => 'Simple 01',
                    'price' => 10,
                    'test_attribute' => '1',
                ],
                [
                    'sku' => 'simple1',
                    'store_view_code' => '',
                    '_attribute_set' => 'Default',
                    'product_type' => 'simple',
                    'name' => 'Simple 01',
                    'price' => 10,
                    'test_attribute' => '1',
                ],
            ],
            [
                [
                    'sku' => '0',
                    'store_view_code' => '',
                    '_attribute_set' => 'Default',
                    'product_type' => 'simple',
                    'name' => 'Simple 01',
                    'price' => 10,
                    'test_attribute' => '0',
                ],
                [
                    'sku' => '0',
                    'store_view_code' => '',
                    '_attribute_set' => 'Default',
                    'product_type' => 'simple',
                    'name' => 'Simple 01',
                    'price' => 10,
                    'test_attribute' => '0',
                ],
            ],
            [
                [
                    'sku' => null,
                    'store_view_code' => '',
                    '_attribute_set' => 'Default',
                    'product_type' => 'simple',
                    'name' => 'Simple 01',
                    'price' => 10,
                    'test_attribute' => null,
                ],
                [
                    'sku' => null,
                    'store_view_code' => '',
                    '_attribute_set' => 'Default',
                    'product_type' => 'simple',
                    'name' => 'Simple 01',
                    'price' => 10,
                ],
            ],
        ];
    }
}
