<?php
/**
<<<<<<< HEAD
 * Copyright 2021 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

use Magento\Customer\Model\GroupManagement;
<<<<<<< HEAD
use Magento\SalesRule\Api\Data\RuleInterface;
use Magento\SalesRule\Api\RuleRepositoryInterface;
=======
use Magento\SalesRule\Model\ResourceModel\Rule as RuleResourceModel;
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
use Magento\SalesRule\Model\Rule;
use Magento\Store\Model\StoreManagerInterface;
use Magento\TestFramework\Helper\Bootstrap;

$objectManager = Bootstrap::getObjectManager();

/** @var Rule $salesRule */
$salesRule = $objectManager->create(Rule::class);
$salesRule->setData(
    [
        'name' => '10$ fixed discount on whole cart',
        'is_active' => 1,
        'customer_group_ids' => [GroupManagement::NOT_LOGGED_IN_ID],
        'coupon_type' => Rule::COUPON_TYPE_NO_COUPON,
        'conditions' => [],
        'simple_action' => Rule::CART_FIXED_ACTION,
        'discount_amount' => 10,
        'discount_step' => 10,
        'stop_rules_processing' => 0,
        'website_ids' => [
            $objectManager->get(StoreManagerInterface::class)->getWebsite()->getId(),
        ],
        'store_labels' => [
            'store_id' => 0,
            'store_label' => '10$ fixed discount on whole cart',
        ]
    ]
);
<<<<<<< HEAD

// Deprecated model save call is required to ensure plugins are executed
$salesRule->save();
=======
$objectManager->get(RuleResourceModel::class)->save($salesRule);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
