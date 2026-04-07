<?php
/**
<<<<<<< HEAD
 * Copyright 2016 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

namespace Magento\TestFramework\Helper;

use Magento\Framework\App\Cache\Frontend\Pool;

/**
 * Helper for cleaning cache
 */
class CacheCleaner
{
    /**
     * Clean cache by specified types
     *
     * @param array $cacheTypes
     */
    public static function clean(array $cacheTypes = [])
    {
        $cachePool = self::getCachePool();
        foreach ($cacheTypes as $cacheType) {
<<<<<<< HEAD
            $cachePool->get($cacheType)->clean();
=======
            $cachePool->get($cacheType)->getBackend()->clean();
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        }
    }

    /**
     * Clean all cache
     */
    public static function cleanAll()
    {
        $cachePool = self::getCachePool();
        foreach ($cachePool as $cacheType) {
<<<<<<< HEAD
            $cacheType->clean();
=======
            $cacheType->getBackend()->clean();
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        }
    }

    /**
     * Get cache pool
     *
     * @return Pool
     */
    private static function getCachePool()
    {
        return Bootstrap::getObjectManager()
            ->get(Pool::class);
    }
}
