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
namespace Magento\Captcha\Observer;

/**
 * Test captcha observer behavior
 *
 * @magentoAppArea adminhtml
 */
class CaseCheckUnsuccessfulMessageWhenCaptchaFailedTest extends \Magento\TestFramework\TestCase\AbstractController
{
    /**
     * @magentoDbIsolation enabled
     * @magentoAppIsolation enabled
     * @magentoAdminConfigFixture admin/captcha/enable 1
     * @magentoAdminConfigFixture admin/captcha/forms backend_forgotpassword
     * @magentoAdminConfigFixture admin/captcha/mode always
     */
    public function testCheckUnsuccessfulMessageWhenCaptchaFailed()
    {
        \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->get(
            \Magento\Backend\Model\UrlInterface::class
        )->turnOffSecretKey();
        $this->getRequest()->setPostValue(['email' => 'dummy@dummy.com', 'captcha' => '1234']);
        $this->dispatch('backend/admin/auth/forgotpassword');
        $this->assertSessionMessages(
            $this->equalTo(['Incorrect CAPTCHA']),
            \Magento\Framework\Message\MessageInterface::TYPE_ERROR
        );
    }
}
