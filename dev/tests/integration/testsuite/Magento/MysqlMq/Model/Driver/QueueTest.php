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
namespace Magento\MysqlMq\Model\Driver;

use Magento\MysqlMq\Model\Driver\Queue;
<<<<<<< HEAD
use Magento\MysqlMq\Model\ResourceModel\MessageCollection;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * Test for MySQL queue driver class.
 *
 * @magentoDbIsolation disabled
 */
class QueueTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var Queue
     */
    protected $queue;

    /**
     * @var \Magento\Framework\ObjectManagerInterface
     */
    protected $objectManager;

    protected function setUp(): void
    {
        $this->objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();

        /** @var \Magento\Framework\MessageQueue\Config\Data $queueConfig */
        $queueConfig = $this->objectManager->get(\Magento\Framework\MessageQueue\Config\Data::class);
        $queueConfig->reset();

        $this->queue = $this->objectManager->create(
            \Magento\MysqlMq\Model\Driver\Queue::class,
            ['queueName' => 'queue2']
        );
    }

    protected function tearDown(): void
    {
        /** @var \Magento\Framework\MessageQueue\Config\Data $queueConfig */
        $queueConfig = $this->objectManager->get(\Magento\Framework\MessageQueue\Config\Data::class);
        $queueConfig->reset();
<<<<<<< HEAD
        $messageCollection = $this->objectManager->create(MessageCollection::class);
        foreach ($messageCollection as $message) {
            $message->delete();
        }
        parent::tearDown();
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }

    /**
     * @magentoDataFixture Magento/MysqlMq/_files/queues.php
     */
    public function testPushAndDequeue()
    {
        /** @var \Magento\Framework\MessageQueue\EnvelopeFactory $envelopFactory */
        $envelopFactory = $this->objectManager->get(\Magento\Framework\MessageQueue\EnvelopeFactory::class);
        $messageBody = '{"data": {"body": "Message body"}, "message_id": 1}';
        $topicName = 'some.topic';
        $envelop = $envelopFactory->create(['body' => $messageBody, 'properties' => ['topic_name' => $topicName]]);

        $this->queue->push($envelop);

        $messageFromQueue = $this->queue->dequeue();

        $this->assertEquals($messageBody, $messageFromQueue->getBody());
        $actualMessageProperties = $messageFromQueue->getProperties();
        $this->assertArrayHasKey('topic_name', $actualMessageProperties);
        $this->assertEquals($topicName, $actualMessageProperties['topic_name']);
    }
<<<<<<< HEAD

    /**
     * @magentoDataFixture Magento/MysqlMq/_files/queues.php
     */
    public function testCount()
    {
        /** @var \Magento\Framework\MessageQueue\EnvelopeFactory $envelopFactory */
        $envelopFactory = $this->objectManager->get(\Magento\Framework\MessageQueue\EnvelopeFactory::class);
        $messageBody = '{"data": {"body": "Message body"}, "message_id": 1}';
        $topicName = 'some.topic';
        $envelop1 = $envelopFactory->create(['body' => $messageBody, 'properties' => ['topic_name' => $topicName]]);
        $envelop2 = $envelopFactory->create(['body' => $messageBody, 'properties' => ['topic_name' => $topicName]]);
        $envelop3 = $envelopFactory->create(['body' => $messageBody, 'properties' => ['topic_name' => $topicName]]);

        $this->queue->push($envelop1);
        $this->queue->push($envelop2);
        $this->queue->push($envelop3);

        // Take first message in progress and reject
        $this->queue->reject($this->queue->dequeue());
        // Take second message in progress
        $this->queue->dequeue();
        // Assert that only 2 messages are available in queue (message1 and message3)
        $this->assertEquals(2, $this->queue->count());
    }
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
}
