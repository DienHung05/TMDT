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

/** @var Value $config */
use Magento\Framework\App\Config\Value;
<<<<<<< HEAD
use Magento\TestFramework\App\Config as AppConfig;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

$config = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(Value::class);
$config->setPath('catalog/review/allow_guest');
$config->setScope('default');
$config->setScopeId(0);
$config->setValue(0);
$config->save();
<<<<<<< HEAD

/** @var AppConfig $appConfig */
$appConfig = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(AppConfig::class);
$appConfig->clean();
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
