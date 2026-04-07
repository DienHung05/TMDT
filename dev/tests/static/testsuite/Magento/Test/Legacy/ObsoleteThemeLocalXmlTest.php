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
 * Legacy tests to find themes non-modular local.xml files declaration
 */
namespace Magento\Test\Legacy;

use Magento\Framework\Component\ComponentRegistrar;

class ObsoleteThemeLocalXmlTest extends \PHPUnit\Framework\TestCase
{
    public function testLocalXmlFilesAbsent()
    {
        $componentRegistrar = new ComponentRegistrar();
        foreach ($componentRegistrar->getPaths(ComponentRegistrar::THEME) as $themeDir) {
            $this->assertEmpty(glob($themeDir . '/local.xml'));
        }
    }
}
