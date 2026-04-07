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

use Magento\SalesRule\Model\Rule;

$collection = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()
    ->get(\Magento\SalesRule\Model\ResourceModel\Rule\Collection::class);

/** @var Rule $rule */
foreach ($collection as $rule) {
    $rule->delete();
}
