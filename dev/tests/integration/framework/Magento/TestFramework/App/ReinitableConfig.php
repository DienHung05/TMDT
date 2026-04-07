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
namespace Magento\TestFramework\App;

use Magento\Framework\App\Config\ReinitableConfigInterface;
use Magento\TestFramework\ObjectManager;

/**
 * @inheritdoc
 */
class ReinitableConfig extends MutableScopeConfig implements ReinitableConfigInterface
{
    /**
     * @var Config
     */
    private $testAppConfig;

    /**
     * {@inheritdoc}
     */
    public function reinit()
    {
        $this->getTestScopeConfig()->clean();
        return $this;
    }

    /**
     * Retrieve Test Scope Config
     *
     * @return Config
     */
    public function getTestScopeConfig()
    {
        if (!$this->testAppConfig) {
            $this->testAppConfig = ObjectManager::getInstance()->get(Config::class);
        }

        return $this->testAppConfig;
    }
}
