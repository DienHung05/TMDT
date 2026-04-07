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

namespace Magento\Setup\Test\Unit\Fixtures;

use Magento\Config\App\Config\Type\System;
use Magento\Framework\App\Cache;
use Magento\Framework\App\CacheInterface;
use Magento\Framework\App\Config;
use Magento\Framework\App\Config\ValueInterface;
use Magento\Framework\ObjectManager\ObjectManager;
use Magento\Setup\Fixtures\ConfigsApplyFixture;
use Magento\Setup\Fixtures\FixtureModel;
use PHPUnit\Framework\MockObject\MockObject;
<<<<<<< HEAD
use Magento\Framework\TestFramework\Unit\Helper\MockCreationTrait;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
use PHPUnit\Framework\TestCase;

class ConfigsApplyFixtureTest extends TestCase
{
<<<<<<< HEAD
    use MockCreationTrait;

=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

    /**
     * @var MockObject|FixtureModel
     */
    private $fixtureModelMock;

    /**
     * @var ConfigsApplyFixture
     */
    private $model;

    protected function setUp(): void
    {
        $this->fixtureModelMock = $this->createMock(FixtureModel::class);

        $this->model = new ConfigsApplyFixture($this->fixtureModelMock);
    }

    public function testExecute()
    {
        $cacheMock = $this->createMock(Cache::class);

        $valueMock = $this->createMock(Config::class);
        $configMock = $this->createMock(System::class);

        $objectManagerMock = $this->createMock(ObjectManager::class);
        $objectManagerMock
            ->method('get')
            ->willReturnMap([
                [CacheInterface::class, $cacheMock],
                [System::class, $configMock]
            ]);

        $this->fixtureModelMock
            ->expects($this->once())
            ->method('getValue')
            ->willReturn(['config' => $valueMock]);
        $this->fixtureModelMock
            ->method('getObjectManager')
            ->willReturn($objectManagerMock);

        $cacheMock->method('clean');
        $configMock->method('clean');

        $this->model->execute();
    }

    public function testNoFixtureConfigValue()
    {
<<<<<<< HEAD
        $configMock = $this->createPartialMockWithReflection(
            ValueInterface::class,
            ['save', 'isValueChanged', 'getOldValue', 'getFieldsetDataValue', 'setScope', 'setPath',
             'setValue', 'getScope', 'getPath', 'getValue', 'getId', 'setId']
        );
=======
        $configMock = $this->getMockBuilder(ValueInterface::class)
            ->setMethods(['save'])
            ->getMockForAbstractClass();
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $configMock->expects($this->never())->method('save');

        $objectManagerMock = $this->createMock(ObjectManager::class);
        $objectManagerMock->expects($this->never())
            ->method('create')
            ->willReturn($configMock);

        $this->fixtureModelMock
            ->expects($this->never())
            ->method('getObjectManager')
            ->willReturn($objectManagerMock);
        $this->fixtureModelMock
            ->expects($this->once())
            ->method('getValue')
            ->willReturn(false);

        $this->model->execute();
    }

    public function testGetActionTitle()
    {
        $this->assertSame('Config Changes', $this->model->getActionTitle());
    }

    public function testIntroduceParamLabels()
    {
        $this->assertSame([], $this->model->introduceParamLabels());
    }
}
