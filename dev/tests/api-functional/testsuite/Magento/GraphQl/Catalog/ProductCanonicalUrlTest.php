<?php
/**
<<<<<<< HEAD
 * Copyright 2019 Adobe
 * All rights reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

namespace Magento\GraphQl\Catalog;

<<<<<<< HEAD
use Magento\Indexer\Test\Fixture\Indexer as IndexerFixture;
use Magento\TestFramework\Fixture\Config;
use Magento\TestFramework\TestCase\GraphQlAbstract;
use Magento\Catalog\Test\Fixture\Product as ProductFixture;
use Magento\TestFramework\Fixture\DataFixture;
use Magento\TestFramework\Fixture\DataFixtureStorageManager;
=======
use Magento\TestFramework\TestCase\GraphQlAbstract;
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * Test for getting canonical_url for products
 */
class ProductCanonicalUrlTest extends GraphQlAbstract
{
<<<<<<< HEAD
    #[
        Config('catalog/seo/product_canonical_tag', 1),
        DataFixture(ProductFixture::class, as: 'product'),
        DataFixture(IndexerFixture::class)
    ]
    public function testProductWithCanonicalLinksMetaTagSettingsEnabled()
    {
        $product = DataFixtureStorageManager::getStorage()->get('product');
        $productSku = $product->getSku();
        $productCanonicalUrl = $product->getUrlKey();
=======
    /**
     * @magentoApiDataFixture Magento/Catalog/_files/product_simple.php
     * @magentoConfigFixture default_store catalog/seo/product_canonical_tag 1
     *
     */
    public function testProductWithCanonicalLinksMetaTagSettingsEnabled()
    {
        $productSku = 'simple';
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $query
            = <<<QUERY
{
    products (filter: {sku: {eq: "{$productSku}"}}) {
        items {
            name
            sku
            canonical_url
        }
    }
}
QUERY;

        $response = $this->graphQlQuery($query);
        $this->assertNotEmpty($response['products']['items']);

        $this->assertEquals(
<<<<<<< HEAD
            $productCanonicalUrl . '.html',
            $response['products']['items'][0]['canonical_url']
        );
        $this->assertEquals($productSku, $response['products']['items'][0]['sku']);
    }

    #[
        Config('catalog/seo/product_canonical_tag', 0),
        DataFixture(ProductFixture::class, as: 'product'),
        DataFixture(IndexerFixture::class)
    ]
    public function testProductWithCanonicalLinksMetaTagSettingsDisabled()
    {
        $product = DataFixtureStorageManager::getStorage()->get('product');
        $productSku = $product->getSku();
=======
            'simple-product.html',
            $response['products']['items'][0]['canonical_url']
        );
        $this->assertEquals('simple', $response['products']['items'][0]['sku']);
    }

    /**
     * @magentoApiDataFixture Magento/Catalog/_files/product_simple.php
     * @magentoConfigFixture default_store catalog/seo/product_canonical_tag 0
     */
    public function testProductWithCanonicalLinksMetaTagSettingsDisabled()
    {
        $productSku = 'simple';
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $query
            = <<<QUERY
{
    products (filter: {sku: {eq: "{$productSku}"}}) {
        items {
            name
            sku
            canonical_url
        }
    }
}
QUERY;

        $response = $this->graphQlQuery($query);
        $this->assertNull(
            $response['products']['items'][0]['canonical_url']
        );
<<<<<<< HEAD
        $this->assertEquals($productSku, $response['products']['items'][0]['sku']);
=======
        $this->assertEquals('simple', $response['products']['items'][0]['sku']);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }
}
