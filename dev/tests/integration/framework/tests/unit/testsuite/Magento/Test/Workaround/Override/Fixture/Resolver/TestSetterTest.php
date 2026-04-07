<?php
/**
<<<<<<< HEAD
 * Copyright 2020 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

namespace Magento\Test\Workaround\Override\Fixture\Resolver;

use Magento\TestFramework\Workaround\Override\Fixture\Resolver;
use Magento\TestFramework\Workaround\Override\Fixture\Resolver\TestSetter;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

/**
 * Provide tests for \Magento\TestFramework\Workaround\Override\Fixture\Resolver\TestSetter.
 */
class TestSetterTest extends TestCase
{
    /** @var TestSetter */
    private $object;

    /**
     * @inheritdoc
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->object = new TestSetter();
    }

    /**
     * @return void
     */
    public function testStartTest(): void
    {
        $resolverMock = $this->createResolverMock();
        $resolverMock->expects($this->once())
            ->method('setCurrentTest')
            ->with($this);
        $this->object->startTest($this);
    }

    /**
     * @return void
     */
    public function testEndTest(): void
    {
        $resolverMock = $this->createResolverMock();
        $resolverMock->expects($this->once())
            ->method('setCurrentTest')
            ->with(null);
        $this->object->endTest($this);
    }

    /**
     * Create mock for resolver object
     *
     * @return MockObject
     */
    private function createResolverMock(): MockObject
    {
        $mock = $this->getMockBuilder(Resolver::class)
            ->disableOriginalConstructor()
<<<<<<< HEAD
            ->onlyMethods(['setCurrentTest'])
            ->getMock();
        $reflection = new \ReflectionClass(Resolver::class);
        $reflectionProperty = $reflection->getProperty('instance');
        $reflectionProperty->setValue(null, $mock);
=======
            ->setMethods(['setCurrentTest'])
            ->getMock();
        $reflection = new \ReflectionClass(Resolver::class);
        $reflectionProperty = $reflection->getProperty('instance');
        $reflectionProperty->setAccessible(true);
        $reflectionProperty->setValue(Resolver::class, $mock);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

        return $mock;
    }
}
