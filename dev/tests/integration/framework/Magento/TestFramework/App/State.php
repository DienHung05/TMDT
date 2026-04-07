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

/**
 * App State class for integration tests framework
 */
namespace Magento\TestFramework\App;

class State extends \Magento\Framework\App\State
{
    /**
     * {@inheritdoc}
     */
    public function getAreaCode()
    {
        return $this->_areaCode;
    }

    /**
     * {@inheritdoc}
     */
    public function setAreaCode($code)
    {
        $this->_areaCode = $code;
        $this->_configScope->setCurrentScope($code);
    }

    /**
     * {@inheritdoc}
     */
    public function setMode($mode)
    {
        $this->_appMode = $mode;
    }
}
