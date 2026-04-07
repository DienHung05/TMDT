<?php
/**
<<<<<<< HEAD
 * Copyright 2015 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

namespace Magento\Setup\Model;

use Magento\Framework\ObjectManagerInterface;
use Magento\Setup\Mvc\Bootstrap\InitParamListener;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\MockObject\MockObject;
use Symfony\Component\Console\Application;
use Laminas\ServiceManager\ServiceLocatorInterface;

/**
 * Tests ObjectManagerProvider
 */
class ObjectManagerProviderTest extends TestCase
{
    /**
     * @var ObjectManagerProvider
     */
    private $object;

    /**
     * @var ServiceLocatorInterface|PHPUnit\Framework\MockObject\MockObject
     */
    private $locator;

    /**
     * @inheritDoc
     */
    protected function setUp(): void
    {
<<<<<<< HEAD
        $this->locator = $this->createMock(ServiceLocatorInterface::class);
=======
        $this->locator = $this->getMockForAbstractClass(ServiceLocatorInterface::class);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $this->object = new ObjectManagerProvider($this->locator, new Bootstrap());
        $this->locator->expects($this->any())
            ->method('get')
            ->willReturnMap(
                [
                    [InitParamListener::BOOTSTRAP_PARAM, []],
<<<<<<< HEAD
                    [Application::class, $this->createMock(Application::class)],
=======
                    [Application::class, $this->getMockForAbstractClass(Application::class)],
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                ]
            );
    }

    /**
     * Tests the same instance of ObjectManagerInterface should be provided by the ObjectManagerProvider
     */
    public function testGet()
    {
        $objectManager = $this->object->get();
        $this->assertInstanceOf(ObjectManagerInterface::class, $objectManager);
        $this->assertSame($objectManager, $this->object->get());
    }
}
