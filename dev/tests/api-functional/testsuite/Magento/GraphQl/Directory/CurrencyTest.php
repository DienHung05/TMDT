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

namespace Magento\GraphQl\Directory;

use Magento\TestFramework\TestCase\GraphQlAbstract;

/**
 * Test the GraphQL endpoint's Currency query
 */
class CurrencyTest extends GraphQlAbstract
{
<<<<<<< HEAD
    /**
     * Test stores set up:
     *      STORE - WEBSITE - STORE GROUP
     *      default - base - main_website_store
     *      test - base - main_website_store
     *
     * @magentoApiDataFixture Magento/Store/_files/store.php
     * @magentoConfigFixture default/currency/options/base USD
     * @magentoConfigFixture default/currency/options/default USD
     * @magentoConfigFixture default/currency/options/allow USD
     * @magentoConfigFixture test_store currency/options/base USD
     * @magentoConfigFixture test_store currency/options/default CNY
     * @magentoConfigFixture test_store currency/options/allow CNY,USD
     * @magentoDataFixture Magento/Directory/_files/usd_cny_rate.php
     */
    public function testGetCurrency()
    {
        $result = $this->graphQlQuery($this->getQuery());
        $this->assertArrayHasKey('currency', $result);
        $this->assertEquals('USD', $result['currency']['base_currency_code']);
        $this->assertEquals('USD', $result['currency']['default_display_currency_code']);
        $this->assertEquals(['USD'], $result['currency']['available_currency_codes']);
        $this->assertEquals('USD', $result['currency']['exchange_rates'][0]['currency_to']);
        $this->assertEquals(1, $result['currency']['exchange_rates'][0]['rate']);

        $result = $this->graphQlQuery(
            $this->getQuery(),
            [],
            '',
            ['Store' => 'test']
        );
        $this->assertArrayHasKey('currency', $result);
        $this->assertEquals('USD', $result['currency']['base_currency_code']);
        $this->assertEquals('CNY', $result['currency']['default_display_currency_code']);
        $this->assertEquals(['CNY','USD'], $result['currency']['available_currency_codes']);
    }

    /**
     * Get query
     *
     * @return string
     */
    private function getQuery(): string
    {
=======
    public function testGetCurrency()
    {
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $query = <<<QUERY
query {
    currency {
        base_currency_code
        base_currency_symbol
        default_display_currency_code
        default_display_currency_symbol
        available_currency_codes
        exchange_rates {
            currency_to
            rate
        }
    }
}
QUERY;
<<<<<<< HEAD
        return $query;
=======

        $result = $this->graphQlQuery($query);
        $this->assertArrayHasKey('currency', $result);
        $this->assertArrayHasKey('base_currency_code', $result['currency']);
        $this->assertArrayHasKey('base_currency_symbol', $result['currency']);
        $this->assertArrayHasKey('default_display_currency_code', $result['currency']);
        $this->assertArrayHasKey('default_display_currency_symbol', $result['currency']);
        $this->assertArrayHasKey('available_currency_codes', $result['currency']);
        $this->assertArrayHasKey('exchange_rates', $result['currency']);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }
}
