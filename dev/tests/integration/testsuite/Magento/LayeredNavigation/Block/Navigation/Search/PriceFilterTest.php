<?php
/**
<<<<<<< HEAD
 * Copyright 2020 Adobe
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
use Magento\LayeredNavigation\Block\Navigation\Category\PriceFilterTest as CategoryPriceFilterTest;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * Provides price filter tests with different price ranges calculation in navigation block on search page.
 *
 * @magentoAppArea frontend
 * @magentoAppIsolation enabled
 * @magentoDbIsolation disabled
 */
class PriceFilterTest extends CategoryPriceFilterTest
{
    /**
     * @magentoDataFixture Magento/Catalog/_files/category_with_three_products.php
<<<<<<< HEAD
=======
     * @dataProvider getFiltersDataProvider
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @param array $config
     * @param array $products
     * @param array $expectation
     * @return void
     */
<<<<<<< HEAD
    #[DataProvider('getFiltersDataProvider')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testGetFilters(array $config, array $products, array $expectation): void
    {
        $this->applyCatalogConfig($config);
        $this->getSearchFiltersAndAssert(
            $products,
            [
                'is_filterable' => AbstractFilter::ATTRIBUTE_OPTIONS_ONLY_WITH_RESULTS,
                'is_filterable_in_search' => 1,
            ],
            $expectation
        );
    }

    /**
     * @magentoDataFixture Magento/Catalog/_files/category_with_three_products.php
<<<<<<< HEAD
=======
     * @dataProvider getActiveFiltersDataProvider
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @param array $config
     * @param array $products
     * @param array $expectation
     * @param string $filterValue
     * @return void
     */
<<<<<<< HEAD
    #[DataProvider('getActiveFiltersDataProvider')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testGetActiveFilters(array $config, array $products, array $expectation, string $filterValue): void
    {
        $this->applyCatalogConfig($config);
        $this->getSearchActiveFiltersAndAssert($products, $expectation, $filterValue, 1);
    }

    /**
     * @inheritdoc
     */
    protected function getLayerType(): string
    {
        return Resolver::CATALOG_LAYER_SEARCH;
    }
}
