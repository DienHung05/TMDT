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

namespace Magento\GraphQl\Customer;

use Exception;
<<<<<<< HEAD
use Magento\Customer\Api\Data\CustomerInterface;
use Magento\Customer\Test\Fixture\Customer;
use Magento\Framework\Exception\AuthenticationException;
use Magento\Integration\Api\CustomerTokenServiceInterface;
use Magento\TestFramework\Fixture\DataFixture;
use Magento\TestFramework\Fixture\DataFixtureStorageManager;
=======
use Magento\Framework\Exception\AuthenticationException;
use Magento\Integration\Api\CustomerTokenServiceInterface;
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
use Magento\TestFramework\Helper\Bootstrap;
use Magento\TestFramework\TestCase\GraphQlAbstract;

/**
 * Tests for new update customer endpoint
 */
<<<<<<< HEAD
#[
    DataFixture(
        Customer::class,
        [
            'email' => 'customer@example.com',
        ],
        'customer'
    )
]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
class UpdateCustomerV2Test extends GraphQlAbstract
{
    /**
     * @var CustomerTokenServiceInterface
     */
    private $customerTokenService;

    /**
     * @var LockCustomer
     */
    private $lockCustomer;

<<<<<<< HEAD
    /**
     * @var CustomerInterface|null
     */
    private $customer;

=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    protected function setUp(): void
    {
        parent::setUp();

        $this->customerTokenService = Bootstrap::getObjectManager()->get(CustomerTokenServiceInterface::class);
        $this->lockCustomer = Bootstrap::getObjectManager()->get(LockCustomer::class);
<<<<<<< HEAD
        $this->customer = DataFixtureStorageManager::getStorage()->get('customer');
    }

    public function testUpdateCustomer(): void
    {
=======
    }

    /**
     * @magentoApiDataFixture Magento/Customer/_files/customer.php
     */
    public function testUpdateCustomer(): void
    {
        $currentEmail = 'customer@example.com';
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $currentPassword = 'password';

        $newPrefix = 'Dr';
        $newFirstname = 'Richard';
        $newMiddlename = 'Riley';
        $newLastname = 'Rowe';
        $newSuffix = 'III';
        $newDob = '3/11/1972';
        $newTaxVat = 'GQL1234567';
        $newGender = 2;

        $query = <<<QUERY
mutation {
    updateCustomerV2(
        input: {
            prefix: "{$newPrefix}"
            firstname: "{$newFirstname}"
            middlename: "{$newMiddlename}"
            lastname: "{$newLastname}"
            suffix: "{$newSuffix}"
            date_of_birth: "{$newDob}"
            taxvat: "{$newTaxVat}"
            gender: {$newGender}
        }
    ) {
        customer {
            prefix
            firstname
            middlename
            lastname
            suffix
            date_of_birth
            taxvat
            email
            gender
        }
    }
}
QUERY;
        $response = $this->graphQlMutation(
            $query,
            [],
            '',
<<<<<<< HEAD
            $this->getCustomerAuthHeaders($this->customer->getEmail(), $currentPassword)
=======
            $this->getCustomerAuthHeaders($currentEmail, $currentPassword)
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        );

        $this->assertEquals($newPrefix, $response['updateCustomerV2']['customer']['prefix']);
        $this->assertEquals($newFirstname, $response['updateCustomerV2']['customer']['firstname']);
        $this->assertEquals($newMiddlename, $response['updateCustomerV2']['customer']['middlename']);
        $this->assertEquals($newLastname, $response['updateCustomerV2']['customer']['lastname']);
        $this->assertEquals($newSuffix, $response['updateCustomerV2']['customer']['suffix']);
        $this->assertEquals($newDob, $response['updateCustomerV2']['customer']['date_of_birth']);
        $this->assertEquals($newTaxVat, $response['updateCustomerV2']['customer']['taxvat']);
        $this->assertEquals($newGender, $response['updateCustomerV2']['customer']['gender']);
    }

<<<<<<< HEAD
=======
    /**
     * @magentoApiDataFixture Magento/Customer/_files/customer.php
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testUpdateCustomerIfInputDataIsEmpty(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('"input" value should be specified');

<<<<<<< HEAD
=======
        $currentEmail = 'customer@example.com';
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $currentPassword = 'password';

        $query = <<<QUERY
mutation {
    updateCustomerV2(
        input: {

        }
    ) {
        customer {
            firstname
        }
    }
}
QUERY;
<<<<<<< HEAD
        $this->graphQlMutation(
            $query,
            [],
            '',
            $this->getCustomerAuthHeaders($this->customer->getEmail(), $currentPassword)
        );
    }

=======
        $this->graphQlMutation($query, [], '', $this->getCustomerAuthHeaders($currentEmail, $currentPassword));
    }

    /**
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testUpdateCustomerIfUserIsNotAuthorized(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('The current customer isn\'t authorized.');

        $newFirstname = 'Richard';

        $query = <<<QUERY
mutation {
    updateCustomerV2(
        input: {
            firstname: "{$newFirstname}"
        }
    ) {
        customer {
            firstname
        }
    }
}
QUERY;
        $this->graphQlMutation($query);
    }

<<<<<<< HEAD
=======
    /**
     * @magentoApiDataFixture Magento/Customer/_files/customer.php
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testUpdateCustomerIfAccountIsLocked(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('The account is locked.');

<<<<<<< HEAD
        $this->lockCustomer->execute((int)$this->customer->getId());

=======
        $this->lockCustomer->execute(1);

        $currentEmail = 'customer@example.com';
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $currentPassword = 'password';
        $newFirstname = 'Richard';

        $query = <<<QUERY
mutation {
    updateCustomerV2(
        input: {
            firstname: "{$newFirstname}"
        }
    ) {
        customer {
            firstname
        }
    }
}
QUERY;
<<<<<<< HEAD
        $this->graphQlMutation(
            $query,
            [],
            '',
            $this->getCustomerAuthHeaders($this->customer->getEmail(), $currentPassword)
        );
    }

    public function testEmptyCustomerName(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('"First Name" is a required value.');

=======
        $this->graphQlMutation($query, [], '', $this->getCustomerAuthHeaders($currentEmail, $currentPassword));
    }

    /**
     * @magentoApiDataFixture Magento/Customer/_files/customer.php
     */
    public function testEmptyCustomerName(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Required parameters are missing: First Name');

        $currentEmail = 'customer@example.com';
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $currentPassword = 'password';

        $query = <<<QUERY
mutation {
    updateCustomerV2(
        input: {
            firstname: ""
        }
    ) {
        customer {
            email
        }
    }
}
QUERY;
<<<<<<< HEAD
        $this->graphQlMutation(
            $query,
            [],
            '',
            $this->getCustomerAuthHeaders($this->customer->getEmail(), $currentPassword)
        );
    }

=======
        $this->graphQlMutation($query, [], '', $this->getCustomerAuthHeaders($currentEmail, $currentPassword));
    }

    /**
     * @magentoApiDataFixture Magento/Customer/_files/customer.php
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testEmptyCustomerLastName(): void
    {
        $query = <<<QUERY
mutation {
    updateCustomerV2(
        input: {
            lastname: ""
        }
    ) {
        customer {
            lastname
        }
    }
}
QUERY;

        $this->expectException(Exception::class);
<<<<<<< HEAD
        $this->expectExceptionMessage('"Last Name" is a required value.');

        $this->graphQlMutation(
            $query,
            [],
            '',
            $this->getCustomerAuthHeaders($this->customer->getEmail(), 'password')
        );
    }

=======
        $this->expectExceptionMessage('Required parameters are missing: Last Name');

        $this->graphQlMutation($query, [], '', $this->getCustomerAuthHeaders('customer@example.com', 'password'));
    }

    /**
     * @magentoApiDataFixture Magento/Customer/_files/customer.php
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testUpdateCustomerIfDobIsInvalid(): void
    {
        $invalidDob = 'bla-bla-bla';

        $query = <<<QUERY
mutation {
    updateCustomerV2(
        input: {
            date_of_birth: "{$invalidDob}"
        }
    ) {
        customer {
            date_of_birth
        }
    }
}
QUERY;

        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Invalid date');

<<<<<<< HEAD
        $this->graphQlMutation(
            $query,
            [],
            '',
            $this->getCustomerAuthHeaders($this->customer->getEmail(), 'password')
        );
=======
        $this->graphQlMutation($query, [], '', $this->getCustomerAuthHeaders('customer@example.com', 'password'));
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }

    /**
     * @param string $email
     * @param string $password
     * @return array
     * @throws AuthenticationException
     */
    private function getCustomerAuthHeaders(string $email, string $password): array
    {
        $customerToken = $this->customerTokenService->createCustomerAccessToken($email, $password);
        return ['Authorization' => 'Bearer ' . $customerToken];
    }
}
