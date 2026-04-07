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
//@codingStandardsIgnoreFile
/** @var \Magento\Customer\Model\Attribute $model */
$model = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(\Magento\Customer\Model\Attribute::class);
/** @var \Magento\Store\Model\StoreManagerInterface $storeManager */
$storeManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(\Magento\Store\Model\StoreManager::class);
$model->loadByCode('customer_address', 'city');
$storeLabels = $model->getStoreLabels();
$stores = $storeManager->getStores();
/** @var \Magento\Store\Api\Data\WebsiteInterface $website */
foreach ($stores as $store) {
    $storeLabels[$store->getId()] = 'Suburb';
}
$model->setStoreLabels($storeLabels);
$model->save();
