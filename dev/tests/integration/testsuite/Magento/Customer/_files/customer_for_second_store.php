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

use Magento\TestFramework\Helper\Bootstrap;
use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Store\Api\StoreRepositoryInterface;
use Magento\TestFramework\Workaround\Override\Fixture\Resolver;

Resolver::getInstance()->requireDataFixture('Magento/Customer/_files/customer.php');

$objectManager = Bootstrap::getObjectManager();
$storeRepository = $objectManager->get(StoreRepositoryInterface::class);
$storeId = $storeRepository->get('fixture_second_store')->getId();
$repository = $objectManager->create(CustomerRepositoryInterface::class);
$customer = $repository->get('customer@example.com');
$customer->setStoreId($storeId);
$repository->save($customer);
