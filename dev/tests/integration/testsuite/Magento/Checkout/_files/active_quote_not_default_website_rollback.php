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

use Magento\TestFramework\Workaround\Override\Fixture\Resolver;

$quote = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()
    ->create(\Magento\Quote\Model\Quote::class);
$quote->load('test_order_2', 'reserved_order_id')
    ->delete();

Resolver::getInstance()->requireDataFixture('Magento/Store/_files/second_website_with_two_stores_rollback.php');
