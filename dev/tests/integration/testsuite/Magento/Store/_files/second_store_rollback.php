<?php
/**
<<<<<<< HEAD
 * Copyright 2014 Adobe
 * All Rights Reserved.
=======
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

use Magento\UrlRewrite\Model\ResourceModel\UrlRewriteCollection;
use Magento\UrlRewrite\Model\ResourceModel\UrlRewriteCollectionFactory;
use Magento\UrlRewrite\Model\UrlRewrite;

/** @var \Magento\Framework\Registry $registry */
$registry = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->get(\Magento\Framework\Registry::class);

$registry->unregister('isSecureArea');
$registry->register('isSecureArea', true);

/** @var Magento\Store\Model\Store $store */
$store = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(\Magento\Store\Model\Store::class);
$store->load('fixture_second_store');

if ($store->getId()) {
    $storeId = $store->getId();

    $urlRewriteCollectionFactory = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->get(
        UrlRewriteCollectionFactory::class
    );
    /** @var UrlRewriteCollection $urlRewriteCollection */
    $urlRewriteCollection = $urlRewriteCollectionFactory->create();
    $urlRewriteCollection->addFieldToFilter('store_id', ['eq' => $storeId]);
    $urlRewrites = $urlRewriteCollection->getItems();
    /** @var UrlRewrite $urlRewrite */
    foreach ($urlRewrites as $urlRewrite) {
        try {
            $urlRewrite->delete();
        } catch (\Exception $exception) {
            // already removed
        }
    }

    $store->delete();
}

$registry->unregister('isSecureArea');
$registry->register('isSecureArea', false);
