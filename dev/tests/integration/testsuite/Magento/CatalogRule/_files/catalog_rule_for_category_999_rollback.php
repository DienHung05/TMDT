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

use Magento\CatalogRule\Api\CatalogRuleRepositoryInterface;
use Magento\CatalogRule\Model\Indexer\IndexBuilder;
use Magento\CatalogRule\Model\ResourceModel\Rule\CollectionFactory;
use Magento\TestFramework\Helper\Bootstrap;

$objectManager = Bootstrap::getObjectManager();
/** @var CatalogRuleRepositoryInterface $ruleRepository */
$catalogRuleRepository = $objectManager->get(CatalogRuleRepositoryInterface::class);
/** @var CollectionFactory $ruleCollectionFactory */
$ruleCollectionFactory = $objectManager->get(CollectionFactory::class);
/** @var IndexBuilder $indexBuilder */
$indexBuilder = $objectManager->get(IndexBuilder::class);

$ruleCollection = $ruleCollectionFactory->create();
$ruleCollection->addFieldToFilter('name', 'Catalog rule for category 999');
$ruleCollection->setPageSize(1);
$catalogRule = $ruleCollection->getFirstItem();
if ($catalogRule->getId()) {
    $catalogRuleRepository->delete($catalogRule);
}
$indexBuilder->reindexFull();
