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

use Magento\Framework\ObjectManagerInterface;
use Magento\Sales\Api\Data\OrderInterface;
use Magento\Sales\Api\Data\OrderInterfaceFactory;
use Magento\Sales\Model\Order;
use Magento\Sales\Model\OrderRepository;
use Magento\TestFramework\Helper\Bootstrap;
use Magento\TestFramework\Workaround\Override\Fixture\Resolver;

Resolver::getInstance()->requireDataFixture('Magento/Paypal/_files/order_express.php');

/** @var ObjectManagerInterface $objectManager */
$objectManager = Bootstrap::getObjectManager();
$order = $objectManager->get(OrderInterfaceFactory::class)->create()->loadByIncrementId('100000001');
$subTotal = 121;
$taxRate = .0825;
$taxAmount = $subTotal * $taxRate;
$shippingAmount = 15;
$totalAmount =  $subTotal + $taxAmount + $shippingAmount;

$order->setSubtotal($subTotal);
$order->setBaseSubtotal($subTotal);
$order->setGrandTotal($totalAmount);
$order->setBaseGrandTotal($totalAmount);
$order->setTaxAmount($taxAmount);

/** @var OrderRepository $orderRepository */
$orderRepository = $objectManager->get(OrderRepository::class);
$orderRepository->save($order);
