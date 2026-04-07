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
namespace Magento\Setup\Module\Dependency\Report\Circular;

use Magento\Setup\Module\Dependency\Report\Writer\Csv\AbstractWriter;

/**
 * Csv file writer for circular dependencies report
 */
class Writer extends AbstractWriter
{
    /**
     * Modules chain separator
     */
    const MODULES_SEPARATOR = '->';

    /**
     * Template method. Prepare data step
     *
     * @param \Magento\Setup\Module\Dependency\Report\Circular\Data\Config $config
     * @return array
     */
    protected function prepareData($config)
    {
        $data[] = ['Circular dependencies:', 'Total number of chains'];
        $data[] = ['', $config->getDependenciesCount()];
        $data[] = [];

        if ($config->getDependenciesCount()) {
            $data[] = ['Circular dependencies for each module:', ''];
            foreach ($config->getModules() as $module) {
                $data[] = [$module->getName(), $module->getChainsCount()];
                foreach ($module->getChains() as $chain) {
                    $data[] = [implode(self::MODULES_SEPARATOR, $chain->getModules())];
                }
                $data[] = [];
            }
        }
        array_pop($data);

        return $data;
    }
}
