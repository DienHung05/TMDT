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

/** @var \Magento\Framework\Registry $registry */
$registry = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->get(\Magento\Framework\Registry::class);

$registry->unregister('isSecureArea');
$registry->register('isSecureArea', true);
/** Delete the second website **/
$website = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(\Magento\Store\Model\Website::class);
/** @var $website \Magento\Store\Model\Website */
$websiteId = $website->load('second', 'code')->getId();
if ($websiteId) {
    $website->delete();
}
<<<<<<< HEAD

/** Delete the third website **/
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
$website2 = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(\Magento\Store\Model\Website::class);
/** @var $website \Magento\Store\Model\Website */
$websiteId2 = $website2->load('third', 'code')->getId();
if ($websiteId2) {
    $website2->delete();
}

<<<<<<< HEAD
/** Delete the second store groups **/
$group = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(\Magento\Store\Model\Group::class);
/** @var $group \Magento\Store\Model\Group */
$groupId = $group->load('second_store', 'code')->getId();
if ($groupId) {
    $group->delete();
}

/** Delete the third store groups **/
$group2 = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(\Magento\Store\Model\Group::class);
/** @var $group2 \Magento\Store\Model\Group */
$groupId2 = $group2->load('third_store', 'code')->getId();
if ($groupId2) {
    $group2->delete();
}

/** Delete the second store **/
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
$store = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(\Magento\Store\Model\Store::class);
if ($store->load('second_store_view', 'code')->getId()) {
    $store->delete();
}

<<<<<<< HEAD
/** Delete the third store **/
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
$store2 = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(\Magento\Store\Model\Store::class);
if ($store2->load('third_store_view', 'code')->getId()) {
    $store2->delete();
}

$registry->unregister('isSecureArea');
$registry->register('isSecureArea', false);
