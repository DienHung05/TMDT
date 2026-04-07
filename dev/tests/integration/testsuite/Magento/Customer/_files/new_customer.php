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

use Magento\Customer\Api\AccountManagementInterface;
use Magento\Customer\Api\CustomerMetadataInterface;
<<<<<<< HEAD
use Magento\Customer\Api\Data\AddressInterfaceFactory;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
use Magento\Customer\Model\Data\CustomerFactory;
use Magento\Customer\Model\GroupManagement;
use Magento\Eav\Model\AttributeRepository;
use Magento\Store\Model\StoreManagerInterface;
use Magento\TestFramework\Helper\Bootstrap;

$objectManager = Bootstrap::getObjectManager();
/** @var AccountManagementInterface $accountManagement */
$accountManagement = $objectManager->get(AccountManagementInterface::class);
$customerFactory = $objectManager->get(CustomerFactory::class);
$customerFactory->create();
/** @var StoreManagerInterface $storeManager */
$storeManager = $objectManager->get(StoreManagerInterface::class);
$website = $storeManager->getWebsite('base');
/** @var GroupManagement $groupManagement */
$groupManagement = $objectManager->get(GroupManagement::class);
$defaultStoreId = $website->getDefaultStore()->getId();
/** @var AttributeRepository $attributeRepository */
$attributeRepository = $objectManager->get(AttributeRepository::class);
$gender = $attributeRepository->get(CustomerMetadataInterface::ENTITY_TYPE_CUSTOMER, 'gender')
    ->getSource()->getOptionId('Male');
<<<<<<< HEAD

/** @var AddressInterfaceFactory $addressFactory */
$addressFactory = $objectManager->get(AddressInterfaceFactory::class);
$address = $addressFactory->create();
$address->setFirstname('John')
    ->setLastname('Smith')
    ->setStreet(['123 Main St'])
    ->setCity('New York')
    ->setCountryId('US')
    ->setRegionId(1)
    ->setPostcode('10001')
    ->setTelephone('555-1234')
    ->setIsDefaultBilling(true)
    ->setIsDefaultShipping(true);

=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
$customer = $customerFactory->create();
$customer->setWebsiteId($website->getId())
    ->setEmail('new_customer@example.com')
    ->setGroupId($groupManagement->getDefaultGroup($defaultStoreId)->getId())
    ->setStoreId($defaultStoreId)
    ->setPrefix('Mr.')
    ->setFirstname('John')
    ->setMiddlename('A')
    ->setLastname('Smith')
    ->setSuffix('Esq.')
<<<<<<< HEAD
    ->setGender($gender)
    ->setAddresses([$address]);
=======
    ->setDefaultBilling(1)
    ->setDefaultShipping(1)
    ->setGender($gender);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
$accountManagement->createAccount($customer, 'Qwert12345');
