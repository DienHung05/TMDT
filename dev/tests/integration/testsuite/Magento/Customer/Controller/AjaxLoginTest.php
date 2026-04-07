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

namespace Magento\Customer\Controller;

use Magento\TestFramework\Helper\Bootstrap;

class AjaxLoginTest extends \Magento\TestFramework\TestCase\AbstractController
{
    /**
     * Login the user
     *
     * @param string $customerId Customer to mark as logged in for the session
     * @return void
     */
    protected function login($customerId)
    {
        /** @var \Magento\Customer\Model\Session $session */
        $session = Bootstrap::getObjectManager()
            ->get(\Magento\Customer\Model\Session::class);
        $session->loginById($customerId);
    }

    /**
     * @magentoDataFixture Magento/Customer/_files/customer.php
     */
    public function testLogoutAction()
    {
        $this->login(1);
        $this->dispatch('customer/ajax/logout');
        $body = $this->getResponse()->getBody();
        $logoutMessage = Bootstrap::getObjectManager()->get(
            \Magento\Framework\Json\Helper\Data::class
        )->jsonDecode($body);
        $this->assertStringContainsString('Logout Successful', $logoutMessage['message']);
    }
}
