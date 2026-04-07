<?php
/**
<<<<<<< HEAD
 * Copyright 2015 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
namespace Magento\TestFramework\Helper;

use Magento\Customer\Api\Data\CustomerInterface;
use Magento\Customer\Model\Data\Customer as CustomerData;
use Magento\Framework\Reflection\DataObjectProcessor;
<<<<<<< HEAD
use Magento\TestFramework\Helper\Bootstrap;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
use Magento\TestFramework\TestCase\WebapiAbstract;
use Magento\Framework\Webapi\Rest\Request as RestRequest;

class Customer extends WebapiAbstract
{
<<<<<<< HEAD
    public const RESOURCE_PATH = '/V1/customers';
    public const SERVICE_NAME = 'customerAccountManagementV1';
    public const CUSTOMER_REPOSITORY_SERVICE_NAME = "customerCustomerRepositoryV1";
    public const SERVICE_VERSION = 'V1';

    public const CONFIRMATION = 'a4fg7h893e39d';
    public const CREATED_AT = '2013-11-05';
    public const CREATED_IN = 'default';
    public const STORE_NAME = 'Store Name';
    public const DOB = '1970-01-01';
    public const GENDER = 'Male';
    public const GROUP_ID = 1;
    public const MIDDLENAME = 'A';
    public const PREFIX = 'Mr.';
    public const STORE_ID = 1;
    public const SUFFIX = 'Esq.';
    public const TAXVAT = '12';
    public const WEBSITE_ID = 1;

    /** Sample values for testing */
    public const FIRSTNAME = 'Jane';
    public const LASTNAME = 'Doe';
    public const PASSWORD = 'test@123';

    public const ADDRESS_CITY1 = 'CityM';
    public const ADDRESS_CITY2 = 'CityX';
    public const ADDRESS_REGION_CODE1 = 'AL';
    public const ADDRESS_REGION_CODE2 = 'AL';
=======
    const RESOURCE_PATH = '/V1/customers';
    const SERVICE_NAME = 'customerAccountManagementV1';
    const CUSTOMER_REPOSITORY_SERVICE_NAME = "customerCustomerRepositoryV1";
    const SERVICE_VERSION = 'V1';

    const CONFIRMATION = 'a4fg7h893e39d';
    const CREATED_AT = '2013-11-05';
    const CREATED_IN = 'default';
    const STORE_NAME = 'Store Name';
    const DOB = '1970-01-01';
    const GENDER = 'Male';
    const GROUP_ID = 1;
    const MIDDLENAME = 'A';
    const PREFIX = 'Mr.';
    const STORE_ID = 1;
    const SUFFIX = 'Esq.';
    const TAXVAT = '12';
    const WEBSITE_ID = 1;

    /** Sample values for testing */
    const FIRSTNAME = 'Jane';
    const LASTNAME = 'Doe';
    const PASSWORD = 'test@123';

    const ADDRESS_CITY1 = 'CityM';
    const ADDRESS_CITY2 = 'CityX';
    const ADDRESS_REGION_CODE1 = 'AL';
    const ADDRESS_REGION_CODE2 = 'AL';
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

    /**
     * @var \Magento\Customer\Api\Data\AddressInterfaceFactory
     */
    private $customerAddressFactory;

    /**
     * @var \Magento\Customer\Api\Data\CustomerInterfaceFactory
     */
    private $customerDataFactory;

    /**
     * @var \Magento\Framework\Api\DataObjectHelper
     */
    private $dataObjectHelper;

    /** @var DataObjectProcessor */
    private $dataObjectProcessor;

<<<<<<< HEAD
    /**
     * Lazy getter for customerAddressFactory
     */
    private function getCustomerAddressFactory()
    {
        if ($this->customerAddressFactory === null) {
            $this->customerAddressFactory = Bootstrap::getObjectManager()->create(
                \Magento\Customer\Api\Data\AddressInterfaceFactory::class
            );
        }
        return $this->customerAddressFactory;
    }

    /**
     * Lazy getter for customerDataFactory
     */
    private function getCustomerDataFactory()
    {
        if ($this->customerDataFactory === null) {
            $this->customerDataFactory = Bootstrap::getObjectManager()->create(
                \Magento\Customer\Api\Data\CustomerInterfaceFactory::class
            );
        }
        return $this->customerDataFactory;
    }

    /**
     * Lazy getter for dataObjectHelper
     */
    private function getDataObjectHelper()
    {
        if ($this->dataObjectHelper === null) {
            $this->dataObjectHelper = Bootstrap::getObjectManager()->create(
                \Magento\Framework\Api\DataObjectHelper::class
            );
        }
        return $this->dataObjectHelper;
    }

    /**
     * Lazy getter for dataObjectProcessor
     */
    private function getDataObjectProcessor()
    {
        if ($this->dataObjectProcessor === null) {
            $this->dataObjectProcessor = Bootstrap::getObjectManager()->create(
                \Magento\Framework\Reflection\DataObjectProcessor::class
            );
        }
        return $this->dataObjectProcessor;
    }

    /**
     * Create sample customer via API.
     *
=======
    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->customerAddressFactory = Bootstrap::getObjectManager()->create(
            \Magento\Customer\Api\Data\AddressInterfaceFactory::class
        );

        $this->customerDataFactory = Bootstrap::getObjectManager()->create(
            \Magento\Customer\Api\Data\CustomerInterfaceFactory::class
        );

        $this->dataObjectHelper = Bootstrap::getObjectManager()->create(
            \Magento\Framework\Api\DataObjectHelper::class
        );

        $this->dataObjectProcessor = Bootstrap::getObjectManager()->create(
            \Magento\Framework\Reflection\DataObjectProcessor::class
        );
    }

    /**
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @param array $additional
     * @return array|bool|float|int|string
     */
    public function createSampleCustomer(array $additional = [])
    {
        $serviceInfo = [
            'rest' => [
                'resourcePath' => self::RESOURCE_PATH,
                'httpMethod' => RestRequest::HTTP_METHOD_POST,
            ],
            'soap' => [
                'service' => self::SERVICE_NAME,
                'serviceVersion' => self::SERVICE_VERSION,
                'operation' => self::SERVICE_NAME . 'CreateAccount',
            ],
        ];

<<<<<<< HEAD
        $customerDataArray = $this->getDataObjectProcessor()->buildOutputDataArray(
=======
        $customerDataArray = $this->dataObjectProcessor->buildOutputDataArray(
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            $this->createSampleCustomerDataObject($additional),
            \Magento\Customer\Api\Data\CustomerInterface::class
        );
        $requestData = ['customer' => $customerDataArray, 'password' => self::PASSWORD];
        $customerData = $this->_webApiCall($serviceInfo, $requestData);
        return $customerData;
    }

    /**
     * Update Existing customer
     *
<<<<<<< HEAD
     * @param int $customerId
     * @param array $additional
=======
     * @param array $additional
     * @param int $customerId
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @return array|bool|float|int|string
     */
    public function updateSampleCustomer($customerId, array $additional = [])
    {
        $serviceInfo = [
            'rest' => [
                'resourcePath' => self::RESOURCE_PATH . "/" . $customerId,
                'httpMethod' => RestRequest::HTTP_METHOD_PUT,
            ],
            'soap' => [
                'service' => self::CUSTOMER_REPOSITORY_SERVICE_NAME,
                'serviceVersion' => self::SERVICE_VERSION,
                'operation' => self::CUSTOMER_REPOSITORY_SERVICE_NAME . 'save',
            ],
        ];

<<<<<<< HEAD
        $customerDataArray = $this->getDataObjectProcessor()->buildOutputDataArray(
=======
        $customerDataArray = $this->dataObjectProcessor->buildOutputDataArray(
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            $this->createSampleCustomerDataObject($additional),
            \Magento\Customer\Api\Data\CustomerInterface::class
        );
        $requestData = ['customer' => $customerDataArray, 'password' => self::PASSWORD];
        $customerData = $this->_webApiCall($serviceInfo, $requestData);
        return $customerData;
    }

    /**
<<<<<<< HEAD
     * Get customer sample data array.
     *
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @param array $additional
     * @return array
     */
    private function getCustomerSampleData(array $additional = [])
    {
        $customerData = [
            CustomerData::FIRSTNAME => self::FIRSTNAME,
            CustomerData::LASTNAME => self::LASTNAME,
            CustomerData::EMAIL => 'janedoe' . uniqid() . '@example.com',
            CustomerData::CONFIRMATION => self::CONFIRMATION,
            CustomerData::CREATED_AT => self::CREATED_AT,
            CustomerData::CREATED_IN => self::STORE_NAME,
            CustomerData::DOB => self::DOB,
            CustomerData::GENDER => self::GENDER,
            CustomerData::GROUP_ID => self::GROUP_ID,
            CustomerData::MIDDLENAME => self::MIDDLENAME,
            CustomerData::PREFIX => self::PREFIX,
            CustomerData::STORE_ID => self::STORE_ID,
            CustomerData::SUFFIX => self::SUFFIX,
            CustomerData::TAXVAT => self::TAXVAT,
            CustomerData::WEBSITE_ID => self::WEBSITE_ID,
            'custom_attributes' => [
                [
                    'attribute_code' => 'disable_auto_group_change',
                    'value' => '0',
                ],
            ],
        ];

        return array_merge($customerData, $additional);
    }

    /**
     * Create customer using setters.
     *
     * @param array $additional
     * @return CustomerInterface
     */
    public function createSampleCustomerDataObject(array $additional = [])
    {
<<<<<<< HEAD
        $customerAddress1 = $this->getCustomerAddressFactory()->create();
=======
        $customerAddress1 = $this->customerAddressFactory->create();
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $customerAddress1->setCountryId('US');
        $customerAddress1->setIsDefaultBilling(true);
        $customerAddress1->setIsDefaultShipping(true);
        $customerAddress1->setPostcode('75477');
        $customerAddress1->setRegion(
            Bootstrap::getObjectManager()->create(\Magento\Customer\Api\Data\RegionInterfaceFactory::class)
                ->create()
                ->setRegionCode(self::ADDRESS_REGION_CODE1)
                ->setRegion('Alabama')
                ->setRegionId(1)
        );
        $customerAddress1->setStreet(['Green str, 67']);
        $customerAddress1->setTelephone('3468676');
        $customerAddress1->setCity(self::ADDRESS_CITY1);
        $customerAddress1->setFirstname('John');
        $customerAddress1->setLastname('Smith');
<<<<<<< HEAD
        $address1 = $this->getDataObjectProcessor()->buildOutputDataArray(
=======
        $address1 = $this->dataObjectProcessor->buildOutputDataArray(
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            $customerAddress1,
            \Magento\Customer\Api\Data\AddressInterface::class
        );

<<<<<<< HEAD
        $customerAddress2 = $this->getCustomerAddressFactory()->create();
=======
        $customerAddress2 = $this->customerAddressFactory->create();
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $customerAddress2->setCountryId('US');
        $customerAddress2->setIsDefaultBilling(false);
        $customerAddress2->setIsDefaultShipping(false);
        $customerAddress2->setPostcode('47676');
        $customerAddress2->setRegion(
            Bootstrap::getObjectManager()->create(\Magento\Customer\Api\Data\RegionInterfaceFactory::class)
                ->create()
                ->setRegionCode(self::ADDRESS_REGION_CODE2)
                ->setRegion('Alabama')
                ->setRegionId(1)
        );
        $customerAddress2->setStreet(['Black str, 48', 'Building D']);
        $customerAddress2->setTelephone('3234676');
        $customerAddress2->setCity(self::ADDRESS_CITY2);
        $customerAddress2->setFirstname('John');
        $customerAddress2->setLastname('Smith');
<<<<<<< HEAD
        $address2 = $this->getDataObjectProcessor()->buildOutputDataArray(
=======
        $address2 = $this->dataObjectProcessor->buildOutputDataArray(
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            $customerAddress2,
            \Magento\Customer\Api\Data\AddressInterface::class
        );

        $customerData = $this->getCustomerSampleData(
            array_merge([CustomerData::KEY_ADDRESSES => [$address1, $address2]], $additional)
        );
<<<<<<< HEAD
        $customer = $this->getCustomerDataFactory()->create();
        $this->getDataObjectHelper()->populateWithArray(
=======
        $customer = $this->customerDataFactory->create();
        $this->dataObjectHelper->populateWithArray(
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            $customer,
            $customerData,
            \Magento\Customer\Api\Data\CustomerInterface::class
        );
        return $customer;
    }
}
