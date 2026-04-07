<?php
/**
<<<<<<< HEAD
 * Copyright 2015 Adobe
 * All Rights Reserved.
 */

=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
declare(strict_types=1);

namespace Magento\CustomerGraphQl\Model\Resolver;

use Magento\Customer\Api\CustomerRepositoryInterface;
<<<<<<< HEAD
=======
use Magento\Framework\ObjectManagerInterface;
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
use Magento\Framework\Serialize\SerializerInterface;
use Magento\GraphQl\Service\GraphQlRequest;
use Magento\Store\Api\StoreRepositoryInterface;
use Magento\Store\Test\Fixture\Group as StoreGroupFixture;
use Magento\Store\Test\Fixture\Store as StoreFixture;
use Magento\Store\Test\Fixture\Website as WebsiteFixture;
use Magento\TestFramework\Fixture\ComponentsDir;
use Magento\TestFramework\Fixture\Config;
use Magento\TestFramework\Fixture\DataFixture;
use Magento\TestFramework\Helper\Bootstrap;
use Magento\TestFramework\Mail\Template\TransportBuilderMock;
use PHPUnit\Framework\TestCase;

/**
 * Test creating a customer through GraphQL
 *
 * @magentoAppArea graphql
 */
class CreateCustomerTest extends TestCase
{
    /**
<<<<<<< HEAD
=======
     * @var ObjectManagerInterface
     */
    private $objectManager;

    /**
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @var GraphQlRequest
     */
    private $graphQlRequest;

    /**
     * @var SerializerInterface
     */
    private $json;

    /**
     * @var CustomerRepositoryInterface
     */
    private $customerRepository;

    /**
     * @var StoreRepositoryInterface
     */
    private $storeRepository;

    public function setUp(): void
    {
<<<<<<< HEAD
        $this->graphQlRequest = Bootstrap::getObjectManager()->create(GraphQlRequest::class);
        $this->json = Bootstrap::getObjectManager()->get(SerializerInterface::class);

        $this->customerRepository = Bootstrap::getObjectManager()
            ->create(CustomerRepositoryInterface::class);
        $this->storeRepository = Bootstrap::getObjectManager()
            ->create(StoreRepositoryInterface::class);
    }

    /**
     * Get create customer GraphQL mutation
     *
     * @param string $email
     * @return string
     */
    private function getCreateCustomerMutation(string $email): string
    {
        return <<<MUTATION
            mutation createAccount {
                createCustomer(
                    input: {
                        email: "{$email}"
                        firstname: "Test"
                        lastname: "Magento"
                        password: "T3stP4assw0rd"
                        is_subscribed: false
                    }
                ) {
                    customer {
                        email
                    }
                }
            }
        MUTATION;
    }

    /**
     * Assert expected create customer GraphQL response structure
     *
     * @param array $responseData
     * @return void
     */
    private function assertCreateCustomerResponse(array $responseData, string $email): void
    {
        $this->assertEquals(
            [
                'data' => [
                    'createCustomer' => [
                        'customer' => [
                            'email' => $email
                        ]
                    ]
                ]
            ],
            $responseData
        );
    }

    /**
     * Assert that customer email was sent
     *
     * @return TransportBuilderMock
     */
    private function assertCustomerEmailSent(): TransportBuilderMock
    {
        /** @var TransportBuilderMock $transportBuilderMock */
        $transportBuilderMock = Bootstrap::getObjectManager()
            ->get(TransportBuilderMock::class);
        $sentMessage = $transportBuilderMock->getSentMessage();

        // Verify an email was dispatched
        $this->assertNotNull($sentMessage);

        return $transportBuilderMock;
    }

    /**
     * Generate unique email address for testing
     *
     * @return string
     */
    private function generateUniqueEmail(): string
    {
        return 'test' . uniqid() . '@magento.com';
=======
        $this->objectManager = Bootstrap::getObjectManager();
        $this->graphQlRequest = $this->objectManager->create(GraphQlRequest::class);
        $this->json = $this->objectManager->get(SerializerInterface::class);

        $this->customerRepository = $this->objectManager->create(CustomerRepositoryInterface::class);
        $this->storeRepository = $this->objectManager->create(StoreRepositoryInterface::class);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }

    /**
     * Test that creating a customer sends an email
     */
<<<<<<< HEAD
    public function testCreateCustomerSendsEmail(): void
    {
        $email = $this->generateUniqueEmail();

        $response = $this->graphQlRequest->send($this->getCreateCustomerMutation($email));
        $this->assertCreateCustomerResponse(
            $this->json->unserialize($response->getContent()),
            $email
        );

        // Verify the customer was created and has the correct data
        $customer = $this->customerRepository->get($email);
        $this->assertEquals('Test', $customer->getFirstname());
        $this->assertEquals('Magento', $customer->getLastname());

        $transportBuilderMock = $this->assertCustomerEmailSent();

        // Assert the email contains the expected content
        $sentMessage = $transportBuilderMock->getSentMessage();
        $this->assertEquals('Welcome to Main Website Store', $sentMessage->getSubject());
        $messageBody = quoted_printable_decode($sentMessage->getBody()->bodyToString());
        $this->assertStringContainsString('Welcome to Main Website Store.', $messageBody);
=======
    public function testCreateCustomerSendsEmail()
    {
        $query
            = <<<QUERY
mutation createAccount {
    createCustomer(
        input: {
            email: "test@magento.com"
            firstname: "Test"
            lastname: "Magento"
            password: "T3stP4assw0rd"
            is_subscribed: false
        }
    ) {
        customer {
            id
        }
    }
}
QUERY;

        $response = $this->graphQlRequest->send($query);
        $responseData = $this->json->unserialize($response->getContent());

        // Assert the response of the GraphQL request
        $this->assertNull($responseData['data']['createCustomer']['customer']['id']);

        // Verify the customer was created and has the correct data
        $customer = $this->customerRepository->get('test@magento.com');
        $this->assertEquals('Test', $customer->getFirstname());
        $this->assertEquals('Magento', $customer->getLastname());

        /** @var TransportBuilderMock $transportBuilderMock */
        $transportBuilderMock = $this->objectManager->get(TransportBuilderMock::class);
        $sentMessage = $transportBuilderMock->getSentMessage();

        // Verify an email was dispatched to the correct user
        $this->assertNotNull($sentMessage);
        $this->assertEquals('Test Magento', $sentMessage->getTo()[0]->getName());
        $this->assertEquals('test@magento.com', $sentMessage->getTo()[0]->getEmail());

        // Assert the email contains the expected content
        $this->assertEquals('Welcome to Main Website Store', $sentMessage->getSubject());
        $messageRaw = $sentMessage->getBody()->getParts()[0]->getRawContent();
        $this->assertStringContainsString('Welcome to Main Website Store.', $messageRaw);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }

    /**
     * Test that creating a customer on an alternative store sends an email
<<<<<<< HEAD
     */
    #[
        DataFixture(WebsiteFixture::class, as: 'website2'),
        DataFixture(StoreGroupFixture::class, [
            'name' => 'Test Group',
            'website_id' => '$website2.id$'
        ], 'store_group2'),
        DataFixture(StoreFixture::class, [
            'code' => 'test_store_view',
            'name' => 'Test Store View',
            'store_group_id' => '$store_group2.id$'
        ])
    ]
    public function testCreateCustomerForStoreSendsEmail(): void
    {
        $email = $this->generateUniqueEmail();

        $responseData = $this->json->unserialize(
            $this->graphQlRequest->send(
                $this->getCreateCustomerMutation($email),
                [],
                '',
                ['Store' => 'test_store_view']
            )->getContent()
        );

        $this->assertCreateCustomerResponse($responseData, $email);

        // Verify the customer was created and has the correct data
        $customer = $this->customerRepository->get($email);
=======
     *
     * @magentoDataFixture Magento/CustomerGraphQl/_files/website_store_with_store_view.php
     */
    public function testCreateCustomerForStoreSendsEmail()
    {
        $query
            = <<<QUERY
mutation createAccount {
    createCustomer(
        input: {
            email: "test@magento.com"
            firstname: "Test"
            lastname: "Magento"
            password: "T3stP4assw0rd"
            is_subscribed: false
        }
    ) {
        customer {
            id
        }
    }
}
QUERY;

        $response = $this->graphQlRequest->send(
            $query,
            [],
            '',
            [
                'Store' => 'test_store_view'
            ]
        );
        $responseData = $this->json->unserialize($response->getContent());

        // Assert the response of the GraphQL request
        $this->assertNull($responseData['data']['createCustomer']['customer']['id']);

        // Verify the customer was created and has the correct data
        $customer = $this->customerRepository->get('test@magento.com');
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $this->assertEquals('Test', $customer->getFirstname());
        $this->assertEquals('Magento', $customer->getLastname());
        $this->assertEquals('Test Store View', $customer->getCreatedIn());

        $store = $this->storeRepository->getById($customer->getStoreId());
        $this->assertEquals('test_store_view', $store->getCode());

<<<<<<< HEAD
        $transportBuilderMock = $this->assertCustomerEmailSent();

        // Assert the email contains the expected content
        $sentMessage = $transportBuilderMock->getSentMessage();
        $this->assertEquals('Welcome to Test Group', $sentMessage->getSubject());
        $messageBody = quoted_printable_decode($sentMessage->getBody()->bodyToString());
        $this->assertStringContainsString('Welcome to Test Group.', $messageBody);
    }

    /**
     * Test that creating a customer on an alternative store sends an email in the translated
     * language
=======
        /** @var TransportBuilderMock $transportBuilderMock */
        $transportBuilderMock = $this->objectManager->get(TransportBuilderMock::class);
        $sentMessage = $transportBuilderMock->getSentMessage();

        // Verify an email was dispatched to the correct user
        $this->assertNotNull($sentMessage);
        $this->assertEquals('Test Magento', $sentMessage->getTo()[0]->getName());
        $this->assertEquals('test@magento.com', $sentMessage->getTo()[0]->getEmail());

        // Assert the email contains the expected content
        $this->assertEquals('Welcome to Test Group', $sentMessage->getSubject());
        $messageRaw = $sentMessage->getBody()->getParts()[0]->getRawContent();
        $this->assertStringContainsString('Welcome to Test Group.', $messageRaw);
    }

    /**
     * Test that creating a customer on an alternative store sends an email in the translated language
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     */
    #[
        DataFixture(WebsiteFixture::class, as: 'website2'),
        DataFixture(
            StoreGroupFixture::class,
            ['name' => 'Test Group', 'website_id' => '$website2.id$'],
            'store_group2'
        ),
        DataFixture(
            StoreFixture::class,
<<<<<<< HEAD
            [
                'code' => 'test_store_view',
                'name' => 'Test Store View',
                'store_group_id' => '$store_group2.id$'
            ]
=======
            ['code' => 'test_store_view', 'name' => 'Test Store View', 'store_group_id' => '$store_group2.id$']
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        ),
        Config('general/locale/code', 'fr_FR', 'store', 'test_store_view'),
        ComponentsDir('Magento/CustomerGraphQl/_files')
    ]
<<<<<<< HEAD
    public function testCreateCustomerForStoreSendsTranslatedEmail(): void
    {
        $email = $this->generateUniqueEmail();

        $responseData = $this->json->unserialize(
            $this->graphQlRequest->send(
                $this->getCreateCustomerMutation($email),
                [],
                '',
                ['Store' => 'test_store_view']
            )->getContent()
        );

        $this->assertCreateCustomerResponse($responseData, $email);

        // Verify the customer was created and has the correct data
        $customer = $this->customerRepository->get($email);
=======
    public function testCreateCustomerForStoreSendsTranslatedEmail()
    {
        $query
            = <<<QUERY
mutation createAccount {
    createCustomer(
        input: {
            email: "test@magento.com"
            firstname: "Test"
            lastname: "Magento"
            password: "T3stP4assw0rd"
            is_subscribed: false
        }
    ) {
        customer {
            id
        }
    }
}
QUERY;

        $response = $this->graphQlRequest->send(
            $query,
            [],
            '',
            [
                'Store' => 'test_store_view'
            ]
        );
        $responseData = $this->json->unserialize($response->getContent());

        // Assert the response of the GraphQL request
        $this->assertNull($responseData['data']['createCustomer']['customer']['id']);

        // Verify the customer was created and has the correct data
        $customer = $this->customerRepository->get('test@magento.com');
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $this->assertEquals('Test', $customer->getFirstname());
        $this->assertEquals('Magento', $customer->getLastname());
        $this->assertEquals('Test Store View', $customer->getCreatedIn());

        $store = $this->storeRepository->getById($customer->getStoreId());
        $this->assertEquals('test_store_view', $store->getCode());

<<<<<<< HEAD
        $transportBuilderMock = $this->assertCustomerEmailSent();

        // Assert the email contains the expected content
        $sentMessage = $transportBuilderMock->getSentMessage();
        $this->assertEquals('Bienvenue sur Test Group', $sentMessage->getSubject());
        $messageBody = quoted_printable_decode($sentMessage->getBody()->bodyToString());
        $this->assertStringContainsString('Bienvenue sur Test Group.', $messageBody);
=======
        /** @var TransportBuilderMock $transportBuilderMock */
        $transportBuilderMock = $this->objectManager->get(TransportBuilderMock::class);
        $sentMessage = $transportBuilderMock->getSentMessage();

        // Verify an email was dispatched to the correct user
        $this->assertNotNull($sentMessage);
        $this->assertEquals('Test Magento', $sentMessage->getTo()[0]->getName());
        $this->assertEquals('test@magento.com', $sentMessage->getTo()[0]->getEmail());

        // Assert the email contains the expected content
        $this->assertEquals('Bienvenue sur Test Group', $sentMessage->getSubject());
        $messageRaw = $sentMessage->getBody()->getParts()[0]->getRawContent();
        $this->assertStringContainsString('Bienvenue sur Test Group.', $messageRaw);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }
}
