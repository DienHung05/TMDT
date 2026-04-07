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
namespace Magento\Store\Model\App;

class EmulationTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Magento\Store\Model\App\Emulation
     */
    protected $_model;

    /**
     * @covers \Magento\Store\Model\App\Emulation::startEnvironmentEmulation
     * @covers \Magento\Store\Model\App\Emulation::stopEnvironmentEmulation
     */
    public function testEnvironmentEmulation()
    {
        $this->_model = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()
            ->create(\Magento\Store\Model\App\Emulation::class);
        \Magento\TestFramework\Helper\Bootstrap::getInstance()
            ->loadArea(\Magento\Backend\App\Area\FrontNameResolver::AREA_CODE);
        $design = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()
            ->get(\Magento\Framework\View\DesignInterface::class);

        $this->_model->startEnvironmentEmulation(1);
        $this->_model->stopEnvironmentEmulation();
        $this->assertEquals(\Magento\Backend\App\Area\FrontNameResolver::AREA_CODE, $design->getArea());
    }
}
