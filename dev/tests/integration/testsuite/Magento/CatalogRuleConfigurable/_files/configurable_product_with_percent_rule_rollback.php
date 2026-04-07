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
use Magento\CatalogRule\Model\Rule;
use Magento\TestFramework\Helper\Bootstrap;
use Magento\TestFramework\Workaround\Override\Fixture\Resolver;

Resolver::getInstance()->requireDataFixture(
    'Magento/ConfigurableProduct/_files/configurable_product_with_custom_option_and_simple_tier_price_rollback.php'
);

$objectManager = Bootstrap::getObjectManager();
/** @var CatalogRuleRepositoryInterface $ruleRepository */
$ruleRepository = $objectManager->create(CatalogRuleRepositoryInterface::class);
/** @var IndexBuilder $indexBuilder */
$indexBuilder = $objectManager->get(IndexBuilder::class);
/** @var CollectionFactory $ruleCollectionFactory */
$ruleCollectionFactory = $objectManager->get(CollectionFactory::class);
$ruleCollection = $ruleCollectionFactory->create()
    ->addFieldToFilter('name', ['eq' => 'Percent rule for configurable product'])
    ->setPageSize(1);
/** @var Rule $rule */
$rule = $ruleCollection->getFirstItem();
if ($rule->getId()) {
    $ruleRepository->delete($rule);
}
$indexBuilder->reindexFull();
