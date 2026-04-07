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
namespace Magento\Backend\Model;

/**
 * Test class for \Magento\Backend\Model\Session.
 *
 * @magentoAppArea adminhtml
 */
class SessionTest extends \PHPUnit\Framework\TestCase
{
    public function testContructor()
    {
        if (array_key_exists('adminhtml', $_SESSION)) {
            unset($_SESSION['adminhtml']);
        }
        $logger = $this->createMock(\Psr\Log\LoggerInterface::class);
        \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
            \Magento\Backend\Model\Session::class,
            [$logger]
        );
        $this->assertArrayHasKey('adminhtml', $_SESSION);
    }
}
