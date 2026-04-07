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
namespace Magento\TestFramework\App\ObjectManager\Environment;

class Developer extends \Magento\Framework\App\ObjectManager\Environment\Developer
{
    public function getDiConfig()
    {
        if (!$this->config) {
            $this->config = new \Magento\TestFramework\ObjectManager\Config(
                $this->envFactory->getRelations(),
                $this->envFactory->getDefinitions()
            );
        }

        return $this->config;
    }
}
