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
 * Test class for \Magento\TestFramework\Event\Magento.
 */
namespace Magento\Test\Event;

<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;

=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
class MagentoTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Magento\TestFramework\Event\Magento
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
        $this->_object = new \Magento\TestFramework\Event\Magento($this->_eventManager);
    }

    protected function tearDown(): void
    {
        \Magento\TestFramework\Event\Magento::setDefaultEventManager(null);
    }

    public function testConstructorDefaultEventManager()
    {
        \Magento\TestFramework\Event\Magento::setDefaultEventManager($this->_eventManager);
        $this->_object = new \Magento\TestFramework\Event\Magento();
        $this->testInitStoreAfter();
    }

    /**
<<<<<<< HEAD
     * @param mixed $eventManager
     */
    #[DataProvider('constructorExceptionDataProvider')]
=======
     * @dataProvider constructorExceptionDataProvider
     * @param mixed $eventManager
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testConstructorException($eventManager)
    {
        $this->expectException(\Magento\Framework\Exception\LocalizedException::class);

        new \Magento\TestFramework\Event\Magento($eventManager);
    }

<<<<<<< HEAD
    public static function constructorExceptionDataProvider()
=======
    public function constructorExceptionDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return ['no event manager' => [null], 'not an event manager' => [new \stdClass()]];
    }

    public function testInitStoreAfter()
    {
        $this->_eventManager->expects($this->once())->method('fireEvent')->with('initStoreAfter');
        $this->_object->execute($this->createMock(\Magento\Framework\Event\Observer::class));
    }
}
