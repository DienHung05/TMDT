<?php
<<<<<<< HEAD
/**
 * Copyright 2021 Adobe
 * All Rights Reserved.
=======
/*
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

namespace Magento\GraphQl\PageCache;

use Magento\GraphQlCache\Model\CacheId\CacheIdCalculator;
<<<<<<< HEAD
use Magento\Customer\Test\Fixture\Customer;
use Magento\Store\Test\Fixture\Store;
use Magento\Directory\Model\Currency;
use Magento\Store\Api\Data\StoreInterface;
use Magento\Catalog\Test\Fixture\Product;
use Magento\TestFramework\Fixture\DataFixtureStorageManager;
use Magento\TestFramework\Fixture\DataFixture;
use Magento\TestFramework\Fixture\Config as ConfigFixture;
use Magento\PageCache\Model\Config;
use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Customer\Api\Data\CustomerInterface;
=======
use Magento\TestFramework\TestCase\GraphQlAbstract;
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * Test that caching works properly for Varnish when using the X-Magento-Cache-Id
 */
<<<<<<< HEAD
class VarnishTest extends GraphQLPageCacheAbstract
{
    /**
     * Test that we obtain cache MISS/HIT when expected for a guest.
     */
    #[
        ConfigFixture(Config::XML_PAGECACHE_TYPE, Config::VARNISH),
        DataFixture(Product::class, as: 'product')
    ]
    public function testCacheResultForGuest()
    {
        /** @var ProductInterface $product */
        $product = DataFixtureStorageManager::getStorage()->get('product');
        $query = $this->getProductQuery($product->getSku());
=======
class VarnishTest extends GraphQlAbstract
{
    protected function setUp(): void
    {
        $this->markTestSkipped("Tests are skipped until vcl files are merged into mainline");
    }
    /**
     * Test that we obtain cache MISS/HIT when expected for a guest.
     *
     * @magentoConfigFixture default/system/full_page_cache/caching_application 2
     * @magentoApiDataFixture Magento/Catalog/_files/multiple_products.php
     */
    public function testCacheResultForGuest()
    {
        $productSku='simple2';
        $query = $this->getProductQuery($productSku);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

        // Obtain the X-Magento-Cache-Id from the response which will be used as the cache key
        $response = $this->graphQlQueryWithResponseHeaders($query);
        $this->assertArrayHasKey(CacheIdCalculator::CACHE_ID_HEADER, $response['headers']);
<<<<<<< HEAD

        // If no product is returned, we do not test empty response
        if (!empty($response['body']['products']['items'])) {
            $cacheId = $response['headers'][CacheIdCalculator::CACHE_ID_HEADER];

            // Verify we obtain a cache MISS the first time we search the cache using this X-Magento-Cache-Id
            $this->assertCacheMissAndReturnResponse($query, [CacheIdCalculator::CACHE_ID_HEADER => $cacheId]);

            // Verify we obtain a cache HIT the second time around for this X-Magento-Cache-Id
            $this->assertCacheHitAndReturnResponse($query, [CacheIdCalculator::CACHE_ID_HEADER => $cacheId]);
        }
=======
        $cacheId = $response['headers'][CacheIdCalculator::CACHE_ID_HEADER];

        // Verify we obtain a cache MISS the first time we search the cache using this X-Magento-Cache-Id
        $this->assertCacheMiss($query, [CacheIdCalculator::CACHE_ID_HEADER => $cacheId]);

        // Verify we obtain a cache HIT the second time around for this X-Magento-Cache-Id
        $this->assertCacheHit($query, [CacheIdCalculator::CACHE_ID_HEADER => $cacheId]);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }

    /**
     * Test that changing the Store header returns different cache results.
<<<<<<< HEAD
     */
    #[
        ConfigFixture(Config::XML_PAGECACHE_TYPE, Config::VARNISH),
        DataFixture(Store::class, [
            'code' => 'fixture_second_store',
            'name' => 'fixture_second_store'
        ], 'fixture_second_store'),
        DataFixture(Product::class, as: 'product')
    ]
    public function testCacheResultForGuestWithStoreHeader()
    {
        /** @var ProductInterface $product */
        $product = DataFixtureStorageManager::getStorage()->get('product');
        $query = $this->getProductQuery($product->getSku());

        /** @var StoreInterface $store */
        $store = DataFixtureStorageManager::getStorage()->get('fixture_second_store');
=======
     *
     * @magentoConfigFixture default/system/full_page_cache/caching_application 2
     * @magentoApiDataFixture Magento/Store/_files/second_store.php
     * @magentoApiDataFixture Magento/Catalog/_files/multiple_products.php
     */
    public function testCacheResultForGuestWithStoreHeader()
    {
        $productSku = 'simple2';
        $query = $this->getProductQuery($productSku);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

        // Verify caching works as expected without a Store header
        $response = $this->graphQlQueryWithResponseHeaders($query);
        $this->assertArrayHasKey(CacheIdCalculator::CACHE_ID_HEADER, $response['headers']);
        $defaultStoreCacheId = $response['headers'][CacheIdCalculator::CACHE_ID_HEADER];
<<<<<<< HEAD

        // If no product is returned, we do not test empty response
        if (!empty($response['body']['products']['items'])) {
            // Verify we obtain a cache MISS the first time we search the cache using this X-Magento-Cache-Id
            $this->assertCacheMissAndReturnResponse(
                $query,
                [CacheIdCalculator::CACHE_ID_HEADER => $defaultStoreCacheId]
            );
            // Verify we obtain a cache HIT the second time we search the cache using this X-Magento-Cache-Id
            $this->assertCacheHitAndReturnResponse(
                $query,
                [CacheIdCalculator::CACHE_ID_HEADER => $defaultStoreCacheId]
            );

            // Obtain a new X-Magento-Cache-Id using after updating the Store header
            $secondStoreResponse = $this->graphQlQueryWithResponseHeaders(
                $query,
                [],
                '',
                [
                    CacheIdCalculator::CACHE_ID_HEADER => $defaultStoreCacheId,
                    'Store' => $store->getName()
                ]
            );
            $secondStoreCacheId = $secondStoreResponse['headers'][CacheIdCalculator::CACHE_ID_HEADER];

            // Verify we obtain a cache MISS the first time we search by this X-Magento-Cache-Id
            $this->assertCacheMissAndReturnResponse($query, [
                CacheIdCalculator::CACHE_ID_HEADER => $secondStoreCacheId,
                'Store' => $store->getName()
            ]);

            // Verify we obtain a cache HIT the second time around with the Store header
            $this->assertCacheHitAndReturnResponse($query, [
                CacheIdCalculator::CACHE_ID_HEADER => $secondStoreCacheId,
                'Store' => $store->getName()
            ]);

            // Verify we still obtain a cache HIT for the default store
            $this->assertCacheHitAndReturnResponse(
                $query,
                [CacheIdCalculator::CACHE_ID_HEADER => $defaultStoreCacheId]
            );
        }
=======
        $this->assertCacheMiss($query, [CacheIdCalculator::CACHE_ID_HEADER => $defaultStoreCacheId]);
        $this->assertCacheHit($query, [CacheIdCalculator::CACHE_ID_HEADER => $defaultStoreCacheId]);

        // Obtain a new X-Magento-Cache-Id using after updating the Store header
        $secondStoreResponse = $this->graphQlQueryWithResponseHeaders(
            $query,
            [],
            '',
            [
                CacheIdCalculator::CACHE_ID_HEADER => $defaultStoreCacheId,
                'Store' => 'fixture_second_store'
            ]
        );
        $secondStoreCacheId = $secondStoreResponse['headers'][CacheIdCalculator::CACHE_ID_HEADER];

        // Verify we obtain a cache MISS the first time we search by this X-Magento-Cache-Id
        $this->assertCacheMiss($query, [
            CacheIdCalculator::CACHE_ID_HEADER => $secondStoreCacheId,
            'Store' => 'fixture_second_store'
        ]);

        // Verify we obtain a cache HIT the second time around with the Store header
        $this->assertCacheHit($query, [
            CacheIdCalculator::CACHE_ID_HEADER => $secondStoreCacheId,
            'Store' => 'fixture_second_store'
        ]);

        // Verify we still obtain a cache HIT for the default store
        $this->assertCacheHit($query, [CacheIdCalculator::CACHE_ID_HEADER => $defaultStoreCacheId]);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }

    /**
     * Test that changing the Content-Currency header returns different cache results.
<<<<<<< HEAD
     */
    #[
        ConfigFixture(Config::XML_PAGECACHE_TYPE, Config::VARNISH),
        ConfigFixture(Currency::XML_PATH_CURRENCY_ALLOW, 'EUR,USD'),
        DataFixture(Product::class, as: 'product')
    ]
    public function testCacheResultForGuestWithCurrencyHeader()
    {
        /** @var ProductInterface $product */
        $product = DataFixtureStorageManager::getStorage()->get('product');
        $query = $this->getProductQuery($product->getSku());
=======
     *
     * @magentoConfigFixture default/system/full_page_cache/caching_application 2
     * @magentoApiDataFixture Magento/Store/_files/multiple_currencies.php
     * @magentoApiDataFixture Magento/GraphQl/Catalog/_files/simple_product.php
     */
    public function testCacheResultForGuestWithCurrencyHeader()
    {
        $productSku = 'simple_product';
        $query = $this->getProductQuery($productSku);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

        // Verify caching works as expected without a Content-Currency header
        $response = $this->graphQlQueryWithResponseHeaders($query);
        $this->assertArrayHasKey(CacheIdCalculator::CACHE_ID_HEADER, $response['headers']);
        $defaultCurrencyCacheId = $response['headers'][CacheIdCalculator::CACHE_ID_HEADER];
<<<<<<< HEAD

        // If no product is returned, we do not test empty response
        if (!empty($response['body']['products']['items'])) {
            // Verify we obtain a cache MISS the first time we search the cache using this X-Magento-Cache-Id
            $this->assertCacheMissAndReturnResponse(
                $query,
                [CacheIdCalculator::CACHE_ID_HEADER => $defaultCurrencyCacheId]
            );
            // Verify we obtain a cache HIT the second time we search the cache using this X-Magento-Cache-Id
            $this->assertCacheHitAndReturnResponse(
                $query,
                [CacheIdCalculator::CACHE_ID_HEADER => $defaultCurrencyCacheId]
            );

            // Obtain a new X-Magento-Cache-Id using after updating the Content-Currency header
            $secondCurrencyResponse = $this->graphQlQueryWithResponseHeaders(
                $query,
                [],
                '',
                [
                    'Content-Currency' => 'USD'
                ]
            );
            $secondCurrencyCacheId = $secondCurrencyResponse['headers'][CacheIdCalculator::CACHE_ID_HEADER];

            // Verify we obtain a cache MISS the first time we search by this X-Magento-Cache-Id
            $this->assertCacheMissAndReturnResponse($query, [
                CacheIdCalculator::CACHE_ID_HEADER => $secondCurrencyCacheId,
                'Content-Currency' => 'USD'
            ]);

            // Verify we obtain a cache HIT the second time around with the changed currency header
            $this->assertCacheHitAndReturnResponse($query, [
                CacheIdCalculator::CACHE_ID_HEADER => $secondCurrencyCacheId,
                'Content-Currency' => 'USD'
            ]);

            // Verify we still obtain a cache HIT for the default currency ( no Content-Currency header)
            $this->assertCacheHitAndReturnResponse(
                $query,
                [CacheIdCalculator::CACHE_ID_HEADER => $defaultCurrencyCacheId]
            );
        }
=======
        $this->assertCacheMiss($query, [CacheIdCalculator::CACHE_ID_HEADER => $defaultCurrencyCacheId]);
        $this->assertCacheHit($query, [CacheIdCalculator::CACHE_ID_HEADER => $defaultCurrencyCacheId]);

        // Obtain a new X-Magento-Cache-Id using after updating the Content-Currency header
        $secondCurrencyResponse = $this->graphQlQueryWithResponseHeaders(
            $query,
            [],
            '',
            [
                CacheIdCalculator::CACHE_ID_HEADER => $defaultCurrencyCacheId,
                'Content-Currency' => 'EUR'
            ]
        );
        $secondCurrencyCacheId = $secondCurrencyResponse['headers'][CacheIdCalculator::CACHE_ID_HEADER];

        // Verify we obtain a cache MISS the first time we search by this X-Magento-Cache-Id
        $this->assertCacheMiss($query, [
            CacheIdCalculator::CACHE_ID_HEADER => $secondCurrencyCacheId,
            'Content-Currency' => 'EUR'
        ]);

        // Verify we obtain a cache HIT the second time around with the changed currency header
        $this->assertCacheHit($query, [
            CacheIdCalculator::CACHE_ID_HEADER => $secondCurrencyCacheId,
            'Content-Currency' => 'EUR'
        ]);

        // Verify we still obtain a cache HIT for the default currency ( no Content-Currency header)
        $this->assertCacheHit($query, [CacheIdCalculator::CACHE_ID_HEADER => $defaultCurrencyCacheId]);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }

    /**
     * Test that a request with a cache id which differs from the one returned by the response is not cacheable.
<<<<<<< HEAD
     */
    #[
        ConfigFixture(Config::XML_PAGECACHE_TYPE, Config::VARNISH),
        DataFixture(Store::class, [
            'code' => 'fixture_second_store',
            'name' => 'fixture_second_store'
        ], 'fixture_second_store'),
        DataFixture(Product::class, as: 'product')
    ]
    public function testCacheResultForGuestWithOutdatedCacheId()
    {
        /** @var ProductInterface $product */
        $product = DataFixtureStorageManager::getStorage()->get('product');
        $query = $this->getProductQuery($product->getSku());

        /** @var StoreInterface $store */
        $store = DataFixtureStorageManager::getStorage()->get('fixture_second_store');
=======
     *
     * @magentoConfigFixture default/system/full_page_cache/caching_application 2
     * @magentoApiDataFixture Magento/Store/_files/second_store.php
     * @magentoApiDataFixture Magento/GraphQl/Catalog/_files/simple_product.php
     */
    public function testCacheResultForGuestWithOutdatedCacheId()
    {
        $productSku = 'simple_product';
        $query = $this->getProductQuery($productSku);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

        // Verify caching with no headers in the request
        $response = $this->graphQlQueryWithResponseHeaders($query);
        $this->assertArrayHasKey(CacheIdCalculator::CACHE_ID_HEADER, $response['headers']);
        $defaultCacheId = $response['headers'][CacheIdCalculator::CACHE_ID_HEADER];
<<<<<<< HEAD

        // If no product is returned, we do not test empty response
        if (!empty($response['body']['products']['items'])) {
            $this->assertCacheMissAndReturnResponse($query, [CacheIdCalculator::CACHE_ID_HEADER => $defaultCacheId]);
            $this->assertCacheHitAndReturnResponse($query, [CacheIdCalculator::CACHE_ID_HEADER => $defaultCacheId]);

            // Obtain a new X-Magento-Cache-Id using after updating the request with Store header
            $responseWithStore = $this->graphQlQueryWithResponseHeaders(
                $query,
                [],
                '',
                [
                    CacheIdCalculator::CACHE_ID_HEADER => $defaultCacheId,
                    'Store' => $store->getName()
                ]
            );
            $storeCacheId = $responseWithStore['headers'][CacheIdCalculator::CACHE_ID_HEADER];

            // Verify we still get a cache MISS since the cache id in the request
            // doesn't match the cache id from response
            $this->assertCacheMissAndReturnResponse($query, [
                CacheIdCalculator::CACHE_ID_HEADER => $defaultCacheId,
                'Store' => $store->getName()
            ]);

            // Verify we get a cache MISS first time with the updated cache id
            $this->assertCacheMissAndReturnResponse($query, [
                CacheIdCalculator::CACHE_ID_HEADER => $storeCacheId,
                'Store' => $store->getName()
            ]);

            // Verify we obtain a cache HIT second time around with the updated cache id
            $this->assertCacheHitAndReturnResponse($query, [
                CacheIdCalculator::CACHE_ID_HEADER => $storeCacheId,
                'Store' => $store->getName()
            ]);
        }
    }

    /**
     * Test that we obtain cache MISS/HIT when expected for a customer.
     */
    #[
        ConfigFixture(Config::XML_PAGECACHE_TYPE, Config::VARNISH),
        DataFixture(Product::class, as: 'product'),
        DataFixture(Customer::class, [
            'email' => 'customer@example.com',
            'password' => 'password'
        ], 'customer')
    ]
    public function testCacheResultForCustomer()
    {
        /** @var ProductInterface $product */
        $product = DataFixtureStorageManager::getStorage()->get('product');
        $query = $this->getProductQuery($product->getSku());

        /** @var CustomerInterface $customer */
        $customer = DataFixtureStorageManager::getStorage()->get('customer');

        $generateToken = $this->generateCustomerToken($customer->getEmail(), 'password');
        $tokenResponse = $this->graphQlMutationWithResponseHeaders($generateToken);

        // Verify cache is not generated for mutations
        $this->assertEquals('no-cache', $tokenResponse['headers']['Pragma']);
        $this->assertEquals(
            'no-store, no-cache, must-revalidate, max-age=0',
            $tokenResponse['headers']['Cache-Control']
        );
        $customerToken = $tokenResponse['body']['generateCustomerToken']['token'];

        // Obtain the X-Magento-Cache-Id from the response
        $productResponse = $this->graphQlQueryWithResponseHeaders(
=======
        $this->assertCacheMiss($query, [CacheIdCalculator::CACHE_ID_HEADER => $defaultCacheId]);
        $this->assertCacheHit($query, [CacheIdCalculator::CACHE_ID_HEADER => $defaultCacheId]);

        // Obtain a new X-Magento-Cache-Id using after updating the request with Store header
        $responseWithStore = $this->graphQlQueryWithResponseHeaders(
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            $query,
            [],
            '',
            [
<<<<<<< HEAD
                'Authorization' => 'Bearer ' . $customerToken
            ]
        );
        $this->assertArrayHasKey(CacheIdCalculator::CACHE_ID_HEADER, $productResponse['headers']);

        // If no product is returned, we do not test empty response
        if (!empty($productResponse['body']['products']['items'])) {
            $cacheIdForProducts = $productResponse['headers'][CacheIdCalculator::CACHE_ID_HEADER];

            // Verify we obtain cache MISS the first time we search by this X-Magento-Cache-Id
            $this->assertCacheMissAndReturnResponse($query, [
                CacheIdCalculator::CACHE_ID_HEADER => $cacheIdForProducts,
                'Authorization' => 'Bearer ' . $customerToken
            ]);

            // Verify we obtain cache HIT second time using the same X-Magento-Cache-Id
            $this->assertCacheHitAndReturnResponse($query, [
                CacheIdCalculator::CACHE_ID_HEADER => $cacheIdForProducts,
                'Authorization' => 'Bearer ' . $customerToken
            ]);
            $revokeTokenQuery = $this->revokeCustomerToken();

            // Verify that once customer logs out, X-Magento-Cache-Id will be that of an unregistered user
            $revokeTokenResponse = $this->graphQlMutationWithResponseHeaders(
                $revokeTokenQuery,
                [],
                '',
                ['Authorization' => 'Bearer ' . $customerToken]
            );

            //Verify cache is not generated for mutations
            $this->assertEquals('no-cache', $revokeTokenResponse['headers']['Pragma']);
            $this->assertEquals(
                'no-store, no-cache, must-revalidate, max-age=0',
                $revokeTokenResponse['headers']['Cache-Control']
            );
        }
=======
                CacheIdCalculator::CACHE_ID_HEADER => $defaultCacheId,
                'Store' => 'fixture_second_store'
            ]
        );
        $storeCacheId = $responseWithStore['headers'][CacheIdCalculator::CACHE_ID_HEADER];

        // Verify we still get a cache MISS since the cache id in the request doesn't match the cache id from response
        $this->assertCacheMiss($query, [
            CacheIdCalculator::CACHE_ID_HEADER => $defaultCacheId,
            'Store' => 'fixture_second_store'
        ]);

        // Verify we get a cache MISS first time with the updated cache id
        $this->assertCacheMiss($query, [
            CacheIdCalculator::CACHE_ID_HEADER => $storeCacheId,
            'Store' => 'fixture_second_store'
        ]);

        // Verify we obtain a cache HIT second time around with the updated cache id
        $this->assertCacheHit($query, [
            CacheIdCalculator::CACHE_ID_HEADER => $storeCacheId,
            'Store' => 'fixture_second_store'
        ]);
    }

    /**
     * Test that we obtain cache MISS/HIT when expected for a customer.
     *
     * @magentoConfigFixture default/system/full_page_cache/caching_application 2
     * @magentoApiDataFixture Magento/Customer/_files/customer.php
     * @magentoApiDataFixture Magento/GraphQl/Catalog/_files/simple_product.php
     */
    public function testCacheResultForCustomer()
    {
        $productSku = 'simple_product';
        $query = $this->getProductQuery($productSku);

        $email = 'customer@example.com';
        $password = 'password';
        $generateToken = $this->generateCustomerToken($email, $password);
        $tokenResponse = $this->graphQlMutationWithResponseHeaders($generateToken);

        // Obtain the X-Magento-Cache-id from the response and authorization token - customer logs in
        $this->assertArrayHasKey(CacheIdCalculator::CACHE_ID_HEADER, $tokenResponse['headers']);
        $cacheIdCustomer = $tokenResponse['headers'][CacheIdCalculator::CACHE_ID_HEADER];
        $customerToken = $tokenResponse['body']['generateCustomerToken']['token'];

        // Verify we obtain cache MISS the first time we search by this X-Magento-Cache-Id
        $this->assertCacheMiss($query, [
            CacheIdCalculator::CACHE_ID_HEADER => $cacheIdCustomer,
            'Authorization' => 'Bearer ' . $customerToken
        ]);

        // Verify we obtain cache HIT second time using the same X-Magento-Cache-Id
        $this->assertCacheHit($query, [
            CacheIdCalculator::CACHE_ID_HEADER => $cacheIdCustomer,
            'Authorization' => 'Bearer ' . $customerToken
        ]);
        $revokeTokenQuery = $this->revokeCustomerToken();

        // Verify that once customer logs out, X-Magento-Cache-Id will be that of an unregistered user
        $revokeTokenResponse = $this->graphQlMutationWithResponseHeaders(
            $revokeTokenQuery,
            [],
            '',
            [
                CacheIdCalculator::CACHE_ID_HEADER => $cacheIdCustomer,
                'Authorization' => 'Bearer ' . $customerToken
            ]
        );

        $cacheIdGuest = $revokeTokenResponse['headers'][CacheIdCalculator::CACHE_ID_HEADER];
        $this->assertNotEquals($cacheIdCustomer, $cacheIdGuest);

        //Verify that omitting the Auth token doesn't send cached content for a logged-in customer
        $this->assertCacheMiss($query, [CacheIdCalculator::CACHE_ID_HEADER => $cacheIdCustomer]);
        $this->assertCacheMiss($query, [CacheIdCalculator::CACHE_ID_HEADER => $cacheIdCustomer]);
    }

    /**
     * Assert that we obtain a cache MISS when sending the provided query & headers.
     *
     * @param string $query
     * @param array $headers
     */
    private function assertCacheMiss(string $query, array $headers)
    {
        $responseMiss = $this->graphQlQueryWithResponseHeaders($query, [], '', $headers);
        $this->assertArrayHasKey('X-Magento-Cache-Debug', $responseMiss['headers']);
        $this->assertEquals('MISS', $responseMiss['headers']['X-Magento-Cache-Debug']);
    }

    /**
     * Assert that we obtain a cache HIT when sending the provided query & headers.
     *
     * @param string $query
     * @param array $headers
     */
    private function assertCacheHit(string $query, array $headers)
    {
        $responseHit = $this->graphQlQueryWithResponseHeaders($query, [], '', $headers);
        $this->assertArrayHasKey('X-Magento-Cache-Debug', $responseHit['headers']);
        $this->assertEquals('HIT', $responseHit['headers']['X-Magento-Cache-Debug']);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }

    /**
     * Get product query
     *
     * @param string $productSku
     * @return string
     */
    private function getProductQuery(string $productSku): string
    {
        $productQuery = <<<QUERY
       {
           products(filter: {sku: {eq: "{$productSku}"}})
           {
               items {
                   id
                   name
                   sku
               }
           }
       }
QUERY;

        return $productQuery;
    }

    /**
     * @param string $email
     * @param string $password
     * @return string
     */
<<<<<<< HEAD
    private function generateCustomerToken(string $email, string $password): string
=======
    private function generateCustomerToken(string $email, string $password) : string
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return <<<MUTATION
mutation {
	generateCustomerToken(
        email: "{$email}"
        password: "{$password}"
    ) {
        token
    }
}
MUTATION;
    }

    /**
     * @return string
     */
<<<<<<< HEAD
    private function revokeCustomerToken(): string
=======
    private function revokeCustomerToken() : string
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return <<<MUTATION
mutation {
	revokeCustomerToken
	{ result }
}
MUTATION;
    }
}
