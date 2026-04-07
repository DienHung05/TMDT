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
use Magento\TestModuleSynchronousAmqp\Api\ServiceInterface;

class RemoteServiceCommunicationTest extends QueueTestCaseAbstract
{
    /**
<<<<<<< HEAD
     * @var string[]
     */
    protected $consumers = ['RemoteServiceTestConsumer'];

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

    public function testRemoteServiceCommunication()
    {
        if ($this->connectionType === 'stomp') {
            $this->markTestSkipped('AMQP test skipped because STOMP connection is available.
            This test is AMQP-specific.');
        }

        $input = 'Input value';
        /** @var ServiceInterface $generatedRemoteService */
        /** @phpstan-ignore-next-line */
=======
     * {@inheritdoc}
     */
    protected $consumers = ['RemoteServiceTestConsumer'];

    public function testRemoteServiceCommunication()
    {
        $input = 'Input value';
        /** @var ServiceInterface $generatedRemoteService */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $generatedRemoteService = $this->objectManager->get(ServiceInterface::class);
        $response = $generatedRemoteService->execute($input);
        $this->assertEquals($input . ' processed by RPC handler', $response);
    }
}
