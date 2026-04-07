<?php
/**
<<<<<<< HEAD
 * Copyright 2018 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

namespace Magento\GraphQl\Customer;

use Exception;
use Magento\Customer\Api\AccountManagementInterface;
use Magento\Customer\Api\CustomerRepositoryInterface;
<<<<<<< HEAD
use Magento\Integration\Api\AdminTokenServiceInterface;
use Magento\Integration\Api\CustomerTokenServiceInterface;
use Magento\TestFramework\Bootstrap as TestBootstrap;
use Magento\Authorization\Test\Fixture\Role;
use Magento\Customer\Test\Fixture\Customer;
use Magento\TestFramework\Fixture\Config;
use Magento\TestFramework\Fixture\DataFixture;
use Magento\TestFramework\Fixture\DataFixtureStorageManager;
use Magento\TestFramework\Helper\Bootstrap;
use Magento\User\Test\Fixture\User;
=======
use Magento\Customer\Model\CustomerAuthUpdate;
use Magento\Customer\Model\CustomerRegistry;
use Magento\Framework\ObjectManagerInterface;
use Magento\Integration\Api\AdminTokenServiceInterface;
use Magento\Integration\Api\CustomerTokenServiceInterface;
use Magento\TestFramework\Helper\Bootstrap;
use Magento\TestFramework\Bootstrap as TestBootstrap;
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
use Magento\TestFramework\TestCase\GraphQlAbstract;

/**
 * GraphQl tests for @see \Magento\CustomerGraphQl\Model\Customer\GetCustomer.
 */
class GetCustomerTest extends GraphQlAbstract
{
    /**
     * @var CustomerTokenServiceInterface
     */
    private $customerTokenService;

    /**
<<<<<<< HEAD
=======
     * @var CustomerRegistry
     */
    private $customerRegistry;

    /**
     * @var CustomerAuthUpdate
     */
    private $customerAuthUpdate;

    /**
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @var CustomerRepositoryInterface
     */
    private $customerRepository;

    /**
<<<<<<< HEAD
     * @var LockCustomer
     */
    private $lockCustomer;

    /**
     * @inheritDoc
     */
    protected function setUp(): void
    {
        $this->customerTokenService = Bootstrap::getObjectManager()->get(CustomerTokenServiceInterface::class);
        $this->customerRepository = Bootstrap::getObjectManager()->get(CustomerRepositoryInterface::class);
        $this->lockCustomer = Bootstrap::getObjectManager()->get(LockCustomer::class);
    }

    #[
        DataFixture(Customer::class, ['firstname' => 'John', 'lastname' => 'Smith'], 'customer')
    ]
    public function testGetCustomer(): void
    {
        $customerEmail = DataFixtureStorageManager::getStorage()->get('customer')->getEmail();
        $this->assertEquals(
            [
                'customer' => [
                    'firstname' => 'John',
                    'lastname' => 'Smith',
                    'email' => $customerEmail
                ]
            ],
            $this->graphQlQuery(
                $this->getCustomerQuery(),
                [],
                '',
                $this->getCustomerAuthHeaders($customerEmail)
            )
        );
    }

    public function testGetCustomerIfUserIsNotAuthorized(): void
=======
     * @var ObjectManagerInterface
     */
    private $objectManager;

    /**
     * @inheridoc
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->objectManager = Bootstrap::getObjectManager();
        $this->customerTokenService = $this->objectManager->get(CustomerTokenServiceInterface::class);
        $this->customerRegistry = $this->objectManager->get(CustomerRegistry::class);
        $this->customerAuthUpdate = $this->objectManager->get(CustomerAuthUpdate::class);
        $this->customerRepository = $this->objectManager->get(CustomerRepositoryInterface::class);
    }

    /**
     * @magentoApiDataFixture Magento/Customer/_files/customer.php
     */
    public function testGetCustomer()
    {
        $currentEmail = 'customer@example.com';
        $currentPassword = 'password';

        $query = <<<QUERY
query {
    customer {
        id
        firstname
        lastname
        email
    }
}
QUERY;
        $response = $this->graphQlQuery(
            $query,
            [],
            '',
            $this->getCustomerAuthHeaders($currentEmail, $currentPassword)
        );

        $this->assertNull($response['customer']['id']);
        $this->assertEquals('John', $response['customer']['firstname']);
        $this->assertEquals('Smith', $response['customer']['lastname']);
        $this->assertEquals($currentEmail, $response['customer']['email']);
    }

    /**
     */
    public function testGetCustomerIfUserIsNotAuthorized()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('The current customer isn\'t authorized.');

<<<<<<< HEAD
        $this->graphQlQuery($this->getCustomerQuery());
    }

    #[
        DataFixture(Role::class, as: 'role'),
        DataFixture(User::class, ['role_id' => '$role.id$'], 'admin_user')
    ]
    public function testGetCustomerIfUserHasWrongType(): void
    {
        $adminUser = DataFixtureStorageManager::getStorage()->get('admin_user');
        $adminToken = Bootstrap::getObjectManager()->get(AdminTokenServiceInterface::class)
            ->createAdminAccessToken($adminUser->getUserName(), TestBootstrap::ADMIN_PASSWORD);
=======
        $query = <<<QUERY
query {
    customer {
        firstname
        lastname
        email
    }
}
QUERY;
        $this->graphQlQuery($query);
    }

    /**
     * @magentoApiDataFixture Magento/User/_files/user_with_role.php
     * @return void
     */
    public function testGetCustomerIfUserHasWrongType(): void
    {
        /** @var $adminTokenService AdminTokenServiceInterface */
        $adminTokenService = $this->objectManager->get(AdminTokenServiceInterface::class);
        $adminToken = $adminTokenService->createAdminAccessToken('adminUser', TestBootstrap::ADMIN_PASSWORD);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

        $this->expectException(Exception::class);
        $this->expectExceptionMessage('The current customer isn\'t authorized.');

<<<<<<< HEAD
        $this->graphQlQuery(
            $this->getCustomerQuery(),
=======
        $query = <<<QUERY
query {
    customer {
        firstname
        lastname
        email
    }
}
QUERY;
        $this->graphQlQuery(
            $query,
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            [],
            '',
            ['Authorization' => 'Bearer ' . $adminToken]
        );
    }

<<<<<<< HEAD
    #[
        DataFixture(Customer::class, as: 'customer')
    ]
    public function testGetCustomerIfAccountIsLocked(): void
    {
        $customer = DataFixtureStorageManager::getStorage()->get('customer');
        $this->lockCustomer->execute((int)$customer->getId());
=======
    /**
     * @magentoApiDataFixture Magento/Customer/_files/customer.php
     */
    public function testGetCustomerIfAccountIsLocked()
    {
        $currentEmail = 'customer@example.com';
        $currentPassword = 'password';
        $customer = $this->customerRepository->get($currentEmail);

        $this->lockCustomer((int)$customer->getId());
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

        $this->expectException(Exception::class);
        $this->expectExceptionMessage('The account is locked.');

<<<<<<< HEAD
        $this->graphQlQuery(
            $this->getCustomerQuery(),
            [],
            '',
            $this->getCustomerAuthHeaders($customer->getEmail())
        );
    }

    #[
        Config('customer/create_account/confirm', true),
        DataFixture(Customer::class, as: 'customer')
    ]
    public function testAccountIsNotConfirmed(): void
    {
        $this->expectExceptionMessage("This account isn't confirmed. Verify and try again.");
        $customer = DataFixtureStorageManager::getStorage()->get('customer');
        $customerEntity = $this->customerRepository->getById((int)$customer->getId())
            ->setConfirmation(AccountManagementInterface::ACCOUNT_CONFIRMATION_REQUIRED);
        $this->customerRepository->save($customerEntity);

        $this->graphQlQuery(
            $this->getCustomerQuery(),
            [],
            '',
            $this->getCustomerAuthHeaders($customer->getEmail())
=======
        $query = <<<QUERY
query {
    customer {
        firstname
        lastname
        email
    }
}
QUERY;
        $this->graphQlQuery(
            $query,
            [],
            '',
            $this->getCustomerAuthHeaders($currentEmail, $currentPassword)
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        );
    }

    /**
<<<<<<< HEAD
     * Get headers with customer authorization token
     *
     * @param string $email
     * @return array
     */
    private function getCustomerAuthHeaders(string $email): array
    {
        $customerToken = $this->customerTokenService->createCustomerAccessToken($email, 'password');
=======
     * @magentoConfigFixture customer/create_account/confirm 1
     * @magentoApiDataFixture Magento/Customer/_files/customer.php
     *
     */
    public function testAccountIsNotConfirmed()
    {
        $this->expectExceptionMessage("This account isn't confirmed. Verify and try again.");
        $customerEmail = 'customer@example.com';
        $currentPassword = 'password';
        $customer = $this->customerRepository->get($customerEmail);
        $headersMap = $this->getCustomerAuthHeaders($customerEmail, $currentPassword);
        $customer = $this->customerRepository->getById((int)$customer->getId())
            ->setConfirmation(AccountManagementInterface::ACCOUNT_CONFIRMATION_REQUIRED);
        $this->customerRepository->save($customer);
        $query = <<<QUERY
query {
    customer {
        firstname
        lastname
        email
    }
}
QUERY;
        $this->graphQlQuery($query, [], '', $headersMap);
    }

    /**
     * @param string $email
     * @param string $password
     * @return array
     */
    private function getCustomerAuthHeaders(string $email, string $password): array
    {
        $customerToken = $this->customerTokenService->createCustomerAccessToken($email, $password);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

        return ['Authorization' => 'Bearer ' . $customerToken];
    }

    /**
<<<<<<< HEAD
     * Get basic customer query
     *
     * @return string
     */
    private function getCustomerQuery(): string
    {
        return <<<QUERY
            query {
                customer {
                    firstname
                    lastname
                    email
                }
            }
        QUERY;
=======
     * @param int $customerId
     * @return void
     */
    private function lockCustomer(int $customerId): void
    {
        $customerSecure = $this->customerRegistry->retrieveSecureData($customerId);
        $customerSecure->setLockExpires('2030-12-31 00:00:00');
        $this->customerAuthUpdate->saveAuth($customerId);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }
}
