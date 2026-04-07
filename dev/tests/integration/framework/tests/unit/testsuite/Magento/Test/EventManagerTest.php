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
 * Test class for \Magento\TestFramework\EventManager.
 */
namespace Magento\Test;

<<<<<<< HEAD
use Magento\Framework\TestFramework\Unit\Helper\MockCreationTrait;
use PHPUnit\Framework\Attributes\DataProvider;

class EventManagerTest extends \PHPUnit\Framework\TestCase
{
    use MockCreationTrait;
=======
class EventManagerTest extends \PHPUnit\Framework\TestCase
{
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    /**
     * @var \Magento\TestFramework\EventManager
     */
    protected $_eventManager;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject
     */
    protected $_subscriberOne;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject
     */
    protected $_subscriberTwo;

    protected function setUp(): void
    {
<<<<<<< HEAD
        $this->_subscriberOne = $this->createPartialMockWithReflection(
            \stdClass::class,
            ['testEvent']
        );
        $this->_subscriberTwo = $this->createPartialMockWithReflection(
            \stdClass::class,
            ['testEvent']
        );
=======
        $this->_subscriberOne = $this->getMockBuilder(\stdClass::class)
            ->addMethods(['testEvent'])
            ->getMock();
        $this->_subscriberTwo = $this->getMockBuilder(\stdClass::class)
            ->addMethods(['testEvent'])
            ->getMock();
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $this->_eventManager = new \Magento\TestFramework\EventManager(
            [$this->_subscriberOne, $this->_subscriberTwo]
        );
    }

    /**
     * @param bool $reverseOrder
     * @param array $expectedSubscribers
<<<<<<< HEAD
     */
    #[DataProvider('fireEventDataProvider')]
=======
     * @dataProvider fireEventDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testFireEvent($reverseOrder, $expectedSubscribers)
    {
        $actualSubscribers = [];
        $callback = function () use (&$actualSubscribers) {
            $actualSubscribers[] = 'subscriberOne';
        };
        $this->_subscriberOne->expects($this->once())->method('testEvent')->willReturnCallback($callback);
        $callback = function () use (&$actualSubscribers) {
            $actualSubscribers[] = 'subscriberTwo';
        };
        $this->_subscriberTwo->expects($this->once())->method('testEvent')->willReturnCallback($callback);
        $this->_eventManager->fireEvent('testEvent', [], $reverseOrder);
        $this->assertEquals($expectedSubscribers, $actualSubscribers);
    }

<<<<<<< HEAD
    public static function fireEventDataProvider()
=======
    public function fireEventDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            'straight order' => [false, ['subscriberOne', 'subscriberTwo']],
            'reverse order' => [true, ['subscriberTwo', 'subscriberOne']]
        ];
    }

    public function testFireEventParameters()
    {
        $paramOne = 123;
        $paramTwo = 456;
        $this->_subscriberOne->expects($this->once())->method('testEvent')->with($paramOne, $paramTwo);
        $this->_subscriberTwo->expects($this->once())->method('testEvent')->with($paramOne, $paramTwo);
        $this->_eventManager->fireEvent('testEvent', [$paramOne, $paramTwo]);
    }
}
