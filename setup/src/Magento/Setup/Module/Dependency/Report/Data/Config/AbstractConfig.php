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
namespace Magento\Setup\Module\Dependency\Report\Data\Config;

use Magento\Setup\Module\Dependency\Report\Data\ConfigInterface;

/**
 * Config
 */
abstract class AbstractConfig implements ConfigInterface
{
    /**
     * Modules
     *
     * @var array
     */
    private $modules;

    /**
     * Config construct
     *
     * @param array $modules
     */
    public function __construct(array $modules = [])
    {
        $this->modules = $modules;
    }

    /**
     * {@inheritdoc}
     */
    public function getModules()
    {
        return $this->modules;
    }

    /**
     * {@inheritdoc}
     */
    abstract public function getDependenciesCount();
}
