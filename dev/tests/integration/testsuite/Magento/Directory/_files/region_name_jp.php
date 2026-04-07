<?php
/**
<<<<<<< HEAD
 * Copyright 2020 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

use Magento\Framework\App\ResourceConnection;
use Magento\TestFramework\Helper\Bootstrap;

/** @var ResourceConnection $resource */
$resource = Bootstrap::getObjectManager()->get(ResourceConnection::class);
$connection = $resource->getConnection();
/** Add japan name of Alabama State */
$alabamaOnJP = [
    'locale' => 'JA_jp',
    'region_id' => 1,
    'name' => 'アラバマ'
];
$connection->insert(
    $resource->getTableName('directory_country_region_name'),
    $alabamaOnJP
);
