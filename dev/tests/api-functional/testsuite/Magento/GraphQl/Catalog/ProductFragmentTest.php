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

namespace Magento\GraphQl\Catalog;

<<<<<<< HEAD
use Exception;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
use Magento\TestFramework\TestCase\GraphQlAbstract;

/**
 * Test for simple product fragment.
 */
class ProductFragmentTest extends GraphQlAbstract
{
    /**
     * @magentoApiDataFixture Magento/Catalog/_files/product_simple.php
<<<<<<< HEAD
     * @throws Exception
     */
    public function testSimpleProductNamedFragment(): void
=======
     */
    public function testSimpleProductFragment()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        $sku = 'simple';
        $name = 'Simple Product';
        $price = 10;

        $query = <<<QUERY
query GetProduct {
  products(filter: { sku: { eq: "$sku" } }) {
    items {
      sku
      ...BasicProductInformation
    }
  }
}

fragment BasicProductInformation on ProductInterface {
  sku
  name
<<<<<<< HEAD
  price_range{
    minimum_price{
      final_price{
=======
  price {
    regularPrice {
      amount {
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        value
      }
    }
  }
}
QUERY;
        $result = $this->graphQlQuery($query);
        $actualProductData = $result['products']['items'][0];
        $this->assertNotEmpty($actualProductData);
        $this->assertEquals($name, $actualProductData['name']);
<<<<<<< HEAD
        $this->assertEquals($price, $actualProductData['price_range']['minimum_price']['final_price']['value']);
    }

    /**
     * @magentoApiDataFixture Magento/Catalog/_files/product_simple.php
     * @throws Exception
     */
    public function testSimpleProductInlineFragment(): void
    {
        $sku = 'simple';
        $name = 'Simple Product';
        $price = 10;

        $query = <<<QUERY
query GetProduct {
  products(filter: { sku: { eq: "$sku" } }) {
    items {
      sku
      ... on ProductInterface {
        name
        price_range{
          minimum_price{
            final_price{
              value
            }
          }
        }
      }
    }
  }
}
QUERY;
        $result = $this->graphQlQuery($query);
        $actualProductData = $result['products']['items'][0];
        $this->assertNotEmpty($actualProductData);
        $this->assertEquals($name, $actualProductData['name']);
        $this->assertEquals($price, $actualProductData['price_range']['minimum_price']['final_price']['value']);
=======
        $this->assertEquals($price, $actualProductData['price']['regularPrice']['amount']['value']);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }
}
