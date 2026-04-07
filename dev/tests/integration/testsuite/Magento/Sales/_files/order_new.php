<?php
/**
<<<<<<< HEAD
 * Copyright 2016 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
use Magento\TestFramework\Workaround\Override\Fixture\Resolver;

Resolver::getInstance()->requireDataFixture('Magento/Sales/_files/order.php');

$objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();

/** @var \Magento\Sales\Model\Order $order */
$order = $objectManager->create('Magento\Sales\Model\Order')
    ->loadByIncrementId('100000001');

$order->setState(
    \Magento\Sales\Model\Order::STATE_NEW
);

$order->setStatus(
    $order->getConfig()->getStateDefaultStatus(
        \Magento\Sales\Model\Order::STATE_NEW
    )
);

$order->save();
