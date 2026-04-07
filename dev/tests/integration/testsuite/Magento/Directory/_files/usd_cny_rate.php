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

use Magento\Directory\Model\Currency;
use Magento\TestFramework\Helper\Bootstrap;

$objectManager = Bootstrap::getObjectManager();

<<<<<<< HEAD
$rates = [
    'USD' => ['CNY' => '7.0000'],
    'EUR' => ['CNY' => '7.0000']
];
=======
$rates = ['USD' => ['CNY' => '7.0000']];
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
/** @var Currency $currencyModel */
$currencyModel = $objectManager->create(Currency::class);
$currencyModel->saveRates($rates);
