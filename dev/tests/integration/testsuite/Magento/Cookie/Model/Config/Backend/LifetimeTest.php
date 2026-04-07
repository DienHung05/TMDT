<?php
/**
 * Integration test for Magento\Cookie\Model\Config\Backend\Lifetime
 *
<<<<<<< HEAD
 * Copyright 2015 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
namespace Magento\Cookie\Model\Config\Backend;

class LifetimeTest extends \PHPUnit\Framework\TestCase
{
    /**
     * Method is not publicly accessible, so it must be called through parent
     *
     */
    public function testBeforeSaveException()
    {
        $this->expectException(\Magento\Framework\Exception\LocalizedException::class);
        $this->expectExceptionMessage('Invalid cookie lifetime: must be numeric');

        $invalidCookieLifetime = 'invalid lifetime';
        $objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();
        /** @var \Magento\Cookie\Model\Config\Backend\Lifetime $model */
        $model = $objectManager->create(\Magento\Cookie\Model\Config\Backend\Lifetime::class);
        $model->setValue($invalidCookieLifetime);
        $model->save();
    }
}
