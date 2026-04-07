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

class AsyncMultipleHandlersTest extends QueueTestCaseAbstract
{
    /**
     * @var string
     */
    protected $expectedMessages;

    /**
     * @var string[]
     */
    protected $consumers = [
        'mtmh.queue.1.consumer',
        'mtmh.queue.2.consumer',
    ];

    /**
     * @var string[]
     */
    private $topicValueMap = [
        'mtmh.topic.1' => 'mtmh.topic.1',
        'mtmh.topic.2' => ['mtmh.topic.2-1', 'mtmh.topic.2-2']
    ];

    /**
     * @var string[]
     */
    private $expectedValues = [
        'string-mtmh.topic.1',
        'mixed-mtmh.topic.1',
        'array-mtmh.topic.2-1',
        'array-mtmh.topic.2-2',
        'mixed-mtmh.topic.2-1',
        'mixed-mtmh.topic.2-2'
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
    public function testAsynchronousRpcCommunication()
    {
<<<<<<< HEAD
        if ($this->connectionType === 'stomp') {
            $this->markTestSkipped('AMQP test skipped because STOMP connection is available.
            This test is AMQP-specific.');
        }

=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        foreach ($this->topicValueMap as $topic => $data) {
            $message = null;
            if (is_array($data)) {
                foreach ($data as $key => $value) {
                    /** @var AsyncTestData $testObject */
                    $testObject = $this->objectManager->create(AsyncTestData::class); // @phpstan-ignore-line
                    $testObject->setValue($value);
                    $testObject->setTextFilePath($this->logFilePath);
                    $message[$key] = $testObject;
                }
            } else {
                $testObject = $this->objectManager->create(AsyncTestData::class); // @phpstan-ignore-line
                $testObject->setValue($data);
                $testObject->setTextFilePath($this->logFilePath);
                $message = $testObject;
            }
            $this->publisher->publish($topic, $message);
        }

        $this->waitForAsynchronousResult(count($this->expectedValues), $this->logFilePath);

        //assertions
        foreach ($this->expectedValues as $item) {
            $this->assertStringContainsString($item, file_get_contents($this->logFilePath));
        }
    }
}
