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

namespace Magento\GraphQl\PageCache\UrlRewrite;

use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Catalog\Model\Product;
<<<<<<< HEAD
use Magento\GraphQl\PageCache\GraphQLPageCacheAbstract;
use Magento\GraphQlCache\Model\CacheId\CacheIdCalculator;
use Magento\TestFramework\Helper\Bootstrap;

/**
 * Test cache works properly for url resolver.
 */
class UrlResolverCacheTest extends GraphQLPageCacheAbstract
{
    /**
     * Tests cache works properly for product urlResolver
     *
     * @magentoConfigFixture default/system/full_page_cache/caching_application 2
     * @magentoApiDataFixture Magento/CatalogUrlRewrite/_files/product_with_category.php
     */
    public function testUrlResolverCachingForProducts()
    {
        $urlKey = 'p002.html';
        $urlResolverQuery = $this->getUrlResolverQuery($urlKey);

        // Obtain the X-Magento-Cache-Id from the response
        $response = $this->graphQlQueryWithResponseHeaders($urlResolverQuery);
        $this->assertArrayHasKey(CacheIdCalculator::CACHE_ID_HEADER, $response['headers']);
        $cacheIdForProducts = $response['headers'][CacheIdCalculator::CACHE_ID_HEADER];
        // Verify we obtain a cache MISS the first time
        $this->assertCacheMissAndReturnResponse(
            $urlResolverQuery,
            [CacheIdCalculator::CACHE_ID_HEADER => $cacheIdForProducts]
        );
        // Verify we obtain a cache HIT the second time
        $cachedResponse = $this->assertCacheHitAndReturnResponse(
            $urlResolverQuery,
            [CacheIdCalculator::CACHE_ID_HEADER => $cacheIdForProducts]
        );

        //cached data should be correct
        $this->assertNotEmpty($cachedResponse['body']);
        $this->assertArrayNotHasKey('errors', $cachedResponse['body']);
        $this->assertEquals('PRODUCT', $cachedResponse['body']['urlResolver']['type']);
    }

    /**
     * Tests cache invalidation for category urlResolver
     *
     * @magentoConfigFixture default/system/full_page_cache/caching_application 2
     * @magentoApiDataFixture Magento/CatalogUrlRewrite/_files/product_with_category.php
     */
    public function testUrlResolverCachingForCategory()
    {
        $categoryUrlKey = 'cat-1.html';
        $query = $this->getUrlResolverQuery($categoryUrlKey);

        $response = $this->graphQlQueryWithResponseHeaders($query);
        $this->assertArrayHasKey(CacheIdCalculator::CACHE_ID_HEADER, $response['headers']);
        $cacheIdForCategory = $response['headers'][CacheIdCalculator::CACHE_ID_HEADER];
        // Verify we obtain a cache MISS the first time
        $this->assertCacheMissAndReturnResponse(
            $query,
            [CacheIdCalculator::CACHE_ID_HEADER => $cacheIdForCategory]
        );
        // Verify we obtain a cache HIT the second time
        $cachedResponse = $this->assertCacheHitAndReturnResponse(
            $query,
            [CacheIdCalculator::CACHE_ID_HEADER => $cacheIdForCategory]
        );

        //verify cached data is correct
        $this->assertNotEmpty($cachedResponse['body']);
        $this->assertArrayNotHasKey('errors', $cachedResponse['body']);
        $this->assertEquals('CATEGORY', $cachedResponse['body']['urlResolver']['type']);
    }

    /**
     * Test cache invalidation for cms page url resolver
     *
     * @magentoConfigFixture default/system/full_page_cache/caching_application 2
=======
use Magento\TestFramework\Helper\Bootstrap;
use Magento\TestFramework\ObjectManager;
use Magento\TestFramework\TestCase\GraphQlAbstract;
use Magento\UrlRewrite\Model\UrlFinderInterface;

/**
 * Test caching works for url resolver.
 */
class UrlResolverCacheTest extends GraphQlAbstract
{
    /**
     * @inheritdoc
     */
    protected function setUp(): void
    {
        $this->markTestSkipped(
            'This test will stay skipped until DEVOPS-4924 is resolved'
        );
    }

    /**
     * Tests that X-Magento-tags and cache debug headers are correct for product urlResolver
     *
     * @magentoApiDataFixture Magento/CatalogUrlRewrite/_files/product_with_category.php
     */
    public function testCacheTagsForProducts()
    {
        $productSku = 'p002';
        $urlKey = 'p002.html';
        /** @var ProductRepositoryInterface $productRepository */
        $productRepository = ObjectManager::getInstance()->get(ProductRepositoryInterface::class);
        /** @var Product $product */
        $product = $productRepository->get($productSku, false, null, true);
        $urlResolverQuery = $this->getUrlResolverQuery($urlKey);
        $responseMiss = $this->graphQlQueryWithResponseHeaders($urlResolverQuery);
        $this->assertArrayHasKey('X-Magento-Tags', $responseMiss['headers']);
        $actualTags = explode(',', $responseMiss['headers']['X-Magento-Tags']);
        $expectedTags = ["cat_p", "cat_p_{$product->getId()}", "FPC"];
        $this->assertEquals($expectedTags, $actualTags);

        //cache-debug should be a MISS on first request
        $this->assertArrayHasKey('X-Magento-Cache-Debug', $responseMiss['headers']);
        $this->assertEquals('MISS', $responseMiss['headers']['X-Magento-Cache-Debug']);

        //cache-debug should be a HIT on second request
        $responseHit = $this->graphQlQueryWithResponseHeaders($urlResolverQuery);
        $this->assertArrayHasKey('X-Magento-Cache-Debug', $responseHit['headers']);
        $this->assertEquals('HIT', $responseHit['headers']['X-Magento-Cache-Debug']);
        //cached data should be correct
        $this->assertNotEmpty($responseHit['body']);
        $this->assertArrayNotHasKey('errors', $responseHit['body']);
        $this->assertEquals('PRODUCT', $responseHit['body']['urlResolver']['type']);
    }
    /**
     * Tests that X-Magento-tags and cache debug headers are correct for category urlResolver
     *
     * @magentoApiDataFixture Magento/CatalogUrlRewrite/_files/product_with_category.php
     */
    public function testCacheTagsForCategory()
    {
        $categoryUrlKey = 'cat-1.html';
        $productSku = 'p002';
        /** @var ProductRepositoryInterface $productRepository */
        $productRepository = Bootstrap::getObjectManager()->get(ProductRepositoryInterface::class);
        /** @var Product $product */
        $product = $productRepository->get($productSku, false, null, true);
        $storeId = $product->getStoreId();

        /** @var  UrlFinderInterface $urlFinder */
        $urlFinder = Bootstrap::getObjectManager()->get(UrlFinderInterface::class);
        $actualUrls = $urlFinder->findOneByData(
            [
                'request_path' => $categoryUrlKey,
                'store_id' => $storeId
            ]
        );
        $categoryId = $actualUrls->getEntityId();
        $query = $this->getUrlResolverQuery($categoryUrlKey);
        $responseMiss = $this->graphQlQueryWithResponseHeaders($query);
        $this->assertArrayHasKey('X-Magento-Tags', $responseMiss['headers']);
        $actualTags = explode(',', $responseMiss['headers']['X-Magento-Tags']);
        $expectedTags = ["cat_c", "cat_c_{$categoryId}", "FPC"];
        $this->assertEquals($expectedTags, $actualTags);

        //cache-debug should be a MISS on first request
        $this->assertArrayHasKey('X-Magento-Cache-Debug', $responseMiss['headers']);
        $this->assertEquals('MISS', $responseMiss['headers']['X-Magento-Cache-Debug']);

        //cache-debug should be a HIT on second request
        $responseHit = $this->graphQlQueryWithResponseHeaders($query);
        $this->assertArrayHasKey('X-Magento-Cache-Debug', $responseHit['headers']);
        $this->assertEquals('HIT', $responseHit['headers']['X-Magento-Cache-Debug']);

        //verify cached data is correct
        $this->assertNotEmpty($responseHit['body']);
        $this->assertArrayNotHasKey('errors', $responseHit['body']);
        $this->assertEquals('CATEGORY', $responseHit['body']['urlResolver']['type']);
    }
    /**
     * Test that X-Magento-Tags Cache debug headers are correct for cms page url resolver
     *
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @magentoApiDataFixture Magento/Cms/_files/pages.php
     */
    public function testUrlResolverCachingForCMSPage()
    {
        /** @var \Magento\Cms\Model\Page $page */
        $page = Bootstrap::getObjectManager()->get(\Magento\Cms\Model\Page::class);
        $page->load('page100');
<<<<<<< HEAD
        $requestPath = $page->getIdentifier();

        $query = $this->getUrlResolverQuery($requestPath);
        $response = $this->graphQlQueryWithResponseHeaders($query);
        $this->assertArrayHasKey(CacheIdCalculator::CACHE_ID_HEADER, $response['headers']);
        $cacheIdForCmsPage = $response['headers'][CacheIdCalculator::CACHE_ID_HEADER];
        // Verify we obtain a cache MISS the first time
        $this->assertCacheMissAndReturnResponse(
            $query,
            [CacheIdCalculator::CACHE_ID_HEADER => $cacheIdForCmsPage]
        );
        // Verify we obtain a cache HIT the second time
        $cachedResponse = $this->assertCacheHitAndReturnResponse(
            $query,
            [CacheIdCalculator::CACHE_ID_HEADER => $cacheIdForCmsPage]
        );

        //verify cached data is correct
        $this->assertNotEmpty($cachedResponse['body']);
        $this->assertArrayNotHasKey('errors', $cachedResponse['body']);
        $this->assertEquals('CMS_PAGE', $cachedResponse['body']['urlResolver']['type']);
    }

    /**
     * Tests that cache is invalidated when url key is updated and
     * access the original request path
     *
     * @magentoConfigFixture default/system/full_page_cache/caching_application 2
=======
        $cmsPageId = $page->getId();
        $requestPath = $page->getIdentifier();

        $query = $this->getUrlResolverQuery($requestPath);
        $responseMiss = $this->graphQlQueryWithResponseHeaders($query);
        $this->assertArrayHasKey('X-Magento-Tags', $responseMiss['headers']);
        $actualTags = explode(',', $responseMiss['headers']['X-Magento-Tags']);
        $expectedTags = ["cms_p", "cms_p_{$cmsPageId}", "FPC"];
        $this->assertEquals($expectedTags, $actualTags);

        //cache-debug should be a MISS on first request
        $this->assertArrayHasKey('X-Magento-Cache-Debug', $responseMiss['headers']);
        $this->assertEquals('MISS', $responseMiss['headers']['X-Magento-Cache-Debug']);

        //cache-debug should be a HIT on second request
        $responseHit = $this->graphQlQueryWithResponseHeaders($query);
        $this->assertEquals('HIT', $responseHit['headers']['X-Magento-Cache-Debug']);

        //verify cached data is correct
        $this->assertNotEmpty($responseHit['body']);
        $this->assertArrayNotHasKey('errors', $responseHit['body']);
        $this->assertEquals('CMS_PAGE', $responseHit['body']['urlResolver']['type']);
    }
    /**
     * Tests that cache is invalidated when url key is updated and access the original request path
     *
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @magentoApiDataFixture Magento/CatalogUrlRewrite/_files/product_with_category.php
     */
    public function testCacheIsInvalidatedForUrlResolver()
    {
        $productSku = 'p002';
        $urlKey = 'p002.html';
        $urlResolverQuery = $this->getUrlResolverQuery($urlKey);
<<<<<<< HEAD

        // Obtain the X-Magento-Cache-Id from the response
        $response = $this->graphQlQueryWithResponseHeaders($urlResolverQuery);
        $this->assertArrayHasKey(CacheIdCalculator::CACHE_ID_HEADER, $response['headers']);
        $cacheIdForUrlResolver = $response['headers'][CacheIdCalculator::CACHE_ID_HEADER];
        // Verify we obtain a cache MISS the first time
        $this->assertCacheMissAndReturnResponse(
            $urlResolverQuery,
            [CacheIdCalculator::CACHE_ID_HEADER => $cacheIdForUrlResolver]
        );
        // Verify we obtain a cache HIT the second time
        $this->assertCacheHitAndReturnResponse(
            $urlResolverQuery,
            [CacheIdCalculator::CACHE_ID_HEADER => $cacheIdForUrlResolver]
        );

        //Updating the product url key
=======
        $responseMiss = $this->graphQlQueryWithResponseHeaders($urlResolverQuery);
        //cache-debug should be a MISS on first request
        $this->assertEquals('MISS', $responseMiss['headers']['X-Magento-Cache-Debug']);

        //cache-debug should be a HIT on second request
        $urlResolverQuery = $this->getUrlResolverQuery($urlKey);
        $responseHit = $this->graphQlQueryWithResponseHeaders($urlResolverQuery);
        $this->assertEquals('HIT', $responseHit['headers']['X-Magento-Cache-Debug']);

>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        /** @var ProductRepositoryInterface $productRepository */
        $productRepository = Bootstrap::getObjectManager()->get(ProductRepositoryInterface::class);
        /** @var Product $product */
        $product = $productRepository->get($productSku, false, null, true);
        $product->setUrlKey('p002-new.html')->save();

<<<<<<< HEAD
        // Verify we obtain a cache MISS the third time after product url key is updated
        $this->assertCacheMissAndReturnResponse(
            $urlResolverQuery,
            [CacheIdCalculator::CACHE_ID_HEADER => $cacheIdForUrlResolver]
        );
=======
        //cache-debug should be a MISS after updating the url key and accessing the same requestPath or urlKey
        $urlResolverQuery = $this->getUrlResolverQuery($urlKey);
        $responseMiss = $this->graphQlQueryWithResponseHeaders($urlResolverQuery);
        $this->assertEquals('MISS', $responseMiss['headers']['X-Magento-Cache-Debug']);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }

    /**
     * Get url resolver query
     *
     * @param $urlKey
     * @return string
     */
    private function getUrlResolverQuery(string $urlKey): string
    {
        $query = <<<QUERY
{
  urlResolver(url:"{$urlKey}")
  {
   id
   relative_url
   canonical_url
   type
  }
}
QUERY;
        return $query;
    }
}
