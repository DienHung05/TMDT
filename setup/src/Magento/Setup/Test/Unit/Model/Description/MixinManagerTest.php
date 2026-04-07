<?php
/**
<<<<<<< HEAD
 * Copyright 2017 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

namespace Magento\Setup\Test\Unit\Model\Description;

use Magento\Setup\Model\Description\Mixin\DescriptionMixinInterface;
use Magento\Setup\Model\Description\Mixin\MixinFactory;
use Magento\Setup\Model\Description\MixinManager;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class MixinManagerTest extends TestCase
{
    /**
     * @var MixinManager
     */
    private $mixinManager;

    /**
     * @var MockObject|MixinFactory
     */
    private $mixinFactoryMock;

    protected function setUp(): void
    {
        $this->mixinFactoryMock = $this->createMock(MixinFactory::class);
        $this->mixinManager = new MixinManager($this->mixinFactoryMock);
    }

    public function testApply()
    {
        $description = '>o<';
        $mixinList = ['x', 'y', 'z'];

<<<<<<< HEAD
        $xMixinMock = $this->createMock(DescriptionMixinInterface::class);
=======
        $xMixinMock = $this->getMockForAbstractClass(
            DescriptionMixinInterface::class
        );
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $xMixinMock->expects($this->once())
            ->method('apply')
            ->with($description)
            ->willReturn($description . 'x');

<<<<<<< HEAD
        $yMixinMock = $this->createMock(DescriptionMixinInterface::class);
=======
        $yMixinMock = $this->getMockForAbstractClass(
            DescriptionMixinInterface::class
        );
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $yMixinMock->expects($this->once())
            ->method('apply')
            ->with($description . 'x')
            ->willReturn($description . 'xy');

<<<<<<< HEAD
        $zMixinMock = $this->createMock(DescriptionMixinInterface::class);
=======
        $zMixinMock = $this->getMockForAbstractClass(
            DescriptionMixinInterface::class
        );
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $zMixinMock->expects($this->once())
            ->method('apply')
            ->with($description . 'xy')
            ->willReturn($description . 'xyz');

        $this->mixinFactoryMock
            ->expects($this->exactly(count($mixinList)))
            ->method('create')
<<<<<<< HEAD
            ->willReturnCallback(function ($arg1) use ($mixinList, $xMixinMock, $yMixinMock, $zMixinMock) {
                if ($arg1 == $mixinList[0]) {
                    return $xMixinMock;
                } elseif ($arg1 == $mixinList[1]) {
                    return $yMixinMock;
                } elseif ($arg1 == $mixinList[2]) {
                    return $zMixinMock;
                }
            });
=======
            ->withConsecutive(
                [$mixinList[0]],
                [$mixinList[1]],
                [$mixinList[2]]
            )
            ->will(
                $this->onConsecutiveCalls(
                    $xMixinMock,
                    $yMixinMock,
                    $zMixinMock
                )
            );
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

        $this->assertEquals(
            $description . 'xyz',
            $this->mixinManager->apply($description, $mixinList)
        );
    }
}
