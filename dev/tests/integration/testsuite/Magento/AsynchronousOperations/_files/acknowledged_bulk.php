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

use Magento\Framework\App\ResourceConnection;
use Magento\TestFramework\Helper\Bootstrap;
use Magento\TestFramework\Workaround\Override\Fixture\Resolver;

Resolver::getInstance()->requireDataFixture('Magento/AsynchronousOperations/_files/bulk.php');

$resource = Bootstrap::getObjectManager()->get(ResourceConnection::class);
$acknowledgedBulkTable = $resource->getTableName('magento_acknowledged_bulk');
$acknowledgedBulkQuery = "INSERT INTO {$acknowledgedBulkTable} (`bulk_uuid`) VALUES ('bulk-uuid-4'), ('bulk-uuid-5');";
$resource->getConnection()->query($acknowledgedBulkQuery);
