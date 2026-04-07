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
use Magento\Directory\Model\ResourceModel\Region\Collection as RegionResourceCollection;

$objectManager = Bootstrap::getObjectManager();
$regionCode = ['ER1', 'ER2'];

/** @var RegionResource $regionResource */
$regionResource = $objectManager->get(RegionResource::class);

$regionCollection = $objectManager->create(RegionResourceCollection::class)
    ->addFieldToFilter('code', ['in' => $regionCode]);

/** @var RegionModel $region */
foreach ($regionCollection as $region) {
    $regionResource->delete($region);
}
