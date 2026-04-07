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
use Magento\Framework\DB\Adapter\AdapterInterface;
use Magento\Setup\Module\Setup;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class SetupTest extends TestCase
{
    const CONNECTION_NAME = 'connection';

    /**
     * @var AdapterInterface|MockObject
     */
    private $connection;

    /**
     * @var Setup
     */
    private $setup;

    /**
     * @var ResourceConnection|MockObject
     */
    private $resourceModelMock;

    protected function setUp(): void
    {
        $this->resourceModelMock = $this->createMock(ResourceConnection::class);
<<<<<<< HEAD
        $this->connection = $this->createMock(AdapterInterface::class);
=======
        $this->connection = $this->getMockForAbstractClass(AdapterInterface::class);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $this->resourceModelMock->expects($this->any())
            ->method('getConnection')
            ->with(self::CONNECTION_NAME)
            ->willReturn($this->connection);
        $this->resourceModelMock->expects($this->any())
            ->method('getConnectionByName')
            ->with(ResourceConnection::DEFAULT_CONNECTION)
            ->willReturn($this->connection);
        $this->setup = new Setup($this->resourceModelMock, self::CONNECTION_NAME);
    }

    public function testGetIdxName()
    {
        $tableName = 'table';
        $fields = ['field'];
        $indexType = 'index_type';
        $expectedIdxName = 'idxName';

        $this->resourceModelMock->expects($this->once())
            ->method('getTableName')
            ->with($tableName)
            ->willReturn($tableName);

        $this->connection->expects($this->once())
            ->method('getIndexName')
            ->with($tableName, $fields, $indexType)
            ->willReturn($expectedIdxName);

        $this->assertEquals('idxName', $this->setup->getIdxName($tableName, $fields, $indexType));
    }

    public function testGetFkName()
    {
        $tableName = 'table';
        $refTable = 'ref_table';
        $columnName = 'columnName';
        $refColumnName = 'refColumnName';

        $this->resourceModelMock->expects($this->once())
            ->method('getTableName')
            ->with($tableName)
            ->willReturn($tableName);

        $this->connection->expects($this->once())
            ->method('getForeignKeyName')
            ->with($tableName, $columnName, $refTable, $refColumnName)
            ->willReturn('fkName');

        $this->assertEquals('fkName', $this->setup->getFkName($tableName, $columnName, $refTable, $refColumnName));
    }
}
