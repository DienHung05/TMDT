<?php
/**
<<<<<<< HEAD
 * Copyright 2015 Adobe
 * All Rights Reserved.
=======
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

namespace Magento\Setup\Module\Di\Code\Reader;

class Type
{
    /**
     * Whether instance is concrete implementation
     *
     * @param string $type
     * @return bool
     */
    public function isConcrete($type)
    {
        try {
            $instance = new \ReflectionClass($type);
        } catch (\ReflectionException $e) {
            return false;
        }
        return !$instance->isAbstract() && !$instance->isInterface();
    }
}
