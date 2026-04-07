<?php
/**
<<<<<<< HEAD
 * Copyright 2016 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
namespace Magento\TestModuleSample;

class ModuleInstallationTest extends \PHPUnit\Framework\TestCase
{
    public function testSampleModuleInstallation()
    {
        /** @var \Magento\Framework\Module\ModuleListInterface $moduleList */
        $moduleList = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->get(
            \Magento\Framework\Module\ModuleListInterface::class
        );
        $this->assertTrue(
            $moduleList->has('Magento_TestModuleSample'),
            'Test module [Magento_TestModuleSample] is not installed'
        );
    }
}
