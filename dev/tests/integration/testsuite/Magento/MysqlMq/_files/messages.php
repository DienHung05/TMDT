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

/** @var \Magento\MysqlMq\Model\MessageFactory $messageFactory */
$messageFactory = $objectManager->create(\Magento\MysqlMq\Model\MessageFactory::class);
$message = $messageFactory->create();

$message->setTopicName('topic.updated.use.just.in.tests')
    ->setBody('{test:test}')
    ->save();

$message = $messageFactory->create();

$message->setTopicName('topic_second.updated.use.just.in.tests')
    ->setBody('{test:test}')
    ->save();

$message = $messageFactory->create();

$message->setTopicName('topic_thrird.updated.use.just.in.tests')
    ->setBody('{test:test}')
    ->save();
