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

use Magento\Customer\Model\CustomerAuthUpdate;
use Magento\Customer\Model\CustomerRegistry;
use Magento\Framework\Stdlib\DateTime;
use Magento\TestFramework\Helper\Bootstrap;
use Magento\TestFramework\Workaround\Override\Fixture\Resolver;

Resolver::getInstance()->requireDataFixture('Magento/Customer/_files/customer.php');

$objectManager = Bootstrap::getObjectManager();
/** @var CustomerRegistry $customerRegistry */
$customerRegistry = $objectManager->get(CustomerRegistry::class);
/** @var CustomerAuthUpdate $customerAuthUpdate */
$customerAuthUpdate = $objectManager->get(CustomerAuthUpdate::class);
$customerId = 1;

$customerSecure = $customerRegistry->retrieveSecureData($customerId);
$dateTime = new \DateTimeImmutable();
$customerSecure->setFailuresNum(10)
    ->setFirstFailure($dateTime->modify('-5 minutes')->format(DateTime::DATETIME_PHP_FORMAT))
    ->setLockExpires($dateTime->modify('+5 minutes')->format(DateTime::DATETIME_PHP_FORMAT));
$customerAuthUpdate->saveAuth($customerId);
$customerRegistry->remove($customerId);
