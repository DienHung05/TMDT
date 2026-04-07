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

use Magento\Config\Model\Config\Factory;
use Magento\TestFramework\Helper\Bootstrap;

/** @var Factory $configFactory */
$configFactory = Bootstrap::getObjectManager()->get(Factory::class);
$config = $configFactory->create();
$config->setScope('stores');
<<<<<<< HEAD

$engine = $config->getConfigDataValue('catalog/search/engine');
$portField = "catalog/search/{$engine}_server_port";

$config->setDataByPath($portField, 2309);
=======
$config->setDataByPath('catalog/search/elasticsearch7_server_port', 2309);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
$config->save();
