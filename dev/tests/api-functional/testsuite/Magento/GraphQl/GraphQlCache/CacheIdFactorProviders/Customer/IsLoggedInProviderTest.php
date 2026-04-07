<?php
/**
<<<<<<< HEAD
 * Copyright 2021 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

namespace Magento\GraphQl\GraphQlCache\CacheIdFactorProviders\Customer;

<<<<<<< HEAD
=======
use Magento\GraphQlCache\Model\CacheId\CacheIdCalculator;
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
use Magento\TestFramework\TestCase\GraphQlAbstract;

/**
 * Test class for IsLoggedIn CacheIdFactorProvider.
 */
class IsLoggedInProviderTest extends GraphQlAbstract
{
    /**
<<<<<<< HEAD
     * Tests cache is not generated for generateToken mutation and other post requests
=======
     * Tests that cache id header is generated for generateToken mutation and other post requests
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     *
     * @magentoApiDataFixture Magento/Customer/_files/customer.php
     * @magentoApiDataFixture Magento/GraphQl/Catalog/_files/simple_product.php
     */
    public function testCacheIdHeaderWithIsLoggedIn()
    {
        $email = 'customer@example.com';
        $password = 'password';
        $generateToken = <<<MUTATION
mutation{
  generateCustomerToken
  (
    email:"{$email}",
     password:"{$password}"
  )
  {
    token
  }
}
MUTATION;
        $tokenResponse = $this->graphQlMutationWithResponseHeaders($generateToken);
<<<<<<< HEAD
        // Verify that the cache is not generated for generate token mutation
        $this->assertEquals('no-cache', $tokenResponse['headers']['Pragma']);
        $this->assertEquals(
            'no-store, no-cache, must-revalidate, max-age=0',
            $tokenResponse['headers']['Cache-Control']
        );
=======
        // Verify that the the cache id is generated for generate token mutation
        $this->assertArrayHasKey(CacheIdCalculator::CACHE_ID_HEADER, $tokenResponse['headers']);
        $cacheIdCustomerToken = $tokenResponse['headers'][CacheIdCalculator::CACHE_ID_HEADER];
        $this->assertTrue((boolean)preg_match('/^[0-9a-f]{64}$/i', $cacheIdCustomerToken));
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $this->assertArrayHasKey('generateCustomerToken', $tokenResponse['body']);
        $customerToken = $tokenResponse['body']['generateCustomerToken']['token'];
        $createEmptyCart = <<<MUTATION
mutation{createEmptyCart}
MUTATION;

        $createCustomerCartResponse = $this->graphQlMutationWithResponseHeaders(
            $createEmptyCart,
            [],
            '',
            ['Authorization' => 'Bearer ' . $customerToken]
        );
<<<<<<< HEAD
        //Verify that the cache is not generated for authorized mutation like createEmptyCart
        $this->assertEquals('no-cache', $createCustomerCartResponse['headers']['Pragma']);
        $this->assertEquals(
            'no-store, no-cache, must-revalidate, max-age=0',
            $createCustomerCartResponse['headers']['Cache-Control']
        );
        $cartId = $createCustomerCartResponse['body']['createEmptyCart'];

        $createGuestCartResponse = $this->graphQlMutationWithResponseHeaders($createEmptyCart);
        //Verify that cache is not generated for unauthorized post requests
        $this->assertEquals('no-cache', $createGuestCartResponse['headers']['Pragma']);
        $this->assertEquals(
            'no-store, no-cache, must-revalidate, max-age=0',
            $createGuestCartResponse['headers']['Cache-Control']
        );
=======
        //Verify that the the cache id is generated for authorized mutation like createEmptyCart
        $this->assertArrayHasKey(CacheIdCalculator::CACHE_ID_HEADER, $createCustomerCartResponse['headers']);
        $cartId = $createCustomerCartResponse['body']['createEmptyCart'];
        $cacheIdCreateCustomerCart = $createCustomerCartResponse['headers'][CacheIdCalculator::CACHE_ID_HEADER];
        $this->assertTrue((boolean)preg_match('/^[0-9a-f]{64}$/i', $cacheIdCreateCustomerCart));
        $this->assertEquals($cacheIdCustomerToken, $cacheIdCreateCustomerCart);

        $createGuestCartResponse = $this->graphQlMutationWithResponseHeaders($createEmptyCart);
        //Verify that cache id is generated for unauthorized post requests
        $this->assertArrayHasKey(CacheIdCalculator::CACHE_ID_HEADER, $createGuestCartResponse['headers']);
        $cacheIdCreateGuestCart = $createGuestCartResponse['headers'][CacheIdCalculator::CACHE_ID_HEADER];
        $this->assertTrue((boolean)preg_match('/^[0-9a-f]{64}$/i', $cacheIdCreateGuestCart));
        //Verify that cache id generated for customer and guest are not equal
        $this->assertNotEquals($cacheIdCreateCustomerCart, $cacheIdCreateGuestCart);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $addProductToCustomerCart = <<<MUTATION
mutation{
  addSimpleProductsToCart
  (input:{cart_id:"{$cartId}"
    cart_items:{
      data:{
        quantity:2
        sku:"simple_product"
      }    }  }  )
  {
    cart{ items{quantity product{sku}}}}}
MUTATION;
        $addProductToCustomerCartResponse = $this->graphQlMutationWithResponseHeaders(
            $addProductToCustomerCart,
            [],
            '',
            ['Authorization' => 'Bearer ' . $customerToken]
        );
<<<<<<< HEAD
        //Verify that cache is not generated for addSimpleProductsToCart mutation
        $this->assertEquals('no-cache', $addProductToCustomerCartResponse['headers']['Pragma']);
        $this->assertEquals(
            'no-store, no-cache, must-revalidate, max-age=0',
            $addProductToCustomerCartResponse['headers']['Cache-Control']
=======
        $this->assertArrayHasKey(CacheIdCalculator::CACHE_ID_HEADER, $addProductToCustomerCartResponse['headers']);
        //Verify that cache id generated for all subsequent operations by the customer remains consistent
        $this->assertEquals(
            $cacheIdCreateCustomerCart,
            $addProductToCustomerCartResponse['headers'][CacheIdCalculator::CACHE_ID_HEADER]
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        );
    }

    /**
     * Tests that cache id header resets to the one for guest when a customer token is revoked
     *
     * @magentoApiDataFixture Magento/Customer/_files/customer.php
     * @magentoApiDataFixture Magento/GraphQl/Catalog/_files/simple_product.php
     */
    public function testCacheIdHeaderAfterRevokeToken()
    {
<<<<<<< HEAD
        // Get the guest headers
        $guestCartResponse = $this->graphQlMutationWithResponseHeaders('mutation{createEmptyCart}');
        $this->assertEquals('no-cache', $guestCartResponse['headers']['Pragma']);
        $this->assertEquals(
            'no-store, no-cache, must-revalidate, max-age=0',
            $guestCartResponse['headers']['Cache-Control']
        );

        // Get the customer token to send to the revoke mutation
=======
        // Get the guest cache id
        $guestCartResponse = $this->graphQlMutationWithResponseHeaders('mutation{createEmptyCart}');
        $this->assertArrayHasKey(CacheIdCalculator::CACHE_ID_HEADER, $guestCartResponse['headers']);
        $guestCacheId = $guestCartResponse['headers'][CacheIdCalculator::CACHE_ID_HEADER];

        // Get the customer cache id and token to send to the revoke mutation
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $generateToken = <<<MUTATION
mutation{
  generateCustomerToken(email:"customer@example.com", password:"password")
  {token}
}
MUTATION;
        $tokenResponse = $this->graphQlMutationWithResponseHeaders($generateToken);
        $this->assertArrayHasKey('generateCustomerToken', $tokenResponse['body']);
        $customerToken = $tokenResponse['body']['generateCustomerToken']['token'];
<<<<<<< HEAD
        $this->assertEquals('no-cache', $tokenResponse['headers']['Pragma']);
        $this->assertEquals(
            'no-store, no-cache, must-revalidate, max-age=0',
            $tokenResponse['headers']['Cache-Control']
        );

        // Revoke the token and check that cache is not generated
=======
        $this->assertArrayHasKey(CacheIdCalculator::CACHE_ID_HEADER, $tokenResponse['headers']);
        $customerCacheId = $tokenResponse['headers'][CacheIdCalculator::CACHE_ID_HEADER];
        $this->assertNotEquals($customerCacheId, $guestCacheId);

        // Revoke the token and check that it returns the guest cache id
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $revokeCustomerToken = "mutation{revokeCustomerToken{result}}";
        $revokeResponse = $this->graphQlMutationWithResponseHeaders(
            $revokeCustomerToken,
            [],
            '',
            ['Authorization' => 'Bearer ' . $customerToken]
        );
<<<<<<< HEAD
        $this->assertEquals('no-cache', $revokeResponse['headers']['Pragma']);
        $this->assertEquals(
            'no-store, no-cache, must-revalidate, max-age=0',
            $revokeResponse['headers']['Cache-Control']
        );
=======
        $this->assertArrayHasKey(CacheIdCalculator::CACHE_ID_HEADER, $revokeResponse['headers']);
        $revokeCacheId = $revokeResponse['headers'][CacheIdCalculator::CACHE_ID_HEADER];
        $this->assertEquals($guestCacheId, $revokeCacheId);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }
}
