<?php
/**
<<<<<<< HEAD
 * Copyright 2017 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
$objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();

/** @var \Magento\Sales\Api\OrderRepositoryInterface $orderRepository */
$orderRepository = $objectManager->create(\Magento\Sales\Api\OrderRepositoryInterface::class);
/** @var \Magento\Framework\Stdlib\DateTime\DateTime $dateTime */
$dateTime = $objectManager->create(\Magento\Framework\Stdlib\DateTime\DateTimeFactory::class)
    ->create();
/** @var \Magento\Sales\Model\Order $order */
$order = $objectManager->create(Magento\Sales\Model\Order::class)->loadByIncrementId('100000001');
$newOrderCreatedAtTimestamp = $dateTime->timestamp($order->getCreatedAt()) - 864000;
$newOrderCreatedDate = $dateTime->date(null, $newOrderCreatedAtTimestamp);
$order->setCreatedAt($newOrderCreatedDate);
$orderRepository->save($order);
