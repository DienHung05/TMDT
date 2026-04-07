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

namespace Magento\SwatchesLayeredNavigation\Block\Navigation\Category;

use Magento\Catalog\Model\Layer\Filter\AbstractFilter;
use Magento\Catalog\Model\Layer\Resolver;
use Magento\LayeredNavigation\Block\Navigation\AbstractFiltersTest;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * Provides tests for custom text swatch filter in navigation block on category page.
 *
 * @magentoAppArea frontend
 * @magentoAppIsolation enabled
 * @magentoDbIsolation disabled
 */
class SwatchTextFilterTest extends AbstractFiltersTest
{
    /**
     * @magentoDataFixture Magento/Swatches/_files/product_text_swatch_attribute.php
     * @magentoDataFixture Magento/Catalog/_files/category_with_different_price_products.php
<<<<<<< HEAD
=======
     * @dataProvider getFiltersWithCustomAttributeDataProvider
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @param array $products
     * @param array $attributeData
     * @param array $expectation
     * @return void
     */
<<<<<<< HEAD
    #[DataProvider('getFiltersWithCustomAttributeDataProvider')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testGetFiltersWithCustomAttribute(array $products, array $attributeData, array $expectation): void
    {
        $this->getCategoryFiltersAndAssert($products, $attributeData, $expectation, 'Category 999');
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function getFiltersWithCustomAttributeDataProvider(): array
    {
        return [
            'not_used_in_navigation' => [
                'products' => [],
                'attributeData' => ['is_filterable' => 0],
                'expectation' => [],
            ],
            'used_in_navigation_with_results' => [
                'products' => [
                    'simple1000' => 'Option 1',
                    'simple1001' => 'Option 2',
                ],
                'attributeData' => ['is_filterable' => AbstractFilter::ATTRIBUTE_OPTIONS_ONLY_WITH_RESULTS],
=======
    public function getFiltersWithCustomAttributeDataProvider(): array
    {
        return [
            'not_used_in_navigation' => [
                'products_data' => [],
                'attribute_data' => ['is_filterable' => 0],
                'expectation' => [],
            ],
            'used_in_navigation_with_results' => [
                'products_data' => [
                    'simple1000' => 'Option 1',
                    'simple1001' => 'Option 2',
                ],
                'attribute_data' => ['is_filterable' => AbstractFilter::ATTRIBUTE_OPTIONS_ONLY_WITH_RESULTS],
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                'expectation' => [
                    ['label' => 'Option 1', 'count' => 1],
                    ['label' => 'Option 2', 'count' => 1],
                ],
            ],
            'used_in_navigation_without_results' => [
<<<<<<< HEAD
                'products' => [
                    'simple1000' => 'Option 1',
                    'simple1001' => 'Option 2',
                ],
                'attributeData' => ['is_filterable' => 2],
=======
                'products_data' => [
                    'simple1000' => 'Option 1',
                    'simple1001' => 'Option 2',
                ],
                'attribute_data' => ['is_filterable' => 2],
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                'expectation' => [
                    ['label' => 'Option 3', 'count' => 0],
                    ['label' => 'Option 1', 'count' => 1],
                    ['label' => 'Option 2', 'count' => 1],
                ],
            ],
        ];
    }

    /**
     * @magentoDataFixture Magento/Swatches/_files/product_text_swatch_attribute.php
     * @magentoDataFixture Magento/Catalog/_files/category_with_different_price_products.php
<<<<<<< HEAD
=======
     * @dataProvider getActiveFiltersWithCustomAttributeDataProvider
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @param array $products
     * @param array $expectation
     * @param string $filterValue
     * @param int $productsCount
     * @return void
     */
<<<<<<< HEAD
    #[DataProvider('getActiveFiltersWithCustomAttributeDataProvider')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testGetActiveFiltersWithCustomAttribute(
        array $products,
        array $expectation,
        string $filterValue,
        int $productsCount
    ): void {
        $this->getCategoryActiveFiltersAndAssert($products, $expectation, 'Category 999', $filterValue, $productsCount);
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function getActiveFiltersWithCustomAttributeDataProvider(): array
    {
        return [
            'filter_by_first_option_in_products_with_first_option' => [
                'products' => ['simple1000' => 'Option 1', 'simple1001' => 'Option 1'],
                'expectation' => ['label' =>  'Option 1', 'count' => 0],
                'filterValue' =>  'Option 1',
                'productsCount' => 2,
            ],
            'filter_by_first_option_in_products_with_different_options' => [
                'products' => ['simple1000' => 'Option 1', 'simple1001' => 'Option 2'],
                'expectation' => ['label' =>  'Option 1', 'count' => 0],
                'filterValue' =>  'Option 1',
                'productsCount' => 1,
            ],
            'filter_by_second_option_in_products_with_different_options' => [
                'products' => ['simple1000' => 'Option 1', 'simple1001' => 'Option 2'],
                'expectation' => ['label' => 'Option 2', 'count' => 0],
                'filterValue' => 'Option 2',
                'productsCount' => 1,
=======
    public function getActiveFiltersWithCustomAttributeDataProvider(): array
    {
        return [
            'filter_by_first_option_in_products_with_first_option' => [
                'products_data' => ['simple1000' => 'Option 1', 'simple1001' => 'Option 1'],
                'expectation' => ['label' =>  'Option 1', 'count' => 0],
                'filter_value' =>  'Option 1',
                'products_count' => 2,
            ],
            'filter_by_first_option_in_products_with_different_options' => [
                'products_data' => ['simple1000' => 'Option 1', 'simple1001' => 'Option 2'],
                'expectation' => ['label' =>  'Option 1', 'count' => 0],
                'filter_value' =>  'Option 1',
                'products_count' => 1,
            ],
            'filter_by_second_option_in_products_with_different_options' => [
                'products_data' => ['simple1000' => 'Option 1', 'simple1001' => 'Option 2'],
                'expectation' => ['label' => 'Option 2', 'count' => 0],
                'filter_value' => 'Option 2',
                'products_count' => 1,
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    protected function getLayerType(): string
    {
        return Resolver::CATALOG_LAYER_CATEGORY;
    }

    /**
     * @inheritdoc
     */
    protected function getAttributeCode(): string
    {
        return 'text_swatch_attribute';
    }
}
