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

use Magento\Persistent\Model\SessionFactory;
use Magento\TestFramework\Helper\Bootstrap;
use Magento\TestFramework\Workaround\Override\Fixture\Resolver;

$objectManager = Bootstrap::getObjectManager();
/** @var SessionFactory $sessionFactory */
$sessionFactory = $objectManager->get(SessionFactory::class);
$sessionFactory->create()->deleteByCustomerId(1);

Resolver::getInstance()->requireDataFixture('Magento/Checkout/_files/quote_with_customer_without_address_rollback.php');
