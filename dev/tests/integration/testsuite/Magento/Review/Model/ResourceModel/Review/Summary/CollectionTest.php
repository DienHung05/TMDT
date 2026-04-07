<?php
/**
<<<<<<< HEAD
 * Copyright 2022 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

namespace Magento\Review\Model\ResourceModel\Review\Summary;

use Magento\Framework\Data\Collection\Db\FetchStrategy\Query;
use Magento\Framework\Data\Collection\EntityFactory;
use Magento\Framework\DB\Adapter\AdapterInterface;
use Magento\Framework\DB\Adapter\Pdo\Mysql;
use Magento\Framework\DB\Select;
use Magento\Framework\DB\Select\SelectRenderer;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magento\Framework\TestFramework\Unit\Helper\ObjectManager;
use Magento\Review\Model\ResourceModel\Review\Summary\Collection;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
use PHPUnit\Framework\MockObject\MockObject;
use Psr\Log\LoggerInterface;

/**
 * Tests some functionality of the Review Summary collection
 */
class CollectionTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var Collection
     */
    protected Collection $collection;

    /**
     * @var Query
     */
    protected Query $fetchStrategyMock;

    /**
     * @var EntityFactory
     */
    protected EntityFactory $entityFactoryMock;

    /**
     * @var LoggerInterface
     */
    protected LoggerInterface $loggerMock;

    /**
     * @var AbstractDb
     */
    protected AbstractDb $resourceMock;

    /**
     * @var AdapterInterface
     */
    protected AdapterInterface $connectionMock;

    /**
     * @var Select
     */
    protected Select $selectMock;

    protected function setUp(): void
    {
        $this->fetchStrategyMock = $this->createPartialMock(
            Query::class,
            ['fetchAll']
        );
        $this->entityFactoryMock = $this->createPartialMock(
            EntityFactory::class,
            ['create']
        );
<<<<<<< HEAD
        $this->loggerMock = $this->createMock(LoggerInterface::class);
        $this->resourceMock = $this->createMock(AbstractDb::class);
=======
        $this->loggerMock = $this->getMockForAbstractClass(LoggerInterface::class);
        $this->resourceMock = $this->getMockBuilder(AbstractDb::class)
            ->setMethods(['getConnection', 'getMainTable', 'getTable'])
            ->disableOriginalConstructor()
            ->getMockForAbstractClass();
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $this->connectionMock = $this->createPartialMock(
            Mysql::class,
            ['select', 'query']
        );
        $selectRenderer = $this->getMockBuilder(SelectRenderer::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->selectMock = $this->getMockBuilder(Select::class)
<<<<<<< HEAD
            ->onlyMethods(['where'])
=======
            ->setMethods(['where'])
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            ->setConstructorArgs(['adapter' => $this->connectionMock, 'selectRenderer' => $selectRenderer])
            ->getMock();
        $this->connectionMock->expects($this->once())
            ->method('select')
            ->willReturn($this->selectMock);
        $this->resourceMock->expects($this->once())
            ->method('getConnection')
            ->willReturn($this->connectionMock);
        $this->resourceMock->expects($this->once())
            ->method('getMainTable')
            ->willReturn('main_table_name');

        $this->resourceMock->expects($this->once())
            ->method('getTable')
            ->willReturnArgument(0);
        $objectManager = new ObjectManager($this);
        $this->collection = $objectManager->getObject(
            Collection::class,
            [
                'entityFactory' => $this->entityFactoryMock,
                'logger' => $this->loggerMock,
                'fetchStrategy' => $this->fetchStrategyMock,
                'resource' => $this->resourceMock
            ]
        );
    }

    /**
     * @param array|int $storeId
     * @param string $expectedQuery
<<<<<<< HEAD
     */
    #[DataProvider('storeIdDataProvider')]
=======
     * @dataProvider storeIdDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testAddStoreFilter(array|int $storeId, string $expectedQuery)
    {
        $this->selectMock->expects($this->once())->method('where')->with($expectedQuery, $storeId);
        $this->collection->addStoreFilter($storeId);
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function storeIdDataProvider(): array
=======
    public function storeIdDataProvider(): array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            [1, 'store_id = ?'],
            [[1,2], 'store_id IN (?)']
        ];
    }
}
