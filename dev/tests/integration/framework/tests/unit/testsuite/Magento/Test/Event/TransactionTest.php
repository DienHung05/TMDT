<?php
/**
<<<<<<< HEAD
 * Copyright 2012 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

/**
 * Test class for \Magento\TestFramework\Event\Transaction.
 */
namespace Magento\Test\Event;

<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;

=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
class TransactionTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Magento\TestFramework\Event\Transaction|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $_object;

    /**
     * @var \Magento\TestFramework\EventManager|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $_eventManager;

    /**
     * @var \Magento\TestFramework\Db\Adapter\TransactionInterface|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $_adapter;

    protected function setUp(): void
    {
        $this->_eventManager = $this->getMockBuilder(\Magento\TestFramework\EventManager::class)
            ->onlyMethods(['fireEvent'])
            ->disableOriginalConstructor()
            ->getMock();

        $this->_adapter =
            $this->createPartialMock(\Magento\TestFramework\Db\Adapter\Mysql::class, ['beginTransaction', 'rollBack']);
        $this->_object = $this->getMockBuilder(\Magento\TestFramework\Event\Transaction::class)
            ->onlyMethods(['_getConnection'])
            ->setConstructorArgs([$this->_eventManager])
            ->getMock();

        $this->_object->expects($this->any())->method('_getConnection')->willReturn($this->_adapter);
    }

    /**
     * Imitate transaction start request
     *
     * @param string $eventName
<<<<<<< HEAD
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     */
    protected function _imitateTransactionStartRequest($eventName)
    {
        $callback = function ($eventName, array $parameters) {
            /** @var $param \Magento\TestFramework\Event\Param\Transaction */
            $param = $parameters[1];
            $param->requestTransactionStart();
        };
        $this->_eventManager
            ->method('fireEvent')
<<<<<<< HEAD
            ->willReturnCallback(function () use ($callback) {
                return $callback;
            });
=======
            ->withConsecutive([$eventName])
            ->willReturnOnConsecutiveCalls($this->returnCallback($callback));
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }

    /**
     * Setup expectations for "transaction start" use case.
     */
    protected function _expectTransactionStart()
    {
<<<<<<< HEAD
        $this->_adapter->expects($this->any())->method('beginTransaction');
=======
        $this->_adapter->expects($this->once())->method('beginTransaction');
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }

    /**
     * Imitate transaction rollback request
     *
     * @param string $eventName
<<<<<<< HEAD
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     */
    protected function _imitateTransactionRollbackRequest($eventName)
    {
        $callback = function ($eventName, array $parameters) {
            /** @var $param \Magento\TestFramework\Event\Param\Transaction */
            $param = $parameters[1];
            $param->requestTransactionRollback();
        };
        $this->_eventManager
            ->method('fireEvent')
<<<<<<< HEAD
            ->willReturnCallback(function () use ($callback) {
                return $callback;
            });
=======
            ->withConsecutive([$eventName])
            ->willReturnOnConsecutiveCalls($this->returnCallback($callback));
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }

    /**
     * Setup expectations for "transaction rollback" use case.
     */
    protected function _expectTransactionRollback()
    {
<<<<<<< HEAD
        $this->_adapter->expects($this->any())->method('rollback');
=======
        $this->_adapter->expects($this->once())->method('rollback');
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }

    /**
     * @param string $method
     * @param string $eventName
<<<<<<< HEAD
     */
    #[DataProvider('startAndRollbackTransactionDataProvider')]
=======
     * @dataProvider startAndRollbackTransactionDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testStartAndRollbackTransaction($method, $eventName)
    {
        $eventManagerWithArgs = [];
        $this->_imitateTransactionStartRequest($eventName);
        $this->_expectTransactionStart();
        $eventManagerWithArgs[] = ['startTransaction'];
        $this->_object->{$method}($this);

        $this->_imitateTransactionRollbackRequest($eventName);
        $this->_expectTransactionRollback();
        $eventManagerWithArgs[] = ['rollbackTransaction'];
        $this->_object->{$method}($this);

        $this->_eventManager
            ->method('fireEvent')
<<<<<<< HEAD
            ->with($eventManagerWithArgs);
    }

    public static function startAndRollbackTransactionDataProvider()
=======
            ->withConsecutive($eventManagerWithArgs);
    }

    public function startAndRollbackTransactionDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            'method "startTest"' => ['startTest', 'startTestTransactionRequest'],
            'method "endTest"' => ['endTest', 'endTestTransactionRequest']
        ];
    }

    /**
     * @param string $method
     * @param string $eventName
<<<<<<< HEAD
     */
    #[DataProvider('startAndRollbackTransactionDataProvider')]
=======
     * @dataProvider startAndRollbackTransactionDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testDoNotStartAndRollbackTransaction($method, $eventName)
    {
        $this->_eventManager->expects($this->once())->method('fireEvent')->with($eventName);
        $this->_adapter->expects($this->never())->method($this->anything());
        $this->_object->{$method}($this);
    }

    public function testEndTestSuiteDoNothing()
    {
        $this->_eventManager->expects($this->never())->method('fireEvent');
        $this->_adapter->expects($this->never())->method($this->anything());
        $this->_object->endTestSuite();
    }

    public function testEndTestSuiteRollbackTransaction()
    {
        $this->_imitateTransactionStartRequest('startTestTransactionRequest');
        $this->_object->startTest($this);

        $this->_expectTransactionRollback();
        $this->_eventManager
            ->method('fireEvent')
<<<<<<< HEAD
            ->willReturnCallback(function ($arg) {
                if ($arg === 'rollbackTransaction') {
                    return null;
                }
            });
=======
            ->withConsecutive(['rollbackTransaction']);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

        $this->_object->endTestSuite();
    }
}
