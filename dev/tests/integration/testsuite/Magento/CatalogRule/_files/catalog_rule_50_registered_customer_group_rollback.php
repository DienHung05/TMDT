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
use Magento\CatalogRule\Model\ResourceModel\Rule;
use Magento\TestFramework\Helper\Bootstrap;

$objectManager = Bootstrap::getObjectManager();

/** @var Rule $catalogRuleResource */
$catalogRuleResource = $objectManager->create(Rule::class);
$connection = $catalogRuleResource->getConnection();

//Retrieve rule id by name
$select = $connection->select();
$select->from($catalogRuleResource->getMainTable(), 'rule_id');
$select->where('name = ?', 'Test Catalog Rule With 50 Percent Off');
$ruleId = $connection->fetchOne($select);

try {
    /** @var CatalogRuleRepositoryInterface $ruleRepository */
    $ruleRepository = $objectManager->create(CatalogRuleRepositoryInterface::class);
    $ruleRepository->deleteById($ruleId);
} catch (\Exception $ex) {
    //Nothing to remove
}
/** @var IndexBuilder $indexBuilder */
$indexBuilder = $objectManager->get(IndexBuilder::class);
$indexBuilder->reindexFull();
sleep(1);
