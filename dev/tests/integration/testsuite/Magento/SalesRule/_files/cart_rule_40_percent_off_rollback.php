<?php
/**
<<<<<<< HEAD
 * Copyright 2018 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

declare(strict_types=1);

<<<<<<< HEAD
use Magento\Framework\Api\Search\FilterGroup;
use Magento\Framework\Api\SearchCriteriaInterface;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Registry;
use Magento\SalesRule\Api\RuleRepositoryInterface;
use Magento\TestFramework\Helper\Bootstrap;

$bootstrap = Bootstrap::getObjectManager();

/** @var Registry $registry */
$registry = $bootstrap->get(Registry::class);

/** @var RuleRepositoryInterface $ruleRepository */
$ruleRepository = $bootstrap->get(RuleRepositoryInterface::class);

<<<<<<< HEAD
$salesRuleName = '40% Off on Large Orders';
$filterGroup = $bootstrap->get(FilterGroup::class);
$filterGroup->setData('name', $salesRuleName);
$searchCriteria = $bootstrap->create(SearchCriteriaInterface::class);
$searchCriteria->setFilterGroups([$filterGroup]);
$items = $ruleRepository->getList($searchCriteria)->getItems();
if ($items) {
    try {
        foreach ($items as $item) {
            $ruleRepository->deleteById($item->getRuleId());
        }
=======
$ruleId = $registry->registry('Magento/SalesRule/_files/cart_rule_40_percent_off');
if ($ruleId) {
    try {
        $ruleRepository->deleteById($ruleId);
        $registry->unregister('Magento/SalesRule/_files/cart_rule_40_percent_off');
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    } catch (NoSuchEntityException $e) {
    }
}
