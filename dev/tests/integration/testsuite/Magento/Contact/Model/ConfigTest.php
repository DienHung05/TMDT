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

namespace Magento\Contact\Model;

use Magento\TestFramework\Helper\Bootstrap;

class ConfigTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var ConfigInterface
     */
    private $configModel;

    protected function setUp(): void
    {
        $this->configModel = Bootstrap::getObjectManager()->create(\Magento\Contact\Model\ConfigInterface::class);
    }

    /**
     * @magentoAppArea frontend
     * @magentoAppIsolation enabled
     * @magentoConfigFixture current_store contact/contact/enabled 1
     */
    public function testIsEnabled()
    {
        $this->assertTrue($this->configModel->isEnabled());
    }

    /**
     * @magentoAppArea frontend
     * @magentoAppIsolation enabled
     * @magentoConfigFixture current_store contact/contact/enabled 0
     */
    public function testIsNotEnabled()
    {
        $this->assertFalse($this->configModel->isEnabled());
    }
}
