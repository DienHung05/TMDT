<?php
/**
<<<<<<< HEAD
 * Copyright 2019 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

declare(strict_types=1);

use Magento\TestFramework\Helper\Bootstrap;
use Magento\Directory\Model\Region as RegionModel;
use Magento\Directory\Model\ResourceModel\Region as RegionResource;

$objectManager = Bootstrap::getObjectManager();

$regionData = [
    [
        'country_id' => 'WW',
        'code' => 'ER1',
        'default_name' => 'Example Region 1'
    ],
    [
        'country_id' => 'WW',
        'code' => 'ER2',
        'default_name' => 'Example Region 2'
    ]
];

/** @var RegionModel $region */
$region = $objectManager->create(RegionModel::class);
/** @var RegionResource $regionResource */
$regionResource = $objectManager->get(RegionResource::class);

foreach ($regionData as $data) {
    /** @var RegionModel $region */
    $region = $objectManager->create(RegionModel::class);
    $region->setData($data);
    $regionResource->save($region);
}
