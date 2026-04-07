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

namespace Magento\TestFramework\Workaround;

use Magento\TestFramework\Helper\Bootstrap;

/**
 * Deployment config handler.
 *
 * @package Magento\TestFramework\Workaround
 */
class CacheClean
{
    /**
     * Start test.
     *
     * @return void
     */
    public function endTest()
    {
        /** @var \Magento\Framework\App\Cache\Manager $cacheManager */
        $cacheManager = Bootstrap::getObjectManager()->get(\Magento\Framework\App\Cache\Manager::class);
        $types = $cacheManager->getAvailableTypes();
        $cacheManager->clean($types);
    }
}
