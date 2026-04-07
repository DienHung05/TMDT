<?php
/**
<<<<<<< HEAD
 * Copyright 2019 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

namespace Magento\Catalog\Model\Product\Attribute\Save;

<<<<<<< HEAD
use Magento\Catalog\Api\Data\ProductAttributeInterface;
use Magento\Catalog\Test\Fixture\Attribute as AttributeFixture;
use Magento\Eav\Model\Entity\Attribute\Exception;
use PHPUnit\Framework\Attributes\DataProvider;
use Magento\TestFramework\Fixture\AppArea;
use Magento\TestFramework\Fixture\Config;
use Magento\TestFramework\Fixture\DataFixture;
use Magento\TestFramework\Fixture\DataFixtureStorageManager;
use Magento\TestFramework\Helper\Bootstrap;
=======
use Magento\Eav\Model\Entity\Attribute\Exception;
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * @magentoDbIsolation enabled
 * @magentoDataFixture Magento/Catalog/_files/product_decimal_attribute.php
 * @magentoDataFixture Magento/Catalog/_files/second_product_simple.php
 */
class AttributePriceTest extends AbstractAttributeTest
{
    /**
     * @magentoDataFixture Magento/Catalog/_files/product_decimal_attribute.php
     * @magentoDataFixture Magento/Catalog/_files/second_product_simple.php
     * @magentoDataFixture Magento/Catalog/_files/product_simple_out_of_stock.php
<<<<<<< HEAD
     * @inheritdoc
     */
    #[DataProvider('uniqueAttributeValueProvider')]
=======
     * @dataProvider uniqueAttributeValueProvider
     * @inheritdoc
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testUniqueAttribute(string $firstSku, string $secondSku): void
    {
        $this->markTestSkipped('Test is blocked by issue MC-29018');
        parent::testUniqueAttribute($firstSku, $secondSku);
    }

    /**
     * @magentoDataFixture Magento/Catalog/_files/product_decimal_attribute.php
     * @magentoDataFixture Magento/Catalog/_files/second_product_simple.php
     * @return void
     */
    public function testNegativeValue(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage((string)__('Please enter a number 0 or greater in this field.'));
        $this->setAttributeValueAndValidate('simple2', '-1');
    }

    /**
<<<<<<< HEAD
     * @param string $productSku
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    #[DataProvider('productProvider')]
=======
     * @dataProvider productProvider
     * @param string $productSku
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testDefaultValue(string $productSku): void
    {
        // product price attribute does not support default value
    }

<<<<<<< HEAD
    #[
        AppArea('adminhtml'),
        Config('catalog/price/scope', '2', 'store'),
        DataFixture(
            AttributeFixture::class,
            ['frontend_input' => 'price', 'backend_type' => 'decimal'],
            'decimalAttr'
        ),
    ]
    public function testScopePriceAttribute()
    {
        $attributeFixtures = Bootstrap::getObjectManager()
            ->get(DataFixtureStorageManager::class)->getStorage();
        $attribute = $this->attributeRepository->get(
            ProductAttributeInterface::ENTITY_TYPE_CODE,
            $attributeFixtures->get('decimalAttr')->getAttributeCode()
        );

        $this->assertFalse($attribute->isScopeStore());
        $this->assertTrue($attribute->isScopeGlobal());
    }

    /**
     * @inheritdoc
     */
    public static function productProvider(): array
    {
        return [
            [
                'productSku' => 'simple2',
=======
    /**
     * @inheritdoc
     */
    public function productProvider(): array
    {
        return [
            [
                'product_sku' => 'simple2',
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            ],
        ];
    }

    /**
     * @inheritdoc
     */
<<<<<<< HEAD
    public static function uniqueAttributeValueProvider(): array
    {
        return [
            [
                'firstSku' => 'simple2',
                'secondSku' => 'simple-out-of-stock',
=======
    public function uniqueAttributeValueProvider(): array
    {
        return [
            [
                'first_product_sku' => 'simple2',
                'second_product_sku' => 'simple-out-of-stock',
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    protected function getAttributeCode(): string
    {
        return 'decimal_attribute';
    }

    /**
     * @inheritdoc
     */
    protected function getDefaultAttributeValue(): string
    {
        return '100.000000';
    }
}
