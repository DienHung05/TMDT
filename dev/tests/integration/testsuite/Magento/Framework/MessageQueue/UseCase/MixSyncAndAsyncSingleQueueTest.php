<?php
/**
<<<<<<< HEAD
 * Copyright 2016 Adobe
 * All Rights Reserved.
 */
namespace Magento\Framework\MessageQueue\UseCase;

use Magento\Framework\MessageQueue\DefaultValueProvider;
use Magento\TestFramework\Helper\Bootstrap;
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Framework\MessageQueue\UseCase;

>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
use Magento\TestModuleAsyncAmqp\Model\AsyncTestData;

class MixSyncAndAsyncSingleQueueTest extends QueueTestCaseAbstract
{
    /**
     * @var AsyncTestData
     */
    protected $msgObject;

    /**
<<<<<<< HEAD
     * @var string[]
=======
     * {@inheritdoc}
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     */
    protected $consumers = ['mixed.sync.and.async.queue.consumer'];

    /**
     * @var string[]
     */
    protected $messages = ['message1', 'message2', 'message3'];

    /**
     * @var int
     */
    protected $maxMessages = 4;

<<<<<<< HEAD
    /**
     * @var string
     */
    private $connectionType;

    /**
     * @inheritdoc
     */
    protected function setUp(): void
    {
        $this->objectManager = Bootstrap::getObjectManager();
        /** @var DefaultValueProvider $defaultValueProvider */
        $defaultValueProvider = $this->objectManager->get(DefaultValueProvider::class);
        $this->connectionType = $defaultValueProvider->getConnection();

        if ($this->connectionType === 'amqp') {
            parent::setUp();
        }
    }

    public function testMixSyncAndAsyncSingleQueue()
    {
        if ($this->connectionType === 'stomp') {
            $this->markTestSkipped('AMQP test skipped because STOMP connection is available.
            This test is AMQP-specific.');
        }

=======
    public function testMixSyncAndAsyncSingleQueue()
    {
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $this->msgObject = $this->objectManager->create(AsyncTestData::class); // @phpstan-ignore-line

        // Publish asynchronous messages
        foreach ($this->messages as $item) {
            $this->msgObject->setValue($item);
            $this->msgObject->setTextFilePath($this->logFilePath);
            $this->publisher->publish('multi.topic.queue.topic.c', $this->msgObject);
        }

        // Publish synchronous message to the same queue
        $input = 'Input value';
        $response = $this->publisher->publish('sync.topic.for.mixed.sync.and.async.queue', $input);
        $this->assertEquals($input . ' processed by RPC handler', $response);

        $this->waitForAsynchronousResult(count($this->messages), $this->logFilePath);

        // Verify that asynchronous messages were processed
        foreach ($this->messages as $item) {
            $this->assertStringContainsString($item, file_get_contents($this->logFilePath));
        }
    }
}
