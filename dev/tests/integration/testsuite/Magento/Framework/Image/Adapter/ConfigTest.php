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
namespace Magento\Framework\Image\Adapter;

class ConfigTest extends \PHPUnit\Framework\TestCase
{
    public function testGetAdapterName()
    {
        /** @var Config $config */
        $config = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()
            ->create(\Magento\Framework\Image\Adapter\Config::class);
        $this->assertEquals(\Magento\Framework\Image\Adapter\AdapterInterface::ADAPTER_GD2, $config->getAdapterAlias());
    }
}
