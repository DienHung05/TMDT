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
namespace Magento\TestModuleMysqlMq\Model;

use LogicException;
use Magento\Framework\MessageQueue\ConnectionLostException;

/**
 * Test message processor is used by \Magento\MysqlMq\Model\PublisherConsumerTest
 */
class Processor
{
    /**
     * @param DataObject $message
     */
    public function processMessage($message)
    {
        file_put_contents(
            $message->getOutputPath(),
            "Processed {$message->getEntityId()}" . PHP_EOL,
            FILE_APPEND
        );
    }

    /**
     * @param DataObject $message
     */
    public function processObjectCreated($message)
    {
        file_put_contents(
            $message->getOutputPath(),
            "Processed object created {$message->getEntityId()}" . PHP_EOL,
            FILE_APPEND
        );
    }

    /**
     * @param DataObject $message
     */
    public function processCustomObjectCreated($message)
    {
        file_put_contents(
            $message->getOutputPath(),
            "Processed custom object created {$message->getEntityId()}" . PHP_EOL,
            FILE_APPEND
        );
    }

    /**
     * @param DataObject $message
     */
    public function processObjectUpdated($message)
    {
        file_put_contents(
            $message->getOutputPath(),
            "Processed object updated {$message->getEntityId()}" . PHP_EOL,
            FILE_APPEND
        );
    }

    /**
     * @param DataObject $message
     */
    public function processMessageWithException($message)
    {
        file_put_contents($message->getOutputPath(), "Exception processing {$message->getEntityId()}");
        throw new LogicException(
            "Exception during message processing happened. Entity: {{$message->getEntityId()}}"
        );
    }

    /**
     * @throws ConnectionLostException
     */
    public function processMessageWithConnectionException()
    {
        throw new ConnectionLostException(
            "Connection exception during message processing happened."
        );
    }
}
