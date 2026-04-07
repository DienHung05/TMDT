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

<<<<<<< HEAD
use Exception;
use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Customer\Test\Fixture\Customer;
use Magento\Framework\Registry;
use Magento\TestFramework\Fixture\Config;
use Magento\TestFramework\Fixture\DataFixture;
use Magento\TestFramework\Helper\Bootstrap;
use Magento\TestFramework\TestCase\GraphQlAbstract;
use PHPUnit\Framework\Attributes\DataProvider;
use Magento\Framework\GraphQl\Query\Uid;
=======
use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Framework\Registry;
use Magento\TestFramework\Helper\Bootstrap;
use Magento\TestFramework\TestCase\GraphQlAbstract;
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * Test for create customer functionality
 */
class CreateCustomerTest extends GraphQlAbstract
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
     * @var Uid
     */
    private $idEncoder;

    /**
     * @var array
     */
    private $createdCustomerEmails = [];

    protected function setUp(): void
    {
        $this->idEncoder = Bootstrap::getObjectManager()->get(Uid::class);
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
     * Get create customer mutation with custom response fields
     *
     * @param array $input
     * @param array $responseFields
     * @return string
     * @throws Exception
     */
    private function getCreateCustomerMutation(array $input, array $responseFields): string
    {
        $inputString = $this->getImplode($input);
        $responseString = implode("\n            ", $responseFields);

        return <<<MUTATION
            mutation {
                createCustomer(
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

    /**
     * Create customer account with valid email addresses
     *
     * @param string $email
     * @throws Exception
     */
    #[DataProvider('validEmailAddressDataProvider')]
    public function testCreateCustomerAccountWithPassword(string $email): void
    {
        $response = $this->graphQlMutation($this->getCreateCustomerMutation([
            'firstname' => 'Richard',
            'lastname' => 'Rowe',
            'email' => $email,
            'password' => 'test123#',
            'is_subscribed' => true
        ], ['id', 'firstname', 'lastname', 'email', 'is_subscribed']));

        // Track email for cleanup if customer was created successfully
        if (!empty($response['createCustomer']['customer']['email'])) {
            $this->createdCustomerEmails[] = $email;
        }

        $this->assertEquals(
            [
                'createCustomer' => [
                    'customer' => [
                        'id' => $this->idEncoder->encode((string) $this->customerRepository->get($email)->getId()),
                        'firstname' => 'Richard',
                        'lastname' => 'Rowe',
                        'email' => $email,
                        'is_subscribed' => true
                    ]
                ]
            ],
            $response
        );
    }

    /**
     * Data provider with valid email addresses
     *
     * @return array
     */
    public static function validEmailAddressDataProvider(): array
    {
        return [
            ['customer_' . uniqid() . '@example.com'],
            ['jørgen_' . uniqid() . '@somedomain.com'],
            ['email_' . uniqid() . '@example.com']
        ];
    }

    /**
     * @throws Exception
     */
    public function testCreateCustomerAccountWithoutPassword(): void
    {
        $newEmail = 'customer_' . uniqid() . '@example.com';

        $response = $this->graphQlMutation(
            $this->getCreateCustomerMutation(
                [
                    'firstname' => 'Richard',
                    'lastname' => 'Rowe',
                    'email' => $newEmail,
                    'is_subscribed' => true
                ],
                ['id', 'firstname', 'lastname', 'email', 'is_subscribed']
            )
        );

        // Track email for cleanup if customer was created successfully
        if (!empty($response['createCustomer']['customer']['email'])) {
            $this->createdCustomerEmails[] = $newEmail;
        }

        $this->assertEquals(
            [
                'createCustomer' => [
                    'customer' => [
                        'id' => $this->idEncoder->encode((string) $this->customerRepository->get($newEmail)->getId()),
                        'firstname' => 'Richard',
                        'lastname' => 'Rowe',
                        'email' => $newEmail,
                        'is_subscribed' => true
                    ]
                ]
            ],
            $response
        );
    }

    public function testCreateCustomerIfInputDataIsEmpty(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('"input" value should be specified');

        $this->graphQlMutation(
            $this->getCreateCustomerMutation(
                [],
                ['id', 'firstname', 'lastname', 'email', 'is_subscribed']
            )
        );
    }

    public function testCreateCustomerIfEmailMissed(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('The email address is required to create a customer account.');

        $this->graphQlMutation(
            $this->getCreateCustomerMutation(
                [
                    'firstname' => 'Richard',
                    'lastname' => 'Rowe',
                    'password' => 'test123#',
                    'is_subscribed' => true
                ],
                ['id', 'firstname', 'lastname', 'email', 'is_subscribed']
            )
        );
    }

    /**
     * @param string $email
     * @throws Exception
     */
    #[DataProvider('invalidEmailAddressDataProvider')]
    public function testCreateCustomerIfEmailIsNotValid(string $email): void
    {
        $this->expectExceptionMessage('"' . $email . '" is not a valid email address.');
        $this->graphQlMutation(
            $this->getCreateCustomerMutation(
                [
                    'firstname' => 'Richard',
                    'lastname' => 'Rowe',
                    'email' => $email,
                    'password' => 'test123#',
                    'is_subscribed' => true
                ],
                ['id', 'firstname', 'lastname', 'email', 'is_subscribed']
            )
        );
    }

    /**
     * Data provider with invalid email addresses
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
    createCustomer(
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

        $this->assertNull($response['createCustomer']['customer']['id']);
        $this->assertEquals($newFirstname, $response['createCustomer']['customer']['firstname']);
        $this->assertEquals($newLastname, $response['createCustomer']['customer']['lastname']);
        $this->assertEquals($newEmail, $response['createCustomer']['customer']['email']);
        $this->assertTrue($response['createCustomer']['customer']['is_subscribed']);
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
    createCustomer(
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

        $this->assertEquals($newFirstname, $response['createCustomer']['customer']['firstname']);
        $this->assertEquals($newLastname, $response['createCustomer']['customer']['lastname']);
        $this->assertEquals($newEmail, $response['createCustomer']['customer']['email']);
        $this->assertTrue($response['createCustomer']['customer']['is_subscribed']);
    }

    /**
     */
    public function testCreateCustomerIfInputDataIsEmpty()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('"input" value should be specified');

        $query = <<<QUERY
mutation {
    createCustomer(
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
        $this->expectExceptionMessage('Required parameters are missing: Email');

        $newFirstname = 'Richard';
        $newLastname = 'Rowe';
        $currentPassword = 'test123#';

        $query = <<<QUERY
mutation {
    createCustomer(
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
    createCustomer(
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

    public function testCreateCustomerIfPassedAttributeDosNotExistsInCustomerInput(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Field "test123" is not defined by type "CustomerInput".');

        $this->graphQlMutation(
            $this->getCreateCustomerMutation(
                [
                    'firstname' => 'Richard',
                    'lastname' => 'Rowe',
                    'test123' => '123test123',
                    'email' => 'customer_' . uniqid() . '@example.com',
                    'password' => 'test123#',
                    'is_subscribed' => true
                ],
                ['id', 'firstname', 'lastname', 'email', 'is_subscribed']
            )
        );
    }

    public function testCreateCustomerIfNameEmpty(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('"First Name" is a required value.');

        $this->graphQlMutation(
            $this->getCreateCustomerMutation(
                [
                    'email' => 'customer_' . uniqid() . '@example.com',
                    'firstname' => '',
                    'lastname' => 'Rowe',
                    'password' => 'test123#',
                    'is_subscribed' => true
                ],
                ['id', 'firstname', 'lastname', 'email', 'is_subscribed']
            )
        );
    }

    #[Config('newsletter/general/active', false)]
    public function testCreateCustomerSubscribed(): void
    {
        $email = 'customer_' . uniqid() . '@example.com';

        $response = $this->graphQlMutation(
            $this->getCreateCustomerMutation(
                [
                    'firstname' => 'Richard',
                    'lastname' => 'Rowe',
                    'email' => $email,
                    'is_subscribed' => true
                ],
                ['email', 'is_subscribed']
            )
        );

        // Track email for cleanup if customer was created successfully
        if (!empty($response['createCustomer']['customer']['email'])) {
            $this->createdCustomerEmails[] = $email;
        }

        $expectedResponse = [
            'createCustomer' => [
                'customer' => [
                    'email' => $email,
                    'is_subscribed' => false
                ]
            ]
        ];

        $this->assertEquals($expectedResponse, $response);
    }

    #[DataFixture(Customer::class, ['email' => 'customer@example.com'], 'existing_customer')]
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
        $this->expectExceptionMessage('Field "test123" is not defined by type CustomerInput.');

        $newFirstname = 'Richard';
        $newLastname = 'Rowe';
        $currentPassword = 'test123#';
        $newEmail = 'new_customer@example.com';

        $query = <<<QUERY
mutation {
    createCustomer(
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
    createCustomer(
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
    createCustomer(
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

        $this->assertFalse($response['createCustomer']['customer']['is_subscribed']);
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
        $this->graphQlMutation(
            $this->getCreateCustomerMutation(
                [
                    'email' => 'customer@example.com',
                    'password' => 'test123#',
                    'firstname' => 'John',
                    'lastname' => 'Smith'
                ],
                ['firstname', 'lastname', 'email']
            )
        );
    }

    /**
     * Clean up created customers
     *
     * @return void
     */
    protected function tearDown(): void
    {
        // Clean up customers created via GraphQL mutations during tests
        foreach ($this->createdCustomerEmails as $email) {
            try {
                $customer = $this->customerRepository->get($email);
                $this->registry->unregister('isSecureArea');
                $this->registry->register('isSecureArea', true);
                $this->customerRepository->delete($customer);
                $this->registry->unregister('isSecureArea');
            } catch (Exception $exception) {
                // Customer might not exist or already deleted, ignore
            }
        }

        parent::tearDown();
    }

    /**
     * Helper to format input array to GraphQL input string
     *
     * @param array $input
     * @return string
     */
    private function getImplode(array $input): string
    {
        $inputFields = [];
        foreach ($input as $key => $value) {
            if ($value === null) {
                continue;
            }

            if (is_bool($value)) {
                $inputFields[] = "            {$key}: " . ($value ? 'true' : 'false');
                continue;
            }

            $escapedValue = addslashes($value);
            $inputFields[] = "            {$key}: \"{$escapedValue}\"";
        }

        return implode("\n", $inputFields);
=======
        $existedEmail = 'customer@example.com';
        $password = 'test123#';
        $firstname = 'John';
        $lastname = 'Smith';

        $query = <<<QUERY
mutation {
    createCustomer(
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
        parent::tearDown();
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }
}
