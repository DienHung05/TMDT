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
namespace Magento\Setup\Module\Dependency\Report\Dependency\Data;

use Magento\Setup\Module\Dependency\Report\Data\Config\AbstractConfig;

/**
 * Config
 *
 * @method \Magento\Setup\Module\Dependency\Report\Dependency\Data\Module[] getModules()
 */
class Config extends AbstractConfig
{
    /**
     * {@inheritdoc}
     */
    public function getDependenciesCount()
    {
        return $this->getHardDependenciesCount() + $this->getSoftDependenciesCount();
    }

    /**
     * Get hard dependencies count
     *
     * @return int
     */
    public function getHardDependenciesCount()
    {
        $dependenciesCount = 0;
        foreach ($this->getModules() as $module) {
            $dependenciesCount += $module->getHardDependenciesCount();
        }
        return $dependenciesCount;
    }

    /**
     * Get soft dependencies count
     *
     * @return int
     */
    public function getSoftDependenciesCount()
    {
        $dependenciesCount = 0;
        foreach ($this->getModules() as $module) {
            $dependenciesCount += $module->getSoftDependenciesCount();
        }
        return $dependenciesCount;
    }
}
