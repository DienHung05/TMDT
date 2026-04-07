<?php
/**
<<<<<<< HEAD
 * Copyright 2021 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

namespace Magento\Catalog\Ui\DataProvider\Product\Related;

<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;

=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
/**
 * Checks cross-sell products data provider
 *
 * @see \Magento\Catalog\Ui\DataProvider\Product\Related\CrossSellDataProvider
 *
 * @magentoAppArea adminhtml
 * @magentoDbIsolation disabled
 */
class CrossSellDataProviderTest extends AbstractRelationsDataProviderTest
{
    /**
<<<<<<< HEAD
=======
     * @dataProvider productDataProvider
     *
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @magentoDataFixture Magento/Catalog/_files/products_crosssell.php
     * @magentoDataFixture Magento/Catalog/_files/product_with_price_on_second_website.php
     *
     * @param string $storeCode
     * @param float $price
     * @return void
     */
<<<<<<< HEAD
    #[DataProvider('productDataProvider')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testGetData(string $storeCode, float $price): void
    {
        $this->prepareRequest('simple_with_cross', 'simple', $storeCode);
        $result = $this->getComponentProvidedData('crosssell_product_listing')['items'];
        $this->assertResult(1, ['sku' => 'second-website-price-product', 'price' => $price], $result);
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function productDataProvider(): array
    {
        return [
            'without_store_code' => [
                'storeCode' => 'default',
                'price' => 20,
            ],
            'with_store_code' => [
                'storeCode' => 'fixture_second_store',
                'price' => 10,
=======
    public function productDataProvider(): array
    {
        return [
            'without_store_code' => [
                'store_code' => 'default',
                'product_price' => 20,
            ],
            'with_store_code' => [
                'store_code' => 'fixture_second_store',
                'product_price' => 10,
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            ],
        ];
    }
}
