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
use Magento\Catalog\Test\Fixture\Product as ProductFixture;
use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Customer\Model\Group;
use Magento\Customer\Test\Fixture\Customer as CustomerFixture;
use Magento\Framework\Exception\AuthenticationException;
use Magento\Framework\Exception\EmailNotConfirmedException;
use Magento\GraphQlCache\Model\CacheId\CacheIdCalculator;
use Magento\Integration\Api\CustomerTokenServiceInterface;
use Magento\TestFramework\Fixture\DataFixture;
use Magento\TestFramework\Fixture\DataFixtureStorage;
use Magento\TestFramework\Fixture\DataFixtureStorageManager;
=======
use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Customer\Model\Group;
use Magento\Framework\Exception\AuthenticationException;
use Magento\GraphQlCache\Model\CacheId\CacheIdCalculator;
use Magento\Integration\Api\CustomerTokenServiceInterface;
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
use Magento\TestFramework\Helper\Bootstrap;
use Magento\TestFramework\TestCase\GraphQlAbstract;

/**
 * Test class for customerGroup CacheIdFactorProvider.
 */
class CustomerGroupProviderTest extends GraphQlAbstract
{
    /**
     * @var CustomerTokenServiceInterface
     */
    private $customerTokenService;

    /**
     * @var Group
     */
    private $customerGroup;

    /**
     * @var CustomerRepositoryInterface
     */
    private $customerRepository;

<<<<<<< HEAD
    /**
     * @var DataFixtureStorage
     */
    private $fixtures;

    protected function setUp(): void
    {
        $this->customerTokenService = Bootstrap::getObjectManager()->get(CustomerTokenServiceInterface::class);
        $this->customerGroup = Bootstrap::getObjectManager()->get(Group::class);
        $this->customerRepository = Bootstrap::getObjectManager()->get(CustomerRepositoryInterface::class);
        $this->fixtures = Bootstrap::getObjectManager()->get(DataFixtureStorageManager::class)->getStorage();
=======
    protected function setUp(): void
    {
        $objectManager = Bootstrap::getObjectManager();
        $this->customerTokenService = $objectManager->get(CustomerTokenServiceInterface::class);
        $this->customerGroup = $objectManager->get(Group::class);
        $this->customerRepository = $objectManager->get(CustomerRepositoryInterface::class);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }

    /**
     * Tests that cache id header changes based on customer group and remains consistent for same customer group
<<<<<<< HEAD
     */
    #[
        DataFixture(ProductFixture::class, as: 'product'),
        DataFixture(CustomerFixture::class, as: 'customer'),
    ]
    public function testCacheIdHeaderWithCustomerGroup(): void
    {
        $customerEmail = $this->fixtures->get('customer')->getEmail();
        $query = <<<QUERY
         {
               products(filter: {sku: {eq: "{$this->fixtures->get('product')->getSku()}"}})
               {
                   items {
                       id
                       name
                       sku
                       description {
                       html
                       }
                   }
               }
           }
        QUERY;
        $response = $this->graphQlQueryWithResponseHeaders(
            $query,
            [],
            '',
            $this->getHeaderMap($customerEmail)
        );
        $this->assertArrayHasKey(CacheIdCalculator::CACHE_ID_HEADER, $response['headers']);
        $cacheId = $response['headers'][CacheIdCalculator::CACHE_ID_HEADER];
        $this->assertTrue((bool)preg_match('/^[0-9a-f]{64}$/i', $cacheId));
        $customer = $this->customerRepository->get($customerEmail);
        $customerGroupId = $this->customerGroup->load('Retailer', 'customer_group_code')->getId();
=======
     *
     * @magentoApiDataFixture Magento/Customer/_files/customer.php
     * @magentoApiDataFixture Magento/GraphQl/Catalog/_files/simple_product.php
     */
    public function testCacheIdHeaderWithCustomerGroup()
    {
        $sku = 'simple_product';
        $query = <<<QUERY
 {
           products(filter: {sku: {eq: "{$sku}"}})
           {
               items {
                   id
                   name
                   sku
                   description {
                   html
                   }
               }
           }
       }
QUERY;
        $response = $this->graphQlQueryWithResponseHeaders($query, [], '', $this->getHeaderMap());
        $this->assertArrayHasKey(CacheIdCalculator::CACHE_ID_HEADER, $response['headers']);
        $cacheId = $response['headers'][CacheIdCalculator::CACHE_ID_HEADER];
        $this->assertTrue((boolean)preg_match('/^[0-9a-f]{64}$/i', $cacheId));
        $groupCode = 'Retailer';
        $customer = $this->customerRepository->get('customer@example.com');
        $customerGroupId = $this->customerGroup->load($groupCode, 'customer_group_code')->getId();
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        // change the customer group of this customer from the default group
        $customer->setGroupId($customerGroupId);
        $this->customerRepository->save($customer);
        $responseAfterCustomerGroupChange = $this->graphQlQueryWithResponseHeaders(
            $query,
            [],
            '',
<<<<<<< HEAD
            $this->getHeaderMap($customerEmail)
        );
        $this->assertArrayHasKey(
            CacheIdCalculator::CACHE_ID_HEADER,
            $responseAfterCustomerGroupChange['headers']
        );
        $cacheIdCustomerGroupChange = $responseAfterCustomerGroupChange['headers'][CacheIdCalculator::CACHE_ID_HEADER];
        // Verify that the cache id generated is a 64 character long
        $this->assertTrue((bool)preg_match('/^[0-9a-f]{64}$/i', $cacheId));
=======
            $this->getHeaderMap()
        );
        $this->assertArrayHasKey(CacheIdCalculator::CACHE_ID_HEADER, $responseAfterCustomerGroupChange['headers']);
        $cacheIdCustomerGroupChange = $responseAfterCustomerGroupChange['headers'][CacheIdCalculator::CACHE_ID_HEADER];
        // Verify that the the cache id generated is a 64 character long
        $this->assertTrue((boolean)preg_match('/^[0-9a-f]{64}$/i', $cacheId));
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        // check that the cache ids generated before and after customer group changes are not equal
        $this->assertNotEquals($cacheId, $cacheIdCustomerGroupChange);
        //Change the customer groupId back to Default General
        $customer->setGroupId(1);
        $this->customerRepository->save($customer);
        $responseDefaultCustomerGroup = $this->graphQlQueryWithResponseHeaders(
            $query,
            [],
            '',
<<<<<<< HEAD
            $this->getHeaderMap($customerEmail)
        );
        //Verify that the cache id is same as original $cacheId
        $this->assertEquals(
            $responseDefaultCustomerGroup['headers'][CacheIdCalculator::CACHE_ID_HEADER],
            $cacheId
        );
=======
            $this->getHeaderMap()
        );
        $cacheIdDefaultCustomerGroup = $responseDefaultCustomerGroup['headers'][CacheIdCalculator::CACHE_ID_HEADER];
        //Verify that the cache id is same as original $cacheId
        $this->assertEquals($cacheIdDefaultCustomerGroup, $cacheId);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }

    /**
     * Authentication header map
     *
     * @param string $username
<<<<<<< HEAD
     * @return array
     *
     * @throws AuthenticationException
     * @throws EmailNotConfirmedException
     */
    private function getHeaderMap(string $username): array
    {
        $customerToken = $this->customerTokenService->createCustomerAccessToken($username, 'password');

        return ['Authorization' => 'Bearer ' . $customerToken];
    }
=======
     * @param string $password
     *
     * @return array
     *
     * @throws AuthenticationException
     */
    private function getHeaderMap(string $username = 'customer@example.com', string $password = 'password'): array
    {
        $customerToken = $this->customerTokenService->createCustomerAccessToken($username, $password);

        return ['Authorization' => 'Bearer ' . $customerToken];
    }

>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
}
