<?php
/**
<<<<<<< HEAD
 * Copyright 2018 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

$objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();
$queues = [
    'queue1',
    'queue2',
    'queue3',
    'queue4',
    'demo-queue-1',
    'demo-queue-2',
    'demo-queue-3',
    'demo-queue-4',
    'demo-queue-5',
    'demo-queue-6',
    'demo-queue-7',
    'demo-queue-8',
    'demo-queue-9',
];
foreach ($queues as $queueName) {
    /** @var \Magento\MysqlMq\Model\Queue $queue */
    $queue = $objectManager->create(\Magento\MysqlMq\Model\Queue::class);
    $queue->load($queueName, 'name');
    if (!$queue->getId()) {
        $queue->setName($queueName)->save();
    }
}
