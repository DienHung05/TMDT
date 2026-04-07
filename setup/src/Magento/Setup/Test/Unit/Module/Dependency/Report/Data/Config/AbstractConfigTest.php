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
declare(strict_types=1);

namespace Magento\Setup\Test\Unit\Module\Dependency\Report\Data\Config;

use Magento\Setup\Module\Dependency\Report\Data\Config\AbstractConfig;
use PHPUnit\Framework\TestCase;

class AbstractConfigTest extends TestCase
{
    public function testGetModules()
    {
        $modules = ['foo', 'baz', 'bar'];

        /** @var AbstractConfig $config */
<<<<<<< HEAD
        $config = $this->getMockBuilder(AbstractConfig::class)
            ->setConstructorArgs([$modules])
            ->onlyMethods(['getDependenciesCount'])
            ->getMock();
=======
        $config = $this->getMockForAbstractClass(
            AbstractConfig::class,
            ['modules' => $modules]
        );
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

        $this->assertEquals($modules, $config->getModules());
    }
}
