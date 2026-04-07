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
namespace Magento\TestFramework\ObjectManager;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\Stdlib\CookieManagerInterface;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Framework\App\MutableScopeConfig;
use Magento\Framework\App\ReinitableConfig;
<<<<<<< HEAD
use Magento\Backend\App\Config as BackendConfig;
use Magento\TestFramework\ScopeSwitcherInterface;
=======
use Magento\Framework\App\Config as AppConfig;
use Magento\Backend\App\Config as BackendConfig;
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * Class which hold configurations (preferences, etc...) of integration test framework
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class Configurator implements \Magento\Framework\ObjectManager\DynamicConfigInterface
{
    /**
     * Map application initialization params to Object Manager configuration format.
     *
     * @return array
     */
    public function getConfiguration()
    {
        return [
            'preferences' => [
                CookieManagerInterface::class => \Magento\TestFramework\CookieManager::class,
                StoreManagerInterface::class => \Magento\TestFramework\Store\StoreManager::class,
                ScopeConfigInterface::class => \Magento\TestFramework\App\Config::class,
                \Magento\Framework\App\Config::class => \Magento\TestFramework\App\Config::class,
                BackendConfig::class => \Magento\TestFramework\Backend\App\Config::class,
                ReinitableConfig::class => \Magento\TestFramework\App\ReinitableConfig::class,
                MutableScopeConfig::class => \Magento\TestFramework\App\MutableScopeConfig::class,
<<<<<<< HEAD
                ScopeSwitcherInterface::class => \Magento\TestFramework\Store\ScopeSwitcher::class,
            ],
            \Magento\TestFramework\Store\ScopeSwitcher::class => [
                'arguments' => [
                    'storeManager' => [
                        // @phpstan-ignore-next-line
                        'instance' => \Magento\Store\Model\StoreManagerInterface\Proxy::class
                    ]
                ]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            ]
        ];
    }
}
