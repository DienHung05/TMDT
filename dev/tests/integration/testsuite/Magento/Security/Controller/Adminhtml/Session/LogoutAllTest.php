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

namespace Magento\Security\Controller\Adminhtml\Session;

class LogoutAllTest extends \Magento\TestFramework\TestCase\AbstractBackendController
{
    /**
     * Set up
     */
    protected function setUp(): void
    {
        $this->uri = 'backend/security/session/logoutAll';
        parent::setUp();
    }

    /**
     * logoutAllAction test
     */
    public function testLogoutAllAction()
    {
        $this->dispatch('backend/security/session/logoutAll');
        $this->assertSessionMessages(
            $this->equalTo(['All other open sessions for this account were terminated.']),
            \Magento\Framework\Message\MessageInterface::TYPE_SUCCESS
        );
        $this->assertRedirect($this->stringContains('security/session/activity'));
    }
}
