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

namespace Magento\GraphQl\PageCache\Quote\Guest;

<<<<<<< HEAD
use Magento\GraphQlCache\Model\CacheId\CacheIdCalculator;
use Magento\GraphQl\PageCache\GraphQLPageCacheAbstract;
=======
use Magento\TestFramework\TestCase\GraphQlAbstract;
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * Test cart queries are not cached
 *
 * @magentoApiDataFixture Magento/Catalog/_files/products.php
 */
<<<<<<< HEAD
class CartCacheTest extends GraphQLPageCacheAbstract
{
    /**
     * @inheritdoc
     *
     * @magentoConfigFixture default/system/full_page_cache/caching_application 2
     */
    public function testCartIsNotCached()
    {
        $quantity = 2;
        $sku = 'simple';
        $cartId = $this->createEmptyCart();
        $this->addSimpleProductToCart($cartId, $quantity, $sku);
=======
class CartCacheTest extends GraphQlAbstract
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

    public function testCartIsNotCached()
    {
        $qty = 2;
        $sku = 'simple';
        $cartId = $this->createEmptyCart();
        $this->addSimpleProductToCart($cartId, $qty, $sku);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

        $getCartQuery = $this->getCartQuery($cartId);
        $responseMiss = $this->graphQlQueryWithResponseHeaders($getCartQuery);
        $this->assertArrayHasKey('cart', $responseMiss['body']);
        $this->assertArrayHasKey('items', $responseMiss['body']['cart']);
<<<<<<< HEAD
        $this->assertArrayHasKey(CacheIdCalculator::CACHE_ID_HEADER, $responseMiss['headers']);
        $cacheId = $responseMiss['headers'][CacheIdCalculator::CACHE_ID_HEADER];
        // Verify we obtain a cache MISS the first time
        $this->assertCacheMissAndReturnResponse($getCartQuery, [CacheIdCalculator::CACHE_ID_HEADER => $cacheId]);

        // Cache debug header value is still a MISS for any subsequent request
        // Verify we obtain a cache MISS the second time
        $this->assertCacheMissAndReturnResponse($getCartQuery, [CacheIdCalculator::CACHE_ID_HEADER => $cacheId]);
=======
        $this->assertEquals('MISS', $responseMiss['headers']['X-Magento-Cache-Debug']);

        /** Cache debug header value is still a MISS for any subsequent request */
        $responseMissNext = $this->graphQlQueryWithResponseHeaders($getCartQuery);
        $this->assertEquals('MISS', $responseMissNext['headers']['X-Magento-Cache-Debug']);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }

    /**
     * Create a guest cart which generates a maskedQuoteId
     *
     * @return string
     */
    private function createEmptyCart(): string
    {
        $query =
            <<<QUERY
        mutation
            {
               createEmptyCart
            }
QUERY;

        $response = $this->graphQlMutation($query);
        $maskedQuoteId = $response['createEmptyCart'];
        return $maskedQuoteId;
    }

    /**
     * Add simple product to the cart using the maskedQuoteId
     *
     * @param string $maskedCartId
<<<<<<< HEAD
     * @param float $quantity
     * @param string $sku
     */
    private function addSimpleProductToCart(string $maskedCartId, float $quantity, string $sku): void
    {
        $addProductToCartQuery =
            <<<QUERY
        mutation {
=======
     * @param int $qty
     * @param string $sku
     */
    private function addSimpleProductToCart(string $maskedCartId, int $qty, string $sku): void
    {
        $addProductToCartQuery =
            <<<QUERY
        mutation {  
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        addSimpleProductsToCart(
          input: {
            cart_id: "{$maskedCartId}"
            cart_items: [
              {
                data: {
<<<<<<< HEAD
                  quantity: $quantity
=======
                  qty: $qty
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                  sku: "$sku"
                }
              }
            ]
          }
        ) {
          cart {
            items {
<<<<<<< HEAD
              quantity
=======
              qty
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
              product {
                sku
              }
            }
          }
        }
        }
QUERY;
        $response = $this->graphQlMutation($addProductToCartQuery);
        self::assertArrayHasKey('cart', $response['addSimpleProductsToCart']);
    }

    /**
     * Get cart query string
     *
     * @param string $maskedQuoteId
     * @return string
     */
    private function getCartQuery(string $maskedQuoteId): string
    {
        return <<<QUERY
{
  cart(cart_id: "{$maskedQuoteId}") {
    items {
      id
<<<<<<< HEAD
      quantity
=======
      qty
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
      product {
        sku
      }
    }
  }
}
QUERY;
    }
}
