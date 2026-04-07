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

use Magento\Framework\App\CacheInterface;
use Magento\Framework\Indexer\IndexerInterface;
use Magento\Framework\Indexer\IndexerRegistry;
use Magento\Framework\ObjectManager\ObjectManager;
use Magento\Setup\Fixtures\FixtureModel;
use Magento\Setup\Fixtures\IndexersStatesApplyFixture;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class IndexersStatesApplyFixtureTest extends TestCase
{
    /**
     * @var MockObject|FixtureModel
     */
    private $fixtureModelMock;

    /**
     * @var IndexersStatesApplyFixture
     */
    private $model;

    protected function setUp(): void
    {
        $this->fixtureModelMock = $this->createMock(FixtureModel::class);

        $this->model = new IndexersStatesApplyFixture($this->fixtureModelMock);
    }

    public function testExecute()
    {
<<<<<<< HEAD
        $cacheInterfaceMock = $this->createMock(CacheInterface::class);
        $indexerRegistryMock = $this->createMock(IndexerRegistry::class);
        $indexerMock = $this->createMock(IndexerInterface::class);
=======
        $cacheInterfaceMock = $this->getMockForAbstractClass(CacheInterface::class);
        $indexerRegistryMock = $this->createMock(IndexerRegistry::class);
        $indexerMock = $this->getMockForAbstractClass(IndexerInterface::class);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

        $indexerRegistryMock->expects($this->once())
            ->method('get')
            ->willReturn($indexerMock);

        $indexerMock->expects($this->once())
            ->method('setScheduled');

        $objectManagerMock = $this->createMock(ObjectManager::class);
        $objectManagerMock->expects($this->once())
            ->method('get')
            ->willReturn($cacheInterfaceMock);
        $objectManagerMock->expects($this->once())
            ->method('create')
            ->willReturn($indexerRegistryMock);

        $this->fixtureModelMock
            ->expects($this->once())
            ->method('getValue')
            ->willReturn([
                'indexer' => [
                    [
                        'id' => 1,
                        'set_scheduled' => false,
                    ]
                ]
            ]);
        $this->fixtureModelMock
            ->method('getObjectManager')
            ->willReturn($objectManagerMock);

        $this->model->execute();
    }

    public function testNoFixtureConfigValue()
    {
<<<<<<< HEAD
        $cacheInterfaceMock = $this->createMock(CacheInterface::class);
=======
        $cacheInterfaceMock = $this->getMockForAbstractClass(CacheInterface::class);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $cacheInterfaceMock->expects($this->never())->method('clean');

        $objectManagerMock = $this->createMock(ObjectManager::class);
        $objectManagerMock->expects($this->never())
            ->method('get')
            ->willReturn($cacheInterfaceMock);

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
        $this->assertSame('Indexers Mode Changes', $this->model->getActionTitle());
    }

    public function testIntroduceParamLabels()
    {
        $this->assertSame([], $this->model->introduceParamLabels());
    }
}
