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
 * Test class for \Magento\TestFramework\Event\PhpUnit.
 */
namespace Magento\Test\Event;

<<<<<<< HEAD
use PHPUnit\Framework\TestSuite;
use PHPUnit\Framework\Attributes\DataProvider;

=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
class PhpUnitTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Magento\TestFramework\Event\PhpUnit
     */
    protected $_object;

    /**
     * @var \Magento\TestFramework\EventManager|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $_eventManager;

    protected function setUp(): void
    {
        $this->_eventManager = $this->getMockBuilder(\Magento\TestFramework\EventManager::class)
<<<<<<< HEAD
            ->onlyMethods(['fireEvent'])
=======
            ->setMethods(['fireEvent'])
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            ->setConstructorArgs([[]])
            ->getMock();
        $this->_object = new \Magento\TestFramework\Event\PhpUnit($this->_eventManager);
    }

    protected function tearDown(): void
    {
        \Magento\TestFramework\Event\PhpUnit::setDefaultEventManager(null);
    }

    public function testConstructorDefaultEventManager()
    {
        \Magento\TestFramework\Event\PhpUnit::setDefaultEventManager($this->_eventManager);
        $this->_object = new \Magento\TestFramework\Event\PhpUnit();
        $this->testStartTestSuiteFireEvent();
    }

<<<<<<< HEAD
=======
    /**
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testConstructorException()
    {
        $this->expectException(\Magento\Framework\Exception\LocalizedException::class);

        new \Magento\TestFramework\Event\Magento();
    }

    /**
     * @param string $method
<<<<<<< HEAD
     */
    #[DataProvider('doNotFireEventDataProvider')]
=======
     * @dataProvider doNotFireEventDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testDoNotFireEvent($method)
    {
        $this->_eventManager->expects($this->never())->method('fireEvent');
        $this->_object->{$method}($this, new \PHPUnit\Framework\AssertionFailedError(), 0);
    }

<<<<<<< HEAD
    public static function doNotFireEventDataProvider()
=======
    public function doNotFireEventDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            'method "addError"' => ['addError'],
            'method "addFailure"' => ['addFailure'],
            'method "addIncompleteTest"' => ['addIncompleteTest'],
            'method "addSkippedTest"' => ['addSkippedTest']
        ];
    }

    public function testStartTestSuiteFireEvent()
    {
        $this->_eventManager->expects($this->once())->method('fireEvent')->with('startTestSuite');
<<<<<<< HEAD
        $this->_object->startTestSuite(TestSuite::empty('TestSuite'));
    }
    public function testEndTestSuiteFireEvent()
    {
        $this->_eventManager->expects($this->once())->method('fireEvent')->with('endTestSuite');
        $this->_object->endTestSuite(TestSuite::empty('TestSuite'));
=======
        $this->_object->startTestSuite(new \PHPUnit\Framework\TestSuite());
    }

    public function testStartTestSuiteDoNotFireEvent()
    {
        $this->_eventManager->expects($this->never())->method('fireEvent');
        $this->_object->startTestSuite(new \PHPUnit\Framework\DataProviderTestSuite());
    }

    public function testEndTestSuiteFireEvent()
    {
        $this->_eventManager->expects($this->once())->method('fireEvent')->with('endTestSuite');
        $this->_object->endTestSuite(new \PHPUnit\Framework\TestSuite());
    }

    public function testEndTestSuiteDoNotFireEvent()
    {
        $this->_eventManager->expects($this->never())->method('fireEvent');
        $this->_object->endTestSuite(new \PHPUnit\Framework\DataProviderTestSuite());
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }

    public function testStartTestFireEvent()
    {
        $this->_eventManager->expects($this->once())->method('fireEvent')->with('startTest');
        $this->_object->startTest($this);
    }

    public function testStartTestDoNotFireEvent()
    {
        $this->_eventManager->expects($this->never())->method('fireEvent');
<<<<<<< HEAD
=======
     //   $this->_object->startTest(new \PHPUnit\Framework\Warning());
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $this->_object->startTest($this->createMock(\PHPUnit\Framework\Test::class));
    }

    public function testEndTestFireEvent()
    {
        $this->_eventManager->expects($this->once())->method('fireEvent')->with('endTest');
        $this->_object->endTest($this, 0);
    }

    public function testEndTestDoNotFireEvent()
    {
        $this->_eventManager->expects($this->never())->method('fireEvent');
<<<<<<< HEAD
=======
   //     $this->_object->endTest(new \PHPUnit\Framework\Warning(), 0);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $this->_object->endTest($this->createMock(\PHPUnit\Framework\Test::class), 0);
    }
}
