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

namespace Magento\LoginAsCustomerAssistance\Plugin;

use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Customer\Api\Data\CustomerInterface as Customer;
use Magento\Customer\Model\CustomerRegistry;
use Magento\Framework\Api\ExtensibleDataInterface;
use Magento\Framework\Reflection\DataObjectProcessor;
use Magento\Framework\Webapi\Rest\Request;
use Magento\LoginAsCustomerAssistance\Api\IsAssistanceEnabledInterface;
use Magento\LoginAsCustomerAssistance\Model\ResourceModel\GetLoginAsCustomerAssistanceAllowed;
use Magento\TestFramework\Authentication\OauthHelper;
use Magento\TestFramework\Helper\Bootstrap;
use Magento\TestFramework\TestCase\WebapiAbstract;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * Api tests for @see \Magento\LoginAsCustomerAssistance\Plugin\CustomerPlugin::afterSave.
 */
class CustomerAfterPluginTest extends WebapiAbstract
{
    private const SERVICE_VERSION = 'V1';
    private const SERVICE_NAME = 'customerCustomerRepositoryV1';
    private const RESOURCE_PATH = '/V1/customers';

    /**
     * @var DataObjectProcessor
     */
    private $dataObjectProcessor;

    /**
     * @var CustomerRepositoryInterface
     */
    private $customerRepository;

    /**
     * @var CustomerRegistry
     */
    private $customerRegistry;

    /**
     * @var GetLoginAsCustomerAssistanceAllowed
     */
    private $isAssistanceEnabled;

    /**
     * @inheritDoc
     */
    protected function setUp(): void
    {
        $objectManager = Bootstrap::getObjectManager();
        $this->dataObjectProcessor = $objectManager->create(DataObjectProcessor::class);
        $this->customerRegistry = $objectManager->create(CustomerRegistry::class);
        $this->customerRepository = $objectManager->create(
            CustomerRepositoryInterface::class,
            ['customerRegistry' => $this->customerRegistry]
        );
        $this->isAssistanceEnabled = $objectManager->create(GetLoginAsCustomerAssistanceAllowed::class);
    }

    /**
     * Check that 'assistance_allowed' set as expected.
     *
     * @magentoApiDataFixture Magento/Customer/_files/customer.php
<<<<<<< HEAD
=======
     * @dataProvider assistanceStatesDataProvider
     *
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @param int $state
     * @param bool $expected
     * @return void
     */
<<<<<<< HEAD
    #[DataProvider('assistanceStatesDataProvider')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testUpdateCustomer(int $state, bool $expected): void
    {
        $customerId = (int)$this->customerRepository->get('customer@example.com')->getId();

<<<<<<< HEAD
        $updatedLastName = 'Updated lastname';
        $customer = $this->getCustomerData($customerId);
        $customerData = $this->dataObjectProcessor->buildOutputDataArray($customer, Customer::class);
        $customerData[Customer::LASTNAME] = $updatedLastName;
        $customerData[ExtensibleDataInterface::EXTENSION_ATTRIBUTES_KEY]['assistance_allowed'] = $state;

        $requestData['customer'] = (TESTS_WEB_API_ADAPTER === self::ADAPTER_SOAP)
            ? $customerData
            : [
                Customer::FIRSTNAME => $customer->getFirstname(),
                Customer::LASTNAME => $updatedLastName,
                Customer::EMAIL => $customer->getEmail(),
                Customer::ID => $customerId,
=======
        $updatedLastname = 'Updated lastname';
        $customer = $this->getCustomerData($customerId);
        $customerData = $this->dataObjectProcessor->buildOutputDataArray($customer, Customer::class);
        $customerData[Customer::LASTNAME] = $updatedLastname;
        $customerData[ExtensibleDataInterface::EXTENSION_ATTRIBUTES_KEY]['assistance_allowed'] = $state;

        $requestData['customer'] = TESTS_WEB_API_ADAPTER === self::ADAPTER_SOAP
            ? $customerData
            : [
                Customer::LASTNAME => $updatedLastname,
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                Customer::EXTENSION_ATTRIBUTES_KEY => ['assistance_allowed' => $state]
            ];

        $serviceInfo = $this->getServiceInfo($customerId, 'Save');
        $response = $this->_webApiCall($serviceInfo, $requestData);
        $this->assertNotNull($response);

        $existingCustomerDataObject = $this->getCustomerData($customerId);
<<<<<<< HEAD
        $this->assertEquals($updatedLastName, $existingCustomerDataObject->getLastname());
=======
        $this->assertEquals($updatedLastname, $existingCustomerDataObject->getLastname());
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $this->assertEquals($expected, $this->isAssistanceEnabled->execute($customerId));
    }

    /**
     * Check that 'assistance_allowed' set as expected with limited resources.
     *
     * @magentoApiDataFixture Magento/Customer/_files/customer.php
<<<<<<< HEAD
     * @SuppressWarnings(PHPMD.UnusedLocalVariable)
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     * @param int $state
     * @param bool $expected Unused - with limited ACL, always expects false
     * @return void
     */
    #[DataProvider('assistanceStatesDataProvider')]
    public function testUpdateCustomerWithLimitedResources(int $state, bool $expected): void
=======
     * @dataProvider assistanceStatesDataProvider
     * @SuppressWarnings(PHPMD.UnusedLocalVariable)
     *
     * @param int $state
     * @return void
     */
    public function testUpdateCustomerWithLimitedResources(int $state): void
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        $resources = [
            'Magento_Customer::customer',
            'Magento_Customer::manage',
        ];
        $customerId = (int)$this->customerRepository->get('customer@example.com')->getId();

<<<<<<< HEAD
        $updatedLastName = 'Updated lastname';
        $customer = $this->getCustomerData($customerId);
        $customerData = $this->dataObjectProcessor->buildOutputDataArray($customer, Customer::class);
        $customerData[Customer::LASTNAME] = $updatedLastName;
        $customerData[ExtensibleDataInterface::EXTENSION_ATTRIBUTES_KEY]['assistance_allowed'] = $state;

        $requestData['customer'] = (TESTS_WEB_API_ADAPTER === self::ADAPTER_SOAP)
            ? $customerData
            : [
                Customer::FIRSTNAME => $customer->getFirstname(),
                Customer::LASTNAME => $updatedLastName,
                Customer::EMAIL => $customer->getEmail(),
                Customer::ID => $customerId,
=======
        $updatedLastname = 'Updated lastname';
        $customer = $this->getCustomerData($customerId);
        $customerData = $this->dataObjectProcessor->buildOutputDataArray($customer, Customer::class);
        $customerData[Customer::LASTNAME] = $updatedLastname;
        $customerData[ExtensibleDataInterface::EXTENSION_ATTRIBUTES_KEY]['assistance_allowed'] = $state;

        $requestData['customer'] = TESTS_WEB_API_ADAPTER === self::ADAPTER_SOAP
            ? $customerData
            : [
                Customer::LASTNAME => $updatedLastname,
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                Customer::EXTENSION_ATTRIBUTES_KEY => ['assistance_allowed' => $state]
            ];

        $serviceInfo = $this->getServiceInfo($customerId, 'Save');
        OauthHelper::getApiAccessCredentials($resources);
        $response = $this->_webApiCall($serviceInfo, $requestData);
        $this->assertNotNull($response);

        $existingCustomerDataObject = $this->getCustomerData($customerId);
<<<<<<< HEAD
        $this->assertEquals($updatedLastName, $existingCustomerDataObject->getLastname());
=======
        $this->assertEquals($updatedLastname, $existingCustomerDataObject->getLastname());
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $this->assertEquals(false, $this->isAssistanceEnabled->execute($customerId));
    }

    /**
     * @param int $customerId
     * @param string $operation
     * @return array
     */
    private function getServiceInfo(int $customerId, string $operation): array
    {
        return [
            'rest' => [
                'resourcePath' => self::RESOURCE_PATH . '/' . $customerId,
                'httpMethod' => Request::HTTP_METHOD_PUT,
            ],
            'soap' => [
                'service' => self::SERVICE_NAME,
                'serviceVersion' => self::SERVICE_VERSION,
                'operation' => self::SERVICE_NAME . $operation,
            ],
        ];
    }

    /**
     * Retrieve customer data by Id.
     *
     * @param int $customerId
     * @return Customer
     */
    private function getCustomerData(int $customerId): Customer
    {
        $customerData = $this->customerRepository->getById($customerId);
        $this->customerRegistry->remove($customerId);

        return $customerData;
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function assistanceStatesDataProvider(): array
=======
    public function assistanceStatesDataProvider(): array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            'Assistance Allowed' => [IsAssistanceEnabledInterface::ALLOWED, true],
            'Assistance Denied' => [IsAssistanceEnabledInterface::DENIED, false],
        ];
    }

    /**
     * @inheritDoc
     */
    protected function tearDown(): void
    {
        OauthHelper::clearApiAccessCredentials();
        parent::tearDown();
    }
}
