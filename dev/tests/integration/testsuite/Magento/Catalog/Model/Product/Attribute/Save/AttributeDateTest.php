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
use PHPUnit\Framework\Attributes\DataProvider;

=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
/**
 * @magentoDbIsolation enabled
 * @magentoDataFixture  Magento/Catalog/_files/product_date_attribute.php
 * @magentoDataFixture Magento/Catalog/_files/second_product_simple.php
 */
class AttributeDateTest extends AbstractAttributeTest
{
    /**
<<<<<<< HEAD
     * @param string $productSku
     */
    #[DataProvider('productProvider')]
=======
     * @dataProvider productProvider
     * @param string $productSku
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testDefaultValue(string $productSku): void
    {
        $this->markTestSkipped('Test is blocked by issue MC-28950');
    }

    /**
     * @inheritdoc
     */
    protected function getAttributeCode(): string
    {
        return 'date_attribute';
    }

    /**
     * @inheritdoc
     */
    protected function getDefaultAttributeValue(): string
    {
        return $this->getAttribute()->getBackend()->formatDate('11/20/19');
    }

    /**
     * @magentoDataFixture Magento/Catalog/_files/product_date_attribute.php
     * @magentoDataFixture Magento/Catalog/_files/second_product_simple.php
     * @magentoDataFixture Magento/Catalog/_files/product_simple_out_of_stock.php
<<<<<<< HEAD
     * phpcs:disable Generic.CodeAnalysis.UselessOverridingMethod
     * @inheritdoc
     */
    #[DataProvider('uniqueAttributeValueProvider')]
=======
     * @dataProvider uniqueAttributeValueProvider
     * phpcs:disable Generic.CodeAnalysis.UselessOverridingMethod
     * @inheritdoc
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testUniqueAttribute(string $firstSku, string $secondSku): void
    {
        parent::testUniqueAttribute($firstSku, $secondSku);
    }

    /**
     * @inheritdoc
     */
<<<<<<< HEAD
    public static function productProvider(): array
    {
        return [
            [
                'productSku' => 'simple2',
=======
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
}
