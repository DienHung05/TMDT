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
<<<<<<< HEAD
use Magento\Customer\Api\Data\CustomerInterface;
use Magento\Customer\Model\CustomerAuthUpdate;
use Magento\Customer\Test\Fixture\Customer;
use Magento\Framework\Exception\AuthenticationException;
use Magento\Integration\Api\CustomerTokenServiceInterface;
use Magento\TestFramework\Fixture\DataFixture;
use Magento\TestFramework\Fixture\DataFixtureStorageManager;
=======
use Magento\Customer\Model\CustomerAuthUpdate;
use Magento\Framework\Exception\AuthenticationException;
use Magento\Integration\Api\CustomerTokenServiceInterface;
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
use Magento\TestFramework\Helper\Bootstrap;
use Magento\TestFramework\TestCase\GraphQlAbstract;

/**
 * Tests for update customer
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
class UpdateCustomerTest extends GraphQlAbstract
{
    /**
     * @var CustomerTokenServiceInterface
     */
    private $customerTokenService;

    /**
     * @var CustomerAuthUpdate
     */
    private $customerAuthUpdate;

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
        $this->customerAuthUpdate = Bootstrap::getObjectManager()->get(CustomerAuthUpdate::class);
        $this->lockCustomer = Bootstrap::getObjectManager()->get(LockCustomer::class);
<<<<<<< HEAD
        $this->customer = DataFixtureStorageManager::getStorage()->get('customer');
    }

    public function testUpdateCustomer()
    {
        $currentPassword = 'password';
=======
    }

    /**
     * @magentoApiDataFixture Magento/Customer/_files/customer.php
     */
    public function testUpdateCustomer()
    {
        $currentEmail = 'customer@example.com';
        $currentPassword = 'password';

>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $newPrefix = 'Dr';
        $newFirstname = 'Richard';
        $newMiddlename = 'Riley';
        $newLastname = 'Rowe';
        $newSuffix = 'III';
        $newDob = '3/11/1972';
        $newTaxVat = 'GQL1234567';
        $newGender = 2;
        $newEmail = 'customer_updated@example.com';

        $query = <<<QUERY
mutation {
    updateCustomer(
        input: {
            prefix: "{$newPrefix}"
            firstname: "{$newFirstname}"
            middlename: "{$newMiddlename}"
            lastname: "{$newLastname}"
            suffix: "{$newSuffix}"
            date_of_birth: "{$newDob}"
            taxvat: "{$newTaxVat}"
            email: "{$newEmail}"
            password: "{$currentPassword}"
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

        $this->assertEquals($newPrefix, $response['updateCustomer']['customer']['prefix']);
        $this->assertEquals($newFirstname, $response['updateCustomer']['customer']['firstname']);
        $this->assertEquals($newMiddlename, $response['updateCustomer']['customer']['middlename']);
        $this->assertEquals($newLastname, $response['updateCustomer']['customer']['lastname']);
        $this->assertEquals($newSuffix, $response['updateCustomer']['customer']['suffix']);
        $this->assertEquals($newDob, $response['updateCustomer']['customer']['date_of_birth']);
        $this->assertEquals($newTaxVat, $response['updateCustomer']['customer']['taxvat']);
        $this->assertEquals($newEmail, $response['updateCustomer']['customer']['email']);
        $this->assertEquals($newGender, $response['updateCustomer']['customer']['gender']);
    }

<<<<<<< HEAD
=======
    /**
     * @magentoApiDataFixture Magento/Customer/_files/customer.php
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testUpdateCustomerIfInputDataIsEmpty()
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
    updateCustomer(
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
    public function testUpdateCustomerIfUserIsNotAuthorized()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('The current customer isn\'t authorized.');

        $newFirstname = 'Richard';

        $query = <<<QUERY
mutation {
    updateCustomer(
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
    public function testUpdateCustomerIfAccountIsLocked()
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
    updateCustomer(
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

=======
        $this->graphQlMutation($query, [], '', $this->getCustomerAuthHeaders($currentEmail, $currentPassword));
    }

    /**
     * @magentoApiDataFixture Magento/Customer/_files/customer.php
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testUpdateEmailIfPasswordIsMissed()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Provide the current "password" to change "email".');

<<<<<<< HEAD
=======
        $currentEmail = 'customer@example.com';
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $currentPassword = 'password';
        $newEmail = 'customer_updated@example.com';

        $query = <<<QUERY
mutation {
    updateCustomer(
        input: {
            email: "{$newEmail}"
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
     * @magentoApiDataFixture Magento/Customer/_files/customer.php
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testUpdateEmailIfPasswordIsInvalid()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Invalid login or password.');

<<<<<<< HEAD
=======
        $currentEmail = 'customer@example.com';
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $currentPassword = 'password';
        $invalidPassword = 'invalid_password';
        $newEmail = 'customer_updated@example.com';

        $query = <<<QUERY
mutation {
    updateCustomer(
        input: {
            email: "{$newEmail}"
            password: "{$invalidPassword}"
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

    #[
        DataFixture(
            Customer::class,
            [
                'email' => 'customer@example.com',
            ],
            'customer'
        ),
        DataFixture(
            Customer::class,
            [
                'email' => 'customer_two@example.com',
            ],
            'customer2'
        )
    ]
=======
        $this->graphQlMutation($query, [], '', $this->getCustomerAuthHeaders($currentEmail, $currentPassword));
    }

    /**
     * @magentoApiDataFixture Magento/Customer/_files/two_customers.php
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testUpdateEmailIfEmailAlreadyExists()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage(
            'A customer with the same email address already exists in an associated website.'
        );

<<<<<<< HEAD
        $currentPassword = 'password';
        $existedEmail = DataFixtureStorageManager::getStorage()->get('customer2')->getEmail();
=======
        $currentEmail = 'customer@example.com';
        $currentPassword = 'password';
        $existedEmail = 'customer_two@example.com';
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $firstname = 'Richard';
        $lastname = 'Rowe';

        $query = <<<QUERY
mutation {
    updateCustomer(
        input: {
            email: "{$existedEmail}"
            password: "{$currentPassword}"
            firstname: "{$firstname}"
            lastname: "{$lastname}"
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

    public function testUpdateEmailIfEmailIsInvalid()
    {
=======
        $this->graphQlMutation($query, [], '', $this->getCustomerAuthHeaders($currentEmail, $currentPassword));
    }

    /**
     * @magentoApiDataFixture Magento/Customer/_files/customer.php
     */
    public function testUpdateEmailIfEmailIsInvalid()
    {
        $currentEmail = 'customer@example.com';
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $currentPassword = 'password';
        $invalidEmail = 'customer.example.com';

        $query = <<<QUERY
mutation {
    updateCustomer(
        input: {
            email: "{$invalidEmail}"
            password: "{$currentPassword}"
        }
    ) {
        customer {
            email
        }
    }
}
QUERY;

        $this->expectException(Exception::class);
        $this->expectExceptionMessage('"' . $invalidEmail . '" is not a valid email address.');

<<<<<<< HEAD
        $this->graphQlMutation(
            $query,
            [],
            '',
            $this->getCustomerAuthHeaders($this->customer->getEmail(), $currentPassword)
        );
    }

    public function testEmptyCustomerName()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('"First Name" is a required value.');

=======
        $this->graphQlMutation($query, [], '', $this->getCustomerAuthHeaders($currentEmail, $currentPassword));
    }

    /**
     * @magentoApiDataFixture Magento/Customer/_files/customer.php
     */
    public function testEmptyCustomerName()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Required parameters are missing: First Name');

        $currentEmail = 'customer@example.com';
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $currentPassword = 'password';

        $query = <<<QUERY
mutation {
    updateCustomer(
        input: {
<<<<<<< HEAD
            email: "{$this->customer->getEmail()}"
=======
            email: "{$currentEmail}"
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            password: "{$currentPassword}"
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
    public function testEmptyCustomerLastName()
    {
        $query = <<<QUERY
mutation {
    updateCustomer(
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
    public function testUpdateCustomerWithIncorrectGender()
    {
        $gender = 5;

        $this->expectException(Exception::class);
        $this->expectExceptionMessage('"' . $gender . '" is not a valid gender value.');

        $query = <<<QUERY
mutation {
    updateCustomer(
        input: {
            gender: {$gender}
        }
    ) {
        customer {
            gender
        }
    }
}
QUERY;
<<<<<<< HEAD
        $this->graphQlMutation(
            $query,
            [],
            '',
            $this->getCustomerAuthHeaders($this->customer->getEmail(), 'password')
        );
    }

=======
        $this->graphQlMutation($query, [], '', $this->getCustomerAuthHeaders('customer@example.com', 'password'));
    }

    /**
     * @magentoApiDataFixture Magento/Customer/_files/customer.php
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testUpdateCustomerIfDobIsInvalid()
    {
        $invalidDob = 'bla-bla-bla';

        $query = <<<QUERY
mutation {
    updateCustomer(
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
