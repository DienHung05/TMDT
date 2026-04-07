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

/**
 * Creates simple Catalog Rule with the following data:
 * active, applied to all products, without time limits, with 25% off for all customer groups
 */
use Magento\CatalogRule\Model\Indexer\IndexBuilder;
use Magento\CatalogRule\Model\Rule;
use Magento\Customer\Model\GroupManagement;
use Magento\TestFramework\Helper\Bootstrap;

/** @var $banner Rule */
$catalogRule = Bootstrap::getObjectManager()->create(
    Rule::class
);

$catalogRule
    ->setIsActive(1)
    ->setName('Test Catalog Rule With 25 Percent Off')
    ->setCustomerGroupIds('0')
    ->setDiscountAmount(25)
    ->setWebsiteIds([0 => 1])
    ->setSimpleAction('by_percent')
    ->setStopRulesProcessing(false)
    ->setSortOrder(0)
    ->setSubIsEnable(0)
    ->setSubDiscountAmount(0)
    ->save();

/** @var IndexBuilder $indexBuilder */
$indexBuilder = Bootstrap::getObjectManager()
    ->get(IndexBuilder::class);
$indexBuilder->reindexFull();
sleep(1);
