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
use Magento\Customer\Api\AccountManagementInterface;
use Magento\Customer\Model\Log;
use Magento\Customer\Model\Logger;
use Magento\Customer\Test\Fixture\Customer;
use Magento\Framework\App\ResourceConnection;
use Magento\Framework\DB\Adapter\AdapterInterface;
use Magento\Framework\Exception\EmailNotConfirmedException;
use Magento\TestFramework\Fixture\Config;
use Magento\TestFramework\Fixture\DataFixture;
use Magento\TestFramework\Fixture\DataFixtureStorageManager;
use Magento\TestFramework\Helper\Bootstrap;
use Magento\TestFramework\TestCase\GraphQlAbstract;
use PHPUnit\Framework\Attributes\DataProvider;
use Magento\Customer\Model\CustomerFactory;
=======
use Magento\TestFramework\TestCase\GraphQlAbstract;
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * API-functional tests cases for generateCustomerToken mutation
 */
class GenerateCustomerTokenTest extends GraphQlAbstract
{
    /**
<<<<<<< HEAD
     * @var Logger
     */
    private $logger;

    /**
     * @var CustomerFactory
     */
    private $customerFactory;

    /**
     * @inheritdoc
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->logger = Bootstrap::getObjectManager()->get(Logger::class);
        $this->customerFactory = Bootstrap::getObjectManager()->get(CustomerFactory::class);
    }

    /**
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * Verify customer token with valid credentials
     *
     * @magentoApiDataFixture Magento/Customer/_files/customer.php
     */
<<<<<<< HEAD
    public function testGenerateCustomerValidToken(): void
    {
        $mutation = $this->getQuery('customer@example.com', 'wrongpassword');
        try {
            $response = $this->graphQlMutation($mutation);
        } catch (\Exception $e) {
        }
        $customer = $this->customerFactory->create()->setWebsiteId(1)
            ->loadByEmail('customer@example.com');
        $this->assertEquals(1, $customer->getFailuresNum());
        $this->assertNotNull($customer->getFirstFailure());

        $mutation = $this->getQuery();

        $response = $this->graphQlMutation($mutation);
        $customer = $this->customerFactory->create()->setWebsiteId(1)
            ->loadByEmail('customer@example.com');
        $this->assertEquals(0, $customer->getFailuresNum());
        $this->assertNull($customer->getFirstFailure());
=======
    public function testGenerateCustomerValidToken()
    {
        $email = 'customer@example.com';
        $password = 'password';

        $mutation = $this->getQuery($email, $password);

        $response = $this->graphQlMutation($mutation);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $this->assertArrayHasKey('generateCustomerToken', $response);
        $this->assertIsArray($response['generateCustomerToken']);
    }

    /**
     * Test customer with invalid data.
     *
     * @magentoApiDataFixture Magento/Customer/_files/customer.php
     *
<<<<<<< HEAD
=======
     * @dataProvider dataProviderInvalidCustomerInfo
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @param string $email
     * @param string $password
     * @param string $message
     */
<<<<<<< HEAD
    #[DataProvider('dataProviderInvalidCustomerInfo')]
    public function testGenerateCustomerTokenInvalidData(string $email, string $password, string $message): void
=======
    public function testGenerateCustomerTokenInvalidData(string $email, string $password, string $message)
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        $this->expectException(\Exception::class);

        $mutation = $this->getQuery($email, $password);
        $this->expectExceptionMessage($message);
        $this->graphQlMutation($mutation);
    }

<<<<<<< HEAD
    #[
        Config('customer/create_account/confirm', 1),
        DataFixture(
            Customer::class,
            [
                'email' => 'another@example.com',
                'confirmation' => 'account_not_confirmed'
            ],
            'customer'
        )
    ]
    public function testGenerateCustomerEmailNotConfirmed()
    {
        $this->expectException(\Exception::class);
        $customer = DataFixtureStorageManager::getStorage()->get('customer');

        $mutation = $this->getQuery($customer->getEmail());
        $this->expectExceptionMessage("This account isn't confirmed. Verify and try again.");
        $this->graphQlMutation($mutation);
    }

=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    /**
     * Test customer token regeneration.
     *
     * @magentoApiDataFixture Magento/Customer/_files/customer.php
     */
<<<<<<< HEAD
    public function testRegenerateCustomerToken(): void
    {
        $mutation = $this->getQuery();
=======
    public function testRegenerateCustomerToken()
    {
        $email = 'customer@example.com';
        $password = 'password';

        $mutation = $this->getQuery($email, $password);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

        $response1 = $this->graphQlMutation($mutation);
        $token1 = $response1['generateCustomerToken']['token'];

        sleep(2);

        $response2 = $this->graphQlMutation($mutation);
        $token2 = $response2['generateCustomerToken']['token'];

        $this->assertNotEquals($token1, $token2, 'Tokens should not be identical!');
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function dataProviderInvalidCustomerInfo(): array
=======
    public function dataProviderInvalidCustomerInfo(): array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            'invalid_email' => [
                'invalid_email@example.com',
                'password',
                'The account sign-in was incorrect or your account is disabled temporarily. ' .
                'Please wait and try again later.'
            ],
            'empty_email' => [
                '',
                'password',
                'Specify the "email" value.'
            ],
            'invalid_password' => [
                'customer@example.com',
                'invalid_password',
                'The account sign-in was incorrect or your account is disabled temporarily. ' .
                'Please wait and try again later.'
            ],
            'empty_password' => [
                'customer@example.com',
                '',
                'Specify the "password" value.'

            ]
        ];
    }

    /**
     * @param string $email
     * @param string $password
     * @return string
     */
<<<<<<< HEAD
    private function getQuery(string $email = 'customer@example.com', string $password = 'password'): string
=======
    private function getQuery(string $email, string $password) : string
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return <<<MUTATION
mutation {
	generateCustomerToken(
        email: "{$email}"
        password: "{$password}"
    ) {
        token
    }
}
MUTATION;
    }

    /**
     * Verify customer with empty email
     */
<<<<<<< HEAD
    public function testGenerateCustomerTokenWithEmptyEmail(): void
=======
    public function testGenerateCustomerTokenWithEmptyEmail()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        $email = '';
        $password = 'bad-password';

<<<<<<< HEAD
        $mutation = $this->getQuery($email, $password);
=======
        $mutation
            = <<<MUTATION
mutation {
	generateCustomerToken(
        email: "{$email}"
        password: "{$password}"
    ) {
        token
    }
}
MUTATION;
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('GraphQL response contains errors: Specify the "email" value.');
        $this->graphQlMutation($mutation);
    }

    /**
     * Verify customer with empty password
     */
<<<<<<< HEAD
    public function testGenerateCustomerTokenWithEmptyPassword(): void
=======
    public function testGenerateCustomerTokenWithEmptyPassword()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        $email = 'customer@example.com';
        $password = '';

<<<<<<< HEAD
        $mutation = $this->getQuery($email, $password);
=======
        $mutation
            = <<<MUTATION
mutation {
	generateCustomerToken(
        email: "{$email}"
        password: "{$password}"
    ) {
        token
    }
}
MUTATION;
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('GraphQL response contains errors: Specify the "password" value.');
        $this->graphQlMutation($mutation);
    }
<<<<<<< HEAD

    /**
     * Verify customer log after generate customer token
     *
     * @magentoApiDataFixture Magento/Customer/_files/customer.php
     */
    public function testCustomerLogAfterGenerateCustomerToken(): void
    {
        $response = $this->graphQlMutation($this->getQuery());
        $this->assertArrayHasKey('generateCustomerToken', $response);
        $this->assertIsArray($response['generateCustomerToken']);

        /** @var Log $log */
        $log = $this->logger->get(1);
        $this->assertNotEmpty($log->getLastLoginAt());
    }

    /**
     * Ensure that customer log record is deleted.
     *
     * @return void
     */
    protected function tearDown(): void
    {
        if ($this->logger->get(1)->getLastLoginAt()) {
            /** @var ResourceConnection $resource */
            $resource = Bootstrap::getObjectManager()->get(ResourceConnection::class);
            /** @var AdapterInterface $connection */
            $connection = $resource->getConnection(ResourceConnection::DEFAULT_CONNECTION);
            $connection->delete(
                $resource->getTableName('customer_log'),
                ['customer_id' => 1]
            );
        }
        parent::tearDown();
    }
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
}
