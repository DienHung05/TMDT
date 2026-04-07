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

use Magento\Review\Model\ResourceModel\Rating\Collection as RatingCollection;
use Magento\Review\Model\ResourceModel\Rating as RatingResourceModel;
use Magento\Store\Model\StoreManagerInterface;
use Magento\TestFramework\Helper\Bootstrap;

$objectManager = Bootstrap::getObjectManager();

$storeId = $objectManager->get(StoreManagerInterface::class)->getStore()->getId();

/** @var RatingResourceModel $ratingResourceModel */
$ratingResourceModel = $objectManager->create(RatingResourceModel::class);

/** @var RatingCollection $ratingCollection */
$ratingCollection = $objectManager->create(RatingCollection::class)->setOrder('rating_code', 'ASC');
$position = 0;

foreach ($ratingCollection as $rating) {
    $rating->setStores([$storeId])->setPosition($position++);
    $ratingResourceModel->save($rating);
}
