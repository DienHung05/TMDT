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

namespace Magento\LayeredNavigation\Block\Navigation\Search;

use Magento\Catalog\Model\Layer\Filter\AbstractFilter;
use Magento\Catalog\Model\Layer\Resolver;
use Magento\LayeredNavigation\Block\Navigation\Category\MultiselectFilterTest as CategoryMultiselectFilterTest;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * Provides tests for custom multiselect filter in navigation block on search page.
 *
 * @magentoAppArea frontend
 * @magentoAppIsolation enabled
 * @magentoDbIsolation disabled
 */
class MultiselectFilterTest extends CategoryMultiselectFilterTest
{
    /**
     * @magentoDataFixture Magento/Catalog/_files/multiselect_attribute.php
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
    public function testGetFiltersWithCustomAttribute(
        array $products,
        array $attributeData,
        array $expectation
    ): void {
        $this->getSearchFiltersAndAssert($products, $attributeData, $expectation);
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function getFiltersWithCustomAttributeDataProvider(): array
=======
    public function getFiltersWithCustomAttributeDataProvider(): array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        $dataProvider = parent::getFiltersWithCustomAttributeDataProvider();

        $dataProvider = array_replace_recursive(
            $dataProvider,
            [
                'not_used_in_navigation' => [
<<<<<<< HEAD
                    'attributeData' => [
=======
                    'attribute_data' => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                        'is_filterable_in_search' => 0,
                    ],
                ],
                'used_in_navigation_with_results' => [
<<<<<<< HEAD
                    'attributeData' => [
=======
                    'attribute_data' => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                        'is_filterable' => AbstractFilter::ATTRIBUTE_OPTIONS_ONLY_WITH_RESULTS,
                        'is_filterable_in_search' => 1,
                    ],
                ],
                'used_in_navigation_without_results' => [
<<<<<<< HEAD
                    'attributeData' => [
=======
                    'attribute_data' => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                        'is_filterable' => 0,
                        'is_filterable_in_search' => 1,
                    ],
                ],
            ]
        );
        //TODO uncomment after fix MC-29227
        //unset($dataProvider['used_in_navigation_without_results']['expectation'][1]);
        //unset($dataProvider['used_in_navigation_without_results']['expectation'][2]);
        //unset($dataProvider['used_in_navigation_without_results']['expectation'][3]);

        return $dataProvider;
    }

    /**
     * @magentoDataFixture Magento/Catalog/_files/multiselect_attribute.php
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
        $this->getSearchActiveFiltersAndAssert($products, $expectation, $filterValue, $productsCount);
    }

    /**
     * @inheritdoc
     */
    protected function getLayerType(): string
    {
        return Resolver::CATALOG_LAYER_SEARCH;
    }
}
