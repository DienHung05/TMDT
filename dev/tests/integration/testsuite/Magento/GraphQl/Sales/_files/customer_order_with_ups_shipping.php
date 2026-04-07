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

use Magento\Sales\Model\Order;
use Magento\TestFramework\Helper\Bootstrap;
use Magento\TestFramework\Workaround\Override\Fixture\Resolver;
use Magento\Framework\DB\Transaction;
use Magento\Sales\Model\Order\ShipmentFactory;

Resolver::getInstance()->requireDataFixture('Magento/Sales/_files/order_with_customer.php');

$objectManager = Bootstrap::getObjectManager();
/** @var Transaction $transaction */
$transaction = $objectManager->get(Transaction::class);
/** @var Order $order */
$order = $objectManager->create(Order::class)->loadByIncrementId('100000001');
//Set the shipping method
$order->setShippingDescription('UPS Next Day Air');
$order->setShippingMethod('ups_01');
$order->save();

//Create Shipment with UPS tracking and some items
$shipmentItems = [];
foreach ($order->getItems() as $orderItem) {
    $shipmentItems[$orderItem->getId()] = $orderItem->getQtyOrdered();
}
$tracking = [
    'carrier_code' => 'ups',
    'title' => 'United Parcel Service',
    'number' => '987654321'
];

$shipment = $objectManager->get(ShipmentFactory::class)->create($order, $shipmentItems, [$tracking]);
$shipment->register();
$transaction->addObject($shipment)->addObject($order)->save();
