<?php
/**
<<<<<<< HEAD
 * Copyright 2018 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
namespace Magento\TestFramework\Deploy;

use Magento\Framework\App\ResourceConnection;

/**
 * The purpose of this class is to describe what data is in table
 */
class TableData
{
    /**
     * @var ResourceConnection
     */
    private $resourceConnection;

    /**
     * TableData constructor.
     * @param ResourceConnection $resourceConnection
     */
    public function __construct(ResourceConnection $resourceConnection)
    {
        $this->resourceConnection = $resourceConnection;
    }

    /**
     * @param string $tableName
     * @param string $columnName
     * @return array
     */
    public function describeTableData($tableName, $columnName = null)
    {
        $adapter = $this->resourceConnection->getConnection();
        $cols = $columnName ?: '*';
        $select = $adapter
            ->select()
            ->from($tableName, $cols);
        return $columnName ? $adapter->fetchCol($select) : $adapter->fetchAll($select);
    }
}
