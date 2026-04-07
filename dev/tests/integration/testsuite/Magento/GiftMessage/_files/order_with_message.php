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
use Magento\TestFramework\Workaround\Override\Fixture\Resolver;

Resolver::getInstance()->requireDataFixture('Magento/Sales/_files/order.php');

$objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();

/** @var \Magento\GiftMessage\Model\Message $message */
$message = $objectManager->create(\Magento\GiftMessage\Model\Message::class);
$message->setSender('Romeo');
$message->setRecipient('Mercutio');
$message->setMessage('I thought all for the best.');
$message->save();

/** @var \Magento\Sales\Model\Order $order */
$order = $objectManager->create(\Magento\Sales\Model\Order::class)->loadByIncrementId('100000001');

/** @var \Magento\Sales\Api\Data\OrderItemInterface $orderItem */
$orderItem = $order->getItems();
$orderItem = array_shift($orderItem);
$orderItem->setGiftMessageId($message->getId());

$order->setItems([$orderItem])->setGiftMessageId($message->getId());
$order->save();
