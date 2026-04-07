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

namespace Magento\CatalogSearch\Controller\Result;

use Magento\TestFramework\TestCase\AbstractController;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * Test cases for catalog quick search using search engine.
 *
 * @magentoDbIsolation disabled
 * @magentoAppIsolation enabled
 */
class IndexTest extends AbstractController
{
    /**
     * Quick search test by difference product attributes.
     *
     * @magentoAppArea frontend
     * @magentoDataFixture Magento/CatalogSearch/_files/product_for_search.php
     * @magentoDataFixture Magento/CatalogSearch/_files/full_reindex.php
<<<<<<< HEAD
=======
     * @dataProvider searchStringDataProvider
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     *
     * @param string $searchString
     * @return void
     */
<<<<<<< HEAD
    #[DataProvider('searchStringDataProvider')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testExecute(string $searchString): void
    {
        $this->getRequest()->setParam('q', $searchString);
        $this->dispatch('catalogsearch/result');
        $responseBody = $this->getResponse()->getBody();
        $this->assertStringContainsString('Simple product name', $responseBody);
    }

    /**
     * Data provider with strings for quick search.
     *
     * @return array
     */
<<<<<<< HEAD
    public static function searchStringDataProvider(): array
=======
    public function searchStringDataProvider(): array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            'search_product_by_name' => ['Simple product name'],
            'search_product_by_sku' => ['simple_for_search'],
            'search_product_by_description' => ['Product description'],
            'search_product_by_short_description' => ['Product short description'],
            'search_product_by_custom_attribute' => ['Option 1'],
        ];
    }
}
