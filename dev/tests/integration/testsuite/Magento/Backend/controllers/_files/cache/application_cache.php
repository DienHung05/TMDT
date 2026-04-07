<?php
/**
<<<<<<< HEAD
 * Copyright 2013 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

/** @var $cache \Magento\Framework\App\Cache */
$cache = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(\Magento\Framework\App\Cache::class);
$cache->save('application data', 'APPLICATION_FIXTURE');
