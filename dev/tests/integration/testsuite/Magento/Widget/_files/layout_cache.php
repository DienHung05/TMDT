<?php
/**
<<<<<<< HEAD
 * Copyright 2015 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

/** @var \Magento\Framework\App\Cache\Type\Layout $layoutCache */
$layoutCache = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()
    ->get(\Magento\Framework\App\Cache\Type\Layout::class);
$layoutCache->save('fixture layout cache data', 'LAYOUT_CACHE_FIXTURE');
