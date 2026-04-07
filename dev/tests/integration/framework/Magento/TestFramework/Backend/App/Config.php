<?php
/**
 * Default application path for backend area
 *
<<<<<<< HEAD
 * Copyright 2016 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

namespace Magento\TestFramework\Backend\App;

use Magento\Framework\App\Config\ScopeConfigInterface;

/**
 * Backend config accessor.
 */
class Config extends \Magento\Backend\App\Config
{
    /**
     * @var \Magento\TestFramework\App\MutableScopeConfig
     */
    private $mutableScopeConfig;

    /**
     * Config constructor.
     * @param \Magento\TestFramework\App\Config $appConfig
     * @param \Magento\TestFramework\App\MutableScopeConfig $mutableScopeConfig
     */
    public function __construct(
        \Magento\TestFramework\App\Config $appConfig,
        \Magento\TestFramework\App\MutableScopeConfig $mutableScopeConfig
    ) {
        parent::__construct($appConfig);
        $this->mutableScopeConfig = $mutableScopeConfig;
    }

    /**
     * @inheritdoc
     */
    public function setValue(
        $path,
        $value,
        $scope = ScopeConfigInterface::SCOPE_TYPE_DEFAULT,
        $scopeCode = null
    ) {
        $this->mutableScopeConfig->setValue($path, $value, $scope, $scopeCode);
    }
}
