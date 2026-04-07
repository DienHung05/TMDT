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

use Magento\Sales\Api\Data\OrderInterfaceFactory;
use Magento\Sales\Model\Order;
use Magento\TestFramework\Helper\Bootstrap;
use Magento\TestFramework\Workaround\Override\Fixture\Resolver;

Resolver::getInstance()->requireDataFixture('Magento/Sales/_files/transactions_list_rollback.php');
Resolver::getInstance()->requireDataFixture('Magento/Sales/_files/transactions_detailed.php');
$objectManager = Bootstrap::getObjectManager();
/** @var Order $order */
$order = $objectManager->get(OrderInterfaceFactory::class)->create()->loadByIncrementId('100000006');
$payment = $order->getPayment();

$transactions = [
    [
        'transaction_id' => 'trx_auth1',
        'is_transaction_closed' => 1,
        'order_id' => $order->getId(),
        'payment_id' => $payment->getId(),
        'parent_transaction_id' => 'trx_auth1',
        'txn_id' => 'aaabbbccc',
    ],
    [
        'transaction_id' => 'trx_auth2',
        'is_transaction_closed' => 1,
        'parent_transaction_id' => 'trx_auth1',
        'order_id' => $order->getId(),
        'payment_id' => $payment->getId(),
        'txn_id' => '123456',
    ],
    [
        'transaction_id' => 'trx_auth3',
        'is_transaction_closed' => 1,
        'parent_transaction_id' => 'trx_auth1',
        'order_id' => $order->getId(),
        'payment_id' => $payment->getId(),
        'txn_id' => 'wooooh',
    ],
    [
        'transaction_id' => 'trx_auth4',
        'is_transaction_closed' => 1,
        'parent_transaction_id' => 'trx_auth2',
        'order_id' => $order->getId(),
        'payment_id' => $payment->getId(),
        'txn_id' => '--09--',
    ]
];

/** @var array $transactionData */
foreach ($transactions as $transactionData) {
    $payment->addData($transactionData);
<<<<<<< HEAD
    $payment->addTransaction(\Magento\Sales\Model\Order\Payment\Transaction::TYPE_AUTH);
=======
    $payment->addTransaction(\Magento\Sales\Model\Order\Payment\Transaction::TYPE_CAPTURE);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
}

$order->save();
