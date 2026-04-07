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

use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Registry;
use Magento\SalesRule\Api\RuleRepositoryInterface;
use Magento\TestFramework\Helper\Bootstrap;

$bootstrap = Bootstrap::getObjectManager();

/** @var Registry $registry */
$registry = $bootstrap->get(Registry::class);

/** @var RuleRepositoryInterface $ruleRepository */
$ruleRepository = $bootstrap->get(RuleRepositoryInterface::class);

$ruleId = $registry->registry('Magento/SalesRule/_files/cart_rule_50_percent_off');
if ($ruleId) {
    try {
        $ruleRepository->deleteById($ruleId);
        $registry->unregister('Magento/SalesRule/_files/cart_rule_50_percent_off');
    } catch (NoSuchEntityException $e) {
    }
}
