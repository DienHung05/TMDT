<?php
/**
<<<<<<< HEAD
 * Copyright 2016 Adobe
 * All Rights Reserved.
 */
namespace Magento\Framework\MessageQueue\UseCase;

use Magento\Framework\MessageQueue\DefaultValueProvider;
use Magento\TestFramework\Helper\Bootstrap;

class MultipleTopicsPerQueueTest extends QueueTestCaseAbstract
{
    /**
     * @var string[]
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Framework\MessageQueue\UseCase;

class MultipleTopicsPerQueueTest extends QueueTestCaseAbstract
{
    /**
     * {@inheritdoc}
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     */
    protected $consumers = [
        'queue.for.multiple.topics.test.a',
        'queue.for.multiple.topics.test.b'
    ];

    /**
<<<<<<< HEAD
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

    /**
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * Verify that Queue Framework supports multiple topics per queue.
     *
     * Current test is not test of Web API framework itself,
     * it just utilizes its infrastructure to test Message Queue.
     */
    public function testSynchronousRpcCommunication()
    {
<<<<<<< HEAD
        if ($this->connectionType === 'stomp') {
            $this->markTestSkipped('AMQP test skipped because STOMP connection is available.
            This test is AMQP-specific.');
        }

=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        foreach (['multi.topic.queue.topic.a', 'multi.topic.queue.topic.b'] as $topic) {
            $input = "Input value for topic '{$topic}'";
            $response = $this->publisher->publish($topic, $input);
            $this->assertEquals($input . ' processed by RPC handler', $response);
        }
    }
}
