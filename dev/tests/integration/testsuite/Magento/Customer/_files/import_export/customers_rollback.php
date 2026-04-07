<?php
/**
<<<<<<< HEAD
 * Copyright 2019 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

use Magento\Framework\ObjectManagerInterface;
use Magento\Framework\Registry;
use Magento\TestFramework\Helper\Bootstrap;
use Magento\Customer\Model\Customer;

/** @var $objectManager ObjectManagerInterface */
$objectManager = Bootstrap::getObjectManager();

/** @var $registry Registry */
$registry = $objectManager->get(Registry::class);
$registry->unregister('isSecureArea');
$registry->register('isSecureArea', true);

/** @var $customer Customer */
$customer = $objectManager->create(Customer::class);

<<<<<<< HEAD
$customersToRemove = [
=======
$emailsToDelete = [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    'customer@example.com',
    'julie.worrell@example.com',
    'david.lamar@example.com',
];
<<<<<<< HEAD

/**
 * @var Magento\Customer\Api\CustomerRepositoryInterface $customerRepository
 */
$customerRepository = $objectManager->create(\Magento\Customer\Api\CustomerRepositoryInterface::class);

foreach ($customersToRemove as $customerEmail) {
    try {
        $customer = $customerRepository->get($customerEmail);
        $customerRepository->delete($customer);
    } catch (\Magento\Framework\Exception\NoSuchEntityException $exception) {
        /**
         * Tests which are wrapped with MySQL transaction clear all data by transaction rollback.
         */
        continue;
    }
}

=======
foreach ($emailsToDelete as $email) {
    try {
        $customer->loadByEmail($email)->delete();
    } catch (\Exception $e) {
    }
}
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
$registry->unregister('isSecureArea');
$registry->register('isSecureArea', false);
$registry->unregister('_fixture/Magento_ImportExport_Customer_Collection');
