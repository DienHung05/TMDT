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

use Magento\Framework\Module\Setup;
use Magento\TestFramework\Helper\Bootstrap;

$setup = Bootstrap::getObjectManager()->get(Setup::class);
$tableName = $setup->getTable('test_table_with_custom_trigger');
$setup->getConnection()->dropTrigger('test_custom_trigger');
$setup->getConnection()->dropTable($tableName);
