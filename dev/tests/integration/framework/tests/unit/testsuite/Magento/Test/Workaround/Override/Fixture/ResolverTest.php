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

namespace Magento\Test\Workaround\Override\Fixture;

use Magento\Framework\Component\ComponentRegistrar;
use Magento\Framework\Exception\LocalizedException;
<<<<<<< HEAD
use Magento\Framework\TestFramework\Unit\Helper\MockCreationTrait;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
use Magento\TestFramework\Workaround\Override\Fixture\Resolver;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

/**
 * Provide tests for \Magento\TestFramework\Workaround\Override\Fixture\Resolver.
 */
class ResolverTest extends TestCase
{
<<<<<<< HEAD
    use MockCreationTrait;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    /**
     * @return void
     */
    public function testGetApplierByFixtureType(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Unsupported fixture type unsupportedFixtureType provided');
        $resolverMock = $this->createResolverMock();
        $reflection = new \ReflectionClass(Resolver::class);
        $reflectionMethod = $reflection->getMethod('getApplierByFixtureType');
<<<<<<< HEAD
=======
        $reflectionMethod->setAccessible(true);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $reflectionMethod->invoke($resolverMock, 'unsupportedFixtureType');
    }

    /**
     * @return void
     */
    public function testRequireDataFixture(): void
    {
        $this->expectException(LocalizedException::class);
        $this->expectExceptionMessage('Fixture type is not specified for resolver');
        $this->createResolverMock();
        $resolver = Resolver::getInstance();
        $resolver->requireDataFixture('path/to/fixture.php');
    }

    /**
     * Create mock for resolver object
     *
     * @return MockObject
     */
    private function createResolverMock(): MockObject
    {
<<<<<<< HEAD
        $mock = $this->createPartialMockWithReflection(
            Resolver::class,
            ['getComponentRegistrar']
        );
        $mock->method('getComponentRegistrar')->willReturn(new ComponentRegistrar());
        $reflection = new \ReflectionClass(Resolver::class);
        $reflectionProperty = $reflection->getProperty('instance');
        $reflectionProperty->setValue(null, $mock);
=======
        $mock = $this->getMockBuilder(Resolver::class)
            ->disableOriginalConstructor()
            ->setMethods(['getComponentRegistrar'])
            ->getMock();
        $mock->method('getComponentRegistrar')->willReturn(new ComponentRegistrar());
        $reflection = new \ReflectionClass(Resolver::class);
        $reflectionProperty = $reflection->getProperty('instance');
        $reflectionProperty->setAccessible(true);
        $reflectionProperty->setValue(Resolver::class, $mock);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

        return $mock;
    }
}
