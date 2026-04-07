<?php
/**
<<<<<<< HEAD
 * Copyright 2016 Adobe
 * All Rights Reserved.
 */

use Magento\Framework\App\Config\Value;
use Magento\TestFramework\App\Config as AppConfig;

/** @var Value $config */
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

/** @var Value $config */
use Magento\Framework\App\Config\Value;

>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
$config = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(Value::class);
$config->setPath('catalog/review/allow_guest');
$config->setScope('default');
$config->setScopeId(0);
$config->setValue(1);
$config->save();
<<<<<<< HEAD

/** @var AppConfig $appConfig */
$appConfig = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(AppConfig::class);
$appConfig->clean();
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
