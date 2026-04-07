<?php
/**
<<<<<<< HEAD
 * Copyright 2017 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

/** @var \Magento\Framework\ObjectManagerInterface  $objectManager */
$objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();

/** @var \Magento\Store\Model\StoreManager $store */
$store = $objectManager->get(\Magento\Store\Model\StoreManager::class);

/** @var \Magento\Customer\Model\Customer $customer */
$customer = $objectManager->create(
    \Magento\Customer\Model\Customer::class,
    [
        'data' => [
            'website_id' => $store->getDefaultStoreView()->getWebsiteId(),
            'email' => 'john.doe@magento.com',
            'store_id' => $store->getDefaultStoreView()->getId(),
            'is_active' => true,
            'firstname' => 'John',
            'lastname' => 'Doe',
        ]
    ]
);
$customer->save();
