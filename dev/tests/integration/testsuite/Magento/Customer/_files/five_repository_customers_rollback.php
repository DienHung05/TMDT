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

use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\TestFramework\Helper\Bootstrap;
use Magento\Customer\Api\Data\CustomerInterface;
use Magento\Eav\Model\Config as EavModelConfig;

$objectManager = Bootstrap::getObjectManager();

/** @var CustomerRepositoryInterface $repository */
$customerRepository = $objectManager->create(CustomerRepositoryInterface::class);

for ($i = 1; $i <= 5; $i++) {
    try {
        /** @var CustomerInterface $customer */
        $customer = $customerRepository->get('customer'.$i.'@example.com');
        $customerRepository->delete($customer);
    } catch (\Exception $e) {
    }
}

/** @var EavModelConfig $eavConfig */
$eavConfig = $objectManager->get(EavModelConfig::class);
$eavConfig->clear();
