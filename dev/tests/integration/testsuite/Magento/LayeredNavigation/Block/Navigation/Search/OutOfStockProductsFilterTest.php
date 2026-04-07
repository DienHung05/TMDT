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
use Magento\LayeredNavigation\Block\Navigation\Category\OutOfStockProductsFilterTest as CategoryFilterTest;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * Provides tests for select filter in navigation block on search page with out of stock products
 * and enabled out of stock products displaying.
 *
 * @magentoAppArea frontend
 * @magentoAppIsolation enabled
 * @magentoDbIsolation disabled
 */
class OutOfStockProductsFilterTest extends CategoryFilterTest
{
    /**
     * @magentoDataFixture Magento/Catalog/_files/product_dropdown_attribute.php
     * @magentoDataFixture Magento/Catalog/_files/out_of_stock_product_with_category.php
     * @magentoDataFixture Magento/Catalog/_files/product_with_category.php
<<<<<<< HEAD
=======
     * @dataProvider getFiltersWithOutOfStockProduct
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @param int $showOutOfStock
     * @param array $expectation
     * @return void
     */
<<<<<<< HEAD
    #[DataProvider('getFiltersWithOutOfStockProduct')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testGetFiltersWithOutOfStockProduct(int $showOutOfStock, array $expectation): void
    {
        $this->updateConfigShowOutOfStockFlag($showOutOfStock);
        $this->getSearchFiltersAndAssert(
            ['out-of-stock-product' => 'Option 1', 'in-stock-product' => 'Option 2'],
            [
                'is_filterable' => AbstractFilter::ATTRIBUTE_OPTIONS_ONLY_WITH_RESULTS,
                'is_filterable_in_search' => 1,
            ],
            $expectation
        );
    }

    /**
     * @inheritdoc
     */
    protected function getLayerType(): string
    {
        return Resolver::CATALOG_LAYER_SEARCH;
    }
}
