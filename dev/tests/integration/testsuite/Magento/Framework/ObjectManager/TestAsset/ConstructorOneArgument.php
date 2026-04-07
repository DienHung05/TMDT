<?php
/**
<<<<<<< HEAD
 * Copyright 2014 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
namespace Magento\Framework\ObjectManager\TestAsset;

class ConstructorOneArgument
{
    /**
     * @var \Magento\Framework\ObjectManager\TestAsset\Basic
     */
    protected $_one;

    /**
     * One argument
     *
     * @param \Magento\Framework\ObjectManager\TestAsset\Basic $one
     */
    public function __construct(\Magento\Framework\ObjectManager\TestAsset\Basic $one)
    {
        $this->_one = $one;
    }

    /**
     * @return Basic
     */
    public function getBasicDependency()
    {
        return $this->_one;
    }
}
