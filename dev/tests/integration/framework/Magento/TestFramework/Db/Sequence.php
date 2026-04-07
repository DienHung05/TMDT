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
namespace Magento\TestFramework\Db;

use Magento\Framework\App\ResourceConnection as AppResource;
use Magento\Framework\DB\Ddl\Sequence as DdlSequence;
<<<<<<< HEAD
use Magento\SalesSequence\Model\EntityPool;

=======

/**
 * Class Sequence
 */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
class Sequence
{
    /**
     * @var AppResource
     */
    protected $appResource;

    /**
     * @var DdlSequence
     */
    protected $ddlSequence;

    /**
<<<<<<< HEAD
     * @var EntityPool
     */
    private $entityPool;
=======
     * @var array
     */
    protected $entities = [
        'order',
        'invoice',
        'shipment',
        'rma_item'
    ];
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

    /**
     * @param AppResource $appResource
     * @param DdlSequence $ddlSequence
<<<<<<< HEAD
     * @param EntityPool $entityPool
     */
    public function __construct(
        AppResource $appResource,
        DdlSequence $ddlSequence,
        EntityPool $entityPool
    ) {
        $this->appResource = $appResource;
        $this->ddlSequence = $ddlSequence;
        $this->entityPool = $entityPool;
    }

    /**
     * Generates sequence for store IDS 0..(n-1)
     *
=======
     */
    public function __construct(
        AppResource $appResource,
        DdlSequence $ddlSequence
    ) {
        $this->appResource = $appResource;
        $this->ddlSequence = $ddlSequence;
    }

    /**
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @param int $n
     * @return void
     */
    public function generateSequences($n = 10)
    {
<<<<<<< HEAD
        for ($i = 0; $i < $n; $i++) {
            $this->generate($i);
        }
    }

    /**
     * Generates sequence for store ID
     *
     * @param int $storeId
     * @return void
     */
    public function generate(int $storeId): void
    {
        $connection = $this->appResource->getConnection();
        foreach ($this->entityPool->getEntities() as $entityName) {
            $sequenceName = $this->appResource->getTableName(sprintf('sequence_%s_%s', $entityName, $storeId));
            if (!$connection->isTableExists($sequenceName)) {
                $connection->query($this->ddlSequence->getCreateSequenceDdl($sequenceName));
=======
        $connection = $this->appResource->getConnection();
        for ($i = 0; $i < $n; $i++) {
            foreach ($this->entities as $entityName) {
                $sequenceName = $this->appResource->getTableName(sprintf('sequence_%s_%s', $entityName, $i));
                if (!$connection->isTableExists($sequenceName)) {
                    $connection->query($this->ddlSequence->getCreateSequenceDdl($sequenceName));
                }
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            }
        }
    }
}
