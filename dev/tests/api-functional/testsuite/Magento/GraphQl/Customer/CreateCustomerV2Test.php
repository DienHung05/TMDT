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

<<<<<<< HEAD
use Exception;
use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Framework\Registry;
use Magento\Customer\Test\Fixture\Customer as CustomerFixture;
use Magento\TestFramework\Fixture\Config;
use Magento\TestFramework\Fixture\DataFixture;
use Magento\TestFramework\Fixture\DataFixtureStorageManager;
use Magento\TestFramework\Helper\Bootstrap;
use Magento\TestFramework\TestCase\GraphQlAbstract;
use PHPUnit\Framework\Attributes\DataProvider;
=======
use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Framework\Registry;
use Magento\TestFramework\Helper\Bootstrap;
use Magento\TestFramework\TestCase\GraphQlAbstract;
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * Tests for create customer (V2)
 */
class CreateCustomerV2Test extends GraphQlAbstract
{
    /**
     * @var Registry
     */
    private $registry;

    /**
     * @var CustomerRepositoryInterface
     */
    private $customerRepository;

<<<<<<< HEAD
    /**
     * @var array
     */
    private array $createdCustomerEmails = [];

    protected function setUp(): void
    {
=======
    protected function setUp(): void
    {
        parent::setUp();

>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $this->registry = Bootstrap::getObjectManager()->get(Registry::class);
        $this->customerRepository = Bootstrap::getObjectManager()->get(CustomerRepositoryInterface::class);
    }

    /**
<<<<<<< HEAD
     * Generate a dynamic email address
     *
     * @return string
     */
    private function generateDynamicEmail(): string
    {
        $email = 'customer_test_' . uniqid() . '@example.com';
        $this->createdCustomerEmails[] = $email;
        return $email;
    }

    /**
     * Build GraphQL input fields string from input array
     *
     * @param array $input
     * @return string
     */
    private function buildInputFieldsString(array $input): string
    {
        $inputFields = [];
        foreach ($input as $key => $value) {
            if ($value !== null) {
                $inputFields[] = is_bool($value) ?
                    "{$key}: " . ($value ? 'true' : 'false') :
                    "{$key}: \"{$value}\"";
            }
        }
        return implode("\n            ", $inputFields);
    }

    /**
     * Get the createCustomerV2 mutation with standard customer response fields
     *
     * @param array $input
     * @return string
     */
    private function getCreateCustomerV2Mutation(array $input): string
    {
        $inputString = $this->buildInputFieldsString($input);

        return <<<MUTATION
            mutation {
                createCustomerV2(
                    input: {
                        {$inputString}
                    }
                ) {
                    customer {
                        firstname
                        lastname
                        email
                        is_subscribed
                    }
                }
            }
        MUTATION;
    }

    /**
     * Get the createCustomerV2 mutation with custom response fields
     *
     * @param array $input
     * @param array $responseFields
     * @return string
     */
    private function getCreateCustomerV2MutationWithCustomFields(array $input, array $responseFields): string
    {
        $inputString = $this->buildInputFieldsString($input);
        $responseString = implode("\n            ", $responseFields);

        return <<<MUTATION
            mutation {
                createCustomerV2(
                    input: {
                        {$inputString}
                    }
                ) {
                    customer {
                        {$responseString}
                    }
                }
            }
        MUTATION;
    }

    #[Config('newsletter/general/active', true)]
    public function testCreateCustomerAccountWithPassword(): void
    {
        $email = $this->generateDynamicEmail();
        $response = $this->graphQlMutation($this->getCreateCustomerV2Mutation([
            'firstname' => 'Richard',
            'lastname' => 'Rowe',
            'email' => $email,
            'password' => 'test123#',
            'is_subscribed' => true
        ]));

        $expected = [
            'createCustomerV2' => [
                'customer' => [
                    'firstname' => 'Richard',
                    'lastname' => 'Rowe',
                    'email' => $email,
                    'is_subscribed' => true
                ]
            ]
        ];
        $this->assertEquals($expected, $response);
    }

    public function testCreateCustomerAccountWithoutPassword(): void
    {
        $email = $this->generateDynamicEmail();
        $response = $this->graphQlMutation($this->getCreateCustomerV2Mutation([
            'firstname' => 'Richard',
            'lastname' => 'Rowe',
            'email' => $email,
            'is_subscribed' => true
        ]));

        $expected = [
            'createCustomerV2' => [
                'customer' => [
                    'firstname' => 'Richard',
                    'lastname' => 'Rowe',
                    'email' => $email,
                    'is_subscribed' => true
                ]
            ]
        ];
        $this->assertEquals($expected, $response);
    }

    public function testCreateCustomerIfInputDataIsEmpty(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('CustomerCreateInput.email of required type String! was not provided.');

        $this->graphQlMutation($this->getCreateCustomerV2Mutation([]));
    }

    public function testCreateCustomerIfEmailMissed(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Field CustomerCreateInput.email of required type String! was not provided');

        $this->graphQlMutation($this->getCreateCustomerV2Mutation([
            'firstname' => 'Richard',
            'lastname' => 'Rowe',
            'password' => 'test123#',
            'is_subscribed' => true
        ]));
    }

    /**
     * @param string $email
     * @throws Exception
     */
    #[DataProvider('invalidEmailAddressDataProvider')]
    public function testCreateCustomerIfEmailIsNotValid(string $email): void
    {
        $this->expectExceptionMessage('"' . $email . '" is not a valid email address.');

        $this->graphQlMutation($this->getCreateCustomerV2Mutation([
            'firstname' => 'Richard',
            'lastname' => 'Rowe',
            'email' => $email,
            'password' => 'test123#',
            'is_subscribed' => true
        ]));
    }

    /**
     * Data provider for invalid email addresses
     *
     * @return array
     */
    public static function invalidEmailAddressDataProvider(): array
    {
        return [
            ['plainaddress'],
=======
     * @throws \Exception
     */
    public function testCreateCustomerAccountWithPassword()
    {
        $newFirstname = 'Richard';
        $newLastname = 'Rowe';
        $currentPassword = 'test123#';
        $newEmail = 'new_customer@example.com';

        $query = <<<QUERY
mutation {
    createCustomerV2(
        input: {
            firstname: "{$newFirstname}"
            lastname: "{$newLastname}"
            email: "{$newEmail}"
            password: "{$currentPassword}"
            is_subscribed: true
        }
    ) {
        customer {
            id
            firstname
            lastname
            email
            is_subscribed
        }
    }
}
QUERY;
        $response = $this->graphQlMutation($query);

        $this->assertNull($response['createCustomerV2']['customer']['id']);
        $this->assertEquals($newFirstname, $response['createCustomerV2']['customer']['firstname']);
        $this->assertEquals($newLastname, $response['createCustomerV2']['customer']['lastname']);
        $this->assertEquals($newEmail, $response['createCustomerV2']['customer']['email']);
        $this->assertTrue($response['createCustomerV2']['customer']['is_subscribed']);
    }

    /**
     * @throws \Exception
     */
    public function testCreateCustomerAccountWithoutPassword()
    {
        $newFirstname = 'Richard';
        $newLastname = 'Rowe';
        $newEmail = 'new_customer@example.com';

        $query = <<<QUERY
mutation {
    createCustomerV2(
        input: {
            firstname: "{$newFirstname}"
            lastname: "{$newLastname}"
            email: "{$newEmail}"
            is_subscribed: true
        }
    ) {
        customer {
            id
            firstname
            lastname
            email
            is_subscribed
        }
    }
}
QUERY;
        $response = $this->graphQlMutation($query);

        $this->assertEquals($newFirstname, $response['createCustomerV2']['customer']['firstname']);
        $this->assertEquals($newLastname, $response['createCustomerV2']['customer']['lastname']);
        $this->assertEquals($newEmail, $response['createCustomerV2']['customer']['email']);
        $this->assertTrue($response['createCustomerV2']['customer']['is_subscribed']);
    }

    /**
     */
    public function testCreateCustomerIfInputDataIsEmpty()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('CustomerCreateInput.email of required type String! was not provided.');

        $query = <<<QUERY
mutation {
    createCustomerV2(
        input: {

        }
    ) {
        customer {
            id
            firstname
            lastname
            email
            is_subscribed
        }
    }
}
QUERY;
        $this->graphQlMutation($query);
    }

    /**
     */
    public function testCreateCustomerIfEmailMissed()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Field CustomerCreateInput.email of required type String! was not provided');

        $newFirstname = 'Richard';
        $newLastname = 'Rowe';
        $currentPassword = 'test123#';

        $query = <<<QUERY
mutation {
    createCustomerV2(
        input: {
            firstname: "{$newFirstname}"
            lastname: "{$newLastname}"
            password: "{$currentPassword}"
            is_subscribed: true
        }
    ) {
        customer {
            id
            firstname
            lastname
            email
            is_subscribed
        }
    }
}
QUERY;
        $this->graphQlMutation($query);
    }

    /**
     * @dataProvider invalidEmailAddressDataProvider
     *
     * @param string $email
     * @throws \Exception
     */
    public function testCreateCustomerIfEmailIsNotValid(string $email)
    {
        $firstname = 'Richard';
        $lastname = 'Rowe';
        $password = 'test123#';

        $query = <<<QUERY
mutation {
    createCustomerV2(
        input: {
            firstname: "{$firstname}"
            lastname: "{$lastname}"
            email: "{$email}"
            password: "{$password}"
            is_subscribed: true
        }
    ) {
        customer {
            id
            firstname
            lastname
            email
            is_subscribed
        }
    }
}
QUERY;
        $this->expectExceptionMessage('"' . $email . '" is not a valid email address.');
        $this->graphQlMutation($query);
    }

    /**
     * @return array
     */
    public function invalidEmailAddressDataProvider(): array
    {
        return [
            ['plainaddress'],
            ['jØrgen@somedomain.com'],
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            ['#@%^%#$@#$@#.com'],
            ['@example.com'],
            ['Joe Smith <email@example.com>'],
            ['email.example.com'],
            ['email@example@example.com'],
            ['email@example.com (Joe Smith)'],
<<<<<<< HEAD
            ['email@example']
        ];
    }

    public function testCreateCustomerIfPassedAttributeDoesNotExistInCustomerInput(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Field "test123" is not defined by type "CustomerCreateInput".');

        $email = $this->generateDynamicEmail();
        $query = <<<MUTATION
            mutation {
                createCustomerV2(
                    input: {
                        firstname: "Richard"
                        lastname: "Rowe"
                        test123: "123test123"
                        email: "{$email}"
                        password: "test123#"
                        is_subscribed: true
                    }
                ) {
                    customer {
                        firstname
                        lastname
                        email
                        is_subscribed
                    }
                }
            }
            MUTATION;
        $this->graphQlMutation($query);
    }

    public function testCreateCustomerIfNameEmpty(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('"First Name" is a required value.');

        $this->graphQlMutation($this->getCreateCustomerV2Mutation([
            'email' => $this->generateDynamicEmail(),
            'firstname' => '',
            'lastname' => 'Rowe',
            'password' => 'test123#',
            'is_subscribed' => true
        ]));
    }

    #[Config('newsletter/general/active', false)]
    public function testCreateCustomerSubscribed(): void
    {
        $email = $this->generateDynamicEmail();
        $response = $this->graphQlMutation($this->getCreateCustomerV2MutationWithCustomFields([
            'firstname' => 'Richard',
            'lastname' => 'Rowe',
            'email' => $email,
            'is_subscribed' => true
        ], ['email', 'is_subscribed']));

        $expected = [
            'createCustomerV2' => [
                'customer' => [
                    'email' => $email,
                    'is_subscribed' => false
                ]
            ]
        ];
        $this->assertEquals($expected, $response);
    }

    #[DataFixture(CustomerFixture::class, as: 'existing_customer')]
    public function testCreateCustomerIfCustomerWithProvidedEmailAlreadyExists(): void
    {
        $this->expectException(Exception::class);
=======
            ['email@example'],
            ['“email”@example.com'],
        ];
    }

    /**
     */
    public function testCreateCustomerIfPassedAttributeDosNotExistsInCustomerInput()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Field "test123" is not defined by type CustomerCreateInput.');

        $newFirstname = 'Richard';
        $newLastname = 'Rowe';
        $currentPassword = 'test123#';
        $newEmail = 'new_customer@example.com';

        $query = <<<QUERY
mutation {
    createCustomerV2(
        input: {
            firstname: "{$newFirstname}"
            lastname: "{$newLastname}"
            test123: "123test123"
            email: "{$newEmail}"
            password: "{$currentPassword}"
            is_subscribed: true
        }
    ) {
        customer {
            id
            firstname
            lastname
            email
            is_subscribed
        }
    }
}
QUERY;
        $this->graphQlMutation($query);
    }

    /**
     */
    public function testCreateCustomerIfNameEmpty()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Required parameters are missing: First Name');

        $newEmail = 'customer_created' . rand(1, 2000000) . '@example.com';
        $newFirstname = '';
        $newLastname = 'Rowe';
        $currentPassword = 'test123#';
        $query = <<<QUERY
mutation {
    createCustomerV2(
        input: {
            email: "{$newEmail}"
            firstname: "{$newFirstname}"
            lastname: "{$newLastname}"
            password: "{$currentPassword}"
          	is_subscribed: true
        }
    ) {
        customer {
            id
            firstname
            lastname
            email
            is_subscribed
        }
    }
}
QUERY;
        $this->graphQlMutation($query);
    }

    /**
     * @magentoConfigFixture default_store newsletter/general/active 0
     */
    public function testCreateCustomerSubscribed()
    {
        $newFirstname = 'Richard';
        $newLastname = 'Rowe';
        $newEmail = 'new_customer@example.com';

        $query = <<<QUERY
mutation {
    createCustomerV2(
        input: {
            firstname: "{$newFirstname}"
            lastname: "{$newLastname}"
            email: "{$newEmail}"
            is_subscribed: true
        }
    ) {
        customer {
            email
            is_subscribed
        }
    }
}
QUERY;

        $response = $this->graphQlMutation($query);

        $this->assertFalse($response['createCustomerV2']['customer']['is_subscribed']);
    }

    /**
     * @magentoApiDataFixture Magento/Customer/_files/customer.php
     */
    public function testCreateCustomerIfCustomerWithProvidedEmailAlreadyExists()
    {
        $this->expectException(\Exception::class);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $this->expectExceptionMessage(
            'A customer with the same email address already exists in an associated website.'
        );

<<<<<<< HEAD
        $existingCustomer = DataFixtureStorageManager::getStorage()->get('existing_customer');
        $this->graphQlMutation($this->getCreateCustomerV2MutationWithCustomFields([
            'email' => $existingCustomer->getEmail(),
            'password' => 'test123#',
            'firstname' => 'John',
            'lastname' => 'Smith'
        ], ['firstname', 'lastname', 'email']));
    }

    /**
     * Clean up created customers
     */
    protected function tearDown(): void
    {
        if (!empty($this->createdCustomerEmails)) {
            $this->registry->unregister('isSecureArea');
            $this->registry->register('isSecureArea', true);

            foreach ($this->createdCustomerEmails as $email) {
                try {
                    $customer = $this->customerRepository->get($email);
                    $this->customerRepository->delete($customer);
                } catch (Exception $exception) {
                    // Customer might not exist or already deleted
                    continue;
                }
            }

            $this->registry->unregister('isSecureArea');
            $this->registry->register('isSecureArea', false);
        }

=======
        $existedEmail = 'customer@example.com';
        $password = 'test123#';
        $firstname = 'John';
        $lastname = 'Smith';

        $query = <<<QUERY
mutation {
    createCustomerV2(
        input: {
            email: "{$existedEmail}"
            password: "{$password}"
            firstname: "{$firstname}"
            lastname: "{$lastname}"
        }
    ) {
        customer {
            firstname
            lastname
            email
        }
    }
}
QUERY;
        $this->graphQlMutation($query);
    }

    protected function tearDown(): void
    {
        $newEmail = 'new_customer@example.com';
        try {
            $customer = $this->customerRepository->get($newEmail);
        } catch (\Exception $exception) {
            return;
        }

        $this->registry->unregister('isSecureArea');
        $this->registry->register('isSecureArea', true);
        $this->customerRepository->delete($customer);
        $this->registry->unregister('isSecureArea');
        $this->registry->register('isSecureArea', false);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        parent::tearDown();
    }
}
