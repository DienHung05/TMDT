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
declare(strict_types=1);

namespace Magento\Setup\Test\Unit\Module;

use Magento\Framework\App\ResourceConnection;
use Magento\Framework\ObjectManagerInterface;
use Magento\Setup\Model\ObjectManagerProvider;
use Magento\Setup\Module\Setup;
use Magento\Setup\Module\SetupFactory;
use PHPUnit\Framework\TestCase;

class SetupFactoryTest extends TestCase
{
    public function testCreate()
    {
<<<<<<< HEAD
        $objectManager = $this->createMock(ObjectManagerInterface::class);
=======
        $objectManager = $this->getMockForAbstractClass(
            ObjectManagerInterface::class,
            [],
            '',
            false
        );
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $objectManager->expects($this->once())
            ->method('get')
            ->with(ResourceConnection::class)
            ->willReturn($this->createMock(ResourceConnection::class));
        $objectManagerProvider = $this->createMock(ObjectManagerProvider::class);
        $objectManagerProvider->expects($this->once())->method('get')->willReturn($objectManager);
        $factory = new SetupFactory($objectManagerProvider);
        $this->assertInstanceOf(Setup::class, $factory->create());
    }

    public function testCreateWithParam()
    {
<<<<<<< HEAD
        $objectManager = $this->createMock(ObjectManagerInterface::class);
=======
        $objectManager = $this->getMockForAbstractClass(
            ObjectManagerInterface::class,
            [],
            '',
            false
        );
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $objectManager->expects($this->never())->method('get');
        $resource = $this->createMock(ResourceConnection::class);
        $objectManagerProvider = $this->createMock(ObjectManagerProvider::class);
        $objectManagerProvider->expects($this->once())->method('get')->willReturn($objectManager);
        $factory = new SetupFactory($objectManagerProvider);
        $this->assertInstanceOf(Setup::class, $factory->create($resource));
    }
}
