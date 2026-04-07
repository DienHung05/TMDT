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
use Magento\LayeredNavigation\Block\Navigation\Category\DecimalFilterTest as CategoryDecimalFilterTest;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * Provides tests for custom price filter in navigation block on search page.
 *
 * @magentoAppArea frontend
 * @magentoAppIsolation enabled
 * @magentoDbIsolation disabled
 */
class DecimalFilterTest extends CategoryDecimalFilterTest
{
    /**
     * @magentoDataFixture Magento/Catalog/_files/product_decimal_attribute.php
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
                    'attributeData' => ['is_filterable' => 0, 'is_filterable_in_search' => 0],
=======
                    'attribute_data' => ['is_filterable' => 0, 'is_filterable_in_search' => 0],
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                ],

                /* @TODO: Should be uncommented in MC-16650 */

                /*'used_in_navigation_with_results' => [
                    'attribute_data' => [
                        'is_filterable' => AbstractFilter::ATTRIBUTE_OPTIONS_ONLY_WITH_RESULTS,
                        'is_filterable_in_search' => 1,
                    ],
                ],*/
            ]
        );

        return $dataProvider;
    }

    /**
     * @inheritdoc
     */
    protected function getLayerType(): string
    {
        return Resolver::CATALOG_LAYER_SEARCH;
    }
}
