<?php
/**
<<<<<<< HEAD
 * Copyright 2017 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
namespace Magento\Framework\ObjectManager\TestAsset;

/**
 * Mock DI configuration in \Magento\Framework\ObjectManager\Factory\CompiledTest should inject an alias into
 * the constructor of this class
 */
class DependsOnAlias
{
    /**
     * @var HasOptionalParameters
     */
    protected $_object;

    /**
     * @param HasOptionalParameters $object
     */
    public function __construct(HasOptionalParameters $object)
    {
        $this->_object = $object;
    }

    public function getOverriddenString()
    {
        return $this->_object->getOptionalStringParameter();
    }

    public function getOverRiddenInteger()
    {
        return $this->_object->getOptionalIntegerParameter();
    }
}
