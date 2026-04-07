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

$objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();
/** @var $repository \Magento\Customer\Api\CustomerRepositoryInterface */
$repository = $objectManager->create(\Magento\Customer\Api\CustomerRepositoryInterface::class);
$customer = $objectManager->create(\Magento\Customer\Api\Data\CustomerInterface::class);

/** @var Magento\Customer\Api\Data\CustomerInterface $customer */
$customer->setWebsiteId(1)
    ->setEmail('customer@example.com')
    ->setGroupId(1)
    ->setStoreId(1)
    ->setPrefix('Mr.')
    ->setFirstname('John')
    ->setMiddlename('A')
    ->setLastname('Smith')
    ->setSuffix('Esq.')
<<<<<<< HEAD
=======
    ->setDefaultBilling(1)
    ->setDefaultShipping(1)
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    ->setTaxvat('12')
    ->setGender(0);
$repository->save($customer, 'password');
