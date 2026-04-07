<?php
/**
<<<<<<< HEAD
 * Copyright 2013 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

/**
 * Creates simple Catalog Rule with the following data:
 * active, applied to all products, without time limits, with 10% off for Not Logged In Customers
 */

/** @var $banner \Magento\CatalogRule\Model\Rule */
$catalogRule = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
    \Magento\CatalogRule\Model\Rule::class
);

$catalogRule
    ->setIsActive(1)
    ->setName('Test Catalog Rule')
    ->setCustomerGroupIds(\Magento\Customer\Model\GroupManagement::NOT_LOGGED_IN_ID)
    ->setDiscountAmount(10)
    ->setWebsiteIds([0 => 1])
    ->setSimpleAction('by_percent')
    ->setStopRulesProcessing(false)
    ->setSortOrder(0)
    ->setSubIsEnable(0)
    ->setSubDiscountAmount(0)
    ->save();

/** @var \Magento\CatalogRule\Model\Indexer\IndexBuilder $indexBuilder */
$indexBuilder = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()
    ->get(\Magento\CatalogRule\Model\Indexer\IndexBuilder::class);
$indexBuilder->reindexFull();
sleep(1);
