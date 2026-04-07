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
namespace Magento\Setup\Model;

use Magento\Framework\App\ObjectManagerFactory;
use Magento\Framework\App\Bootstrap as MagentoAppBootstrap;

/**
 * Class Bootstrap
 */
class Bootstrap
{
    /**
     * Creates instance of object manager factory
     *
     * @param string $rootDir
     * @param array $initParams
     * @return ObjectManagerFactory
     */
    public function createObjectManagerFactory($rootDir, array $initParams)
    {
        return MagentoAppBootstrap::createObjectManagerFactory($rootDir, $initParams);
    }
}
