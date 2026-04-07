<?php
/**
<<<<<<< HEAD
 * Copyright 2020 Adobe
 * All Rights Reserved.
 */
declare(strict_types=1);

use Magento\Config\Model\Config\Factory;
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
use Magento\Framework\App\ResourceConnection;
use Magento\TestFramework\Helper\Bootstrap;

/** @var ResourceConnection $resource */
$resource = Bootstrap::getObjectManager()->get(ResourceConnection::class);
$connection = $resource->getConnection();
$tableName = $resource->getTableName('core_config_data');

<<<<<<< HEAD
$configFactory = Bootstrap::getObjectManager()->get(Factory::class);
$config = $configFactory->create();
$config->setScope('stores');

$engine = $config->getConfigDataValue('catalog/search/engine');
$portField = "catalog/search/{$engine}_server_port";

$connection->query("DELETE FROM $tableName WHERE path = '{$portField}'"
=======
$connection->query("DELETE FROM $tableName WHERE path = 'catalog/search/elasticsearch7_server_port'"
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    ." AND scope = 'stores';");
