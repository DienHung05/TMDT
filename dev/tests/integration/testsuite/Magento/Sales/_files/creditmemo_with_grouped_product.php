<?php
/**
<<<<<<< HEAD
 * Copyright 2020 Adobe
 * All Rights Reserved.
 */
declare(strict_types=1);

use Magento\Sales\Model\InvoiceOrder;
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
use Magento\Sales\Model\Order;
use Magento\Sales\Model\Order\Creditmemo;
use Magento\Sales\Model\Order\Creditmemo\Item;
use Magento\Sales\Model\Order\CreditmemoFactory;
use Magento\TestFramework\Helper\Bootstrap;
use Magento\TestFramework\Workaround\Override\Fixture\Resolver;

Resolver::getInstance()->requireDataFixture('Magento/Sales/_files/order_with_grouped_product.php');

$objectManager = Bootstrap::getObjectManager();

$creditmemoFactory = $objectManager->get(CreditmemoFactory::class);
/** @var Order $order */
$order = $objectManager->create(Order::class);
$order->loadByIncrementId('100000002');
<<<<<<< HEAD
$objectManager->get(InvoiceOrder::class)->execute($order->getId());
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
$creditmemo = $creditmemoFactory->createByOrder($order, $order->getData());
$creditmemo->setOrder($order);
$creditmemo->setState(Creditmemo::STATE_OPEN);
$creditmemo->setIncrementId('100000002');
$creditmemo->save();

$orderItem = current($order->getAllItems());
$orderItem->setName('Test item')
    ->setQtyRefunded(1)
    ->setQtyInvoiced(10)
    ->setOriginalPrice(20);

$creditItem = $objectManager->get(Item::class);
$creditItem->setCreditmemo($creditmemo)
    ->setName('Creditmemo item')
    ->setOrderItemId($orderItem->getId())
    ->setQty(1)
    ->setPrice(20)
    ->save();
