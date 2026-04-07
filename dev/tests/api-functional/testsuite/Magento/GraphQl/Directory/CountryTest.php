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
<<<<<<< HEAD
 * Test the GraphQL endpoint's Countries query
 */
class CountryTest extends GraphQlAbstract
{
    /**
     * Test stores set up:
     *      STORE - WEBSITE - STORE GROUP
     *      default - base - main_website_store
     *      test - base - main_website_store
     *
     * @magentoApiDataFixture Magento/Store/_files/store.php
     * @magentoConfigFixture default/general/locale/code en_US
     * @magentoConfigFixture default/general/country/allow US
     * @magentoConfigFixture test_store general/locale/code en_US
     * @magentoConfigFixture test_store general/country/allow US,DE
     */
    public function testGetDefaultStoreUSCountry()
    {
        $result = $this->graphQlQuery($this->getQuery('US'));
        $this->assertArrayHasKey('country', $result);
        $this->assertEquals('US', $result['country']['id']);
        $this->assertEquals('US', $result['country']['two_letter_abbreviation']);
        $this->assertEquals('USA', $result['country']['three_letter_abbreviation']);
        $this->assertEquals('United States', $result['country']['full_name_locale']);
        $this->assertEquals('United States', $result['country']['full_name_english']);
        $this->assertCount(65, $result['country']['available_regions']);
=======
 * Test the GraphQL endpoint's Coutries query
 */
class CountryTest extends GraphQlAbstract
{
    public function testGetCountry()
    {
        $query = <<<QUERY
query {
    country(id: "US") {
        id
        two_letter_abbreviation
        three_letter_abbreviation
        full_name_locale
        full_name_english
        available_regions {
            id
            code
            name
        }
    }
}
QUERY;

        $result = $this->graphQlQuery($query);
        $this->assertArrayHasKey('country', $result);
        $this->assertArrayHasKey('id', $result['country']);
        $this->assertArrayHasKey('two_letter_abbreviation', $result['country']);
        $this->assertArrayHasKey('three_letter_abbreviation', $result['country']);
        $this->assertArrayHasKey('full_name_locale', $result['country']);
        $this->assertArrayHasKey('full_name_english', $result['country']);
        $this->assertArrayHasKey('available_regions', $result['country']);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $this->assertArrayHasKey('id', $result['country']['available_regions'][0]);
        $this->assertArrayHasKey('code', $result['country']['available_regions'][0]);
        $this->assertArrayHasKey('name', $result['country']['available_regions'][0]);
    }

    /**
<<<<<<< HEAD
     * Test stores set up:
     *      STORE - WEBSITE - STORE GROUP
     *      default - base - main_website_store
     *      test - base - main_website_store
     *
     * @magentoApiDataFixture Magento/Store/_files/store.php
     * @magentoConfigFixture default/general/locale/code en_US
     * @magentoConfigFixture default/general/country/allow US
     * @magentoConfigFixture test_store general/locale/code en_US
     * @magentoConfigFixture test_store general/country/allow US,DE
     */
    public function testGetTestStoreDECountry()
    {
        $result = $this->graphQlQuery(
            $this->getQuery('DE'),
            [],
            '',
            ['Store' => 'test']
        );
        $this->assertArrayHasKey('country', $result);
        $this->assertEquals('DE', $result['country']['id']);
        $this->assertEquals('DE', $result['country']['two_letter_abbreviation']);
        $this->assertEquals('DEU', $result['country']['three_letter_abbreviation']);
        $this->assertEquals('Germany', $result['country']['full_name_locale']);
        $this->assertEquals('Germany', $result['country']['full_name_english']);
        $this->assertCount(16, $result['country']['available_regions']);
        $this->assertArrayHasKey('id', $result['country']['available_regions'][0]);
        $this->assertArrayHasKey('code', $result['country']['available_regions'][0]);
        $this->assertArrayHasKey('name', $result['country']['available_regions'][0]);
    }

    /**
     * Test stores set up:
     *      STORE - WEBSITE - STORE GROUP
     *      default - base - main_website_store
     *      test - base - main_website_store
     *
     * @magentoApiDataFixture Magento/Store/_files/store.php
     * @magentoConfigFixture default/general/locale/code en_US
     * @magentoConfigFixture default/general/country/allow US
     * @magentoConfigFixture test_store general/locale/code en_US
     * @magentoConfigFixture test_store general/country/allow US,DE
     */
    public function testGetDefaultStoreDECountryNotFoundException()
=======
     */
    public function testGetCountryNotFoundException()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('GraphQL response contains errors: The country isn\'t available.');

<<<<<<< HEAD
        $this->graphQlQuery($this->getQuery('DE'));
    }

    /**
     * Test that getCountryInfo throws exception for obsolete country
     */
    public function testGetObsoleteDECountryNotFoundException()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('GraphQL response contains errors: The country isn\'t available.');

        $this->graphQlQuery($this->getQuery('AN'));
    }

=======
        $query = <<<QUERY
query {
    country(id: "BLAH") {
        id
        two_letter_abbreviation
        three_letter_abbreviation
        full_name_locale
        full_name_english
        available_regions {
            id
            code
            name
        }
    }
}
QUERY;

        $this->graphQlQuery($query);
    }

    /**
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testMissedInputParameterException()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Country "id" value should be specified');

        $query = <<<QUERY
{
  country {
    available_regions {
      code
      id
      name
    }
  }
}
QUERY;

        $this->graphQlQuery($query);
    }
<<<<<<< HEAD

    /**
     * Get query
     *
     * @param string $countryId
     * @return string
     */
    private function getQuery(string $countryId): string
    {
        return <<<QUERY
query {
    country(id: {$countryId}) {
        id
        two_letter_abbreviation
        three_letter_abbreviation
        full_name_locale
        full_name_english
        available_regions {
            id
            code
            name
        }
    }
}
QUERY;
    }
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
}
