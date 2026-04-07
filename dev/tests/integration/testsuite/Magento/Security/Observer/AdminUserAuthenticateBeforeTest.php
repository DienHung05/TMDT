<?php
/**
<<<<<<< HEAD
 * Copyright 2019 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

namespace Magento\Security\Observer;

use Magento\TestFramework\Helper\Bootstrap;

/**
 * Test for \Magento\Security\Observer\AdminUserAuthenticateBefore
 */
class AdminUserAuthenticateBeforeTest extends \PHPUnit\Framework\TestCase
{

    /**
     * @magentoDataFixture Magento/Security/_files/expired_users.php
     */
    public function testWithExpiredUser()
    {
        $this->expectException(\Magento\Framework\Exception\Plugin\AuthenticationException::class);
        $this->expectExceptionMessage('The account sign-in was incorrect or your account is disabled temporarily. Please wait and try again later');

        $adminUserNameFromFixture = 'adminUserExpired';
        $password = \Magento\TestFramework\Bootstrap::ADMIN_PASSWORD;
        /** @var \Magento\User\Model\User $user */
        $user = Bootstrap::getObjectManager()->create(\Magento\User\Model\User::class);
        $user->authenticate($adminUserNameFromFixture, $password);
        static::assertFalse((bool)$user->getIsActive());
    }

    /**
     * @magentoDataFixture Magento/Security/_files/expired_users.php
     */
    public function testWithNonExpiredUser()
    {
        $adminUserNameFromFixture = 'adminUserNotExpired';
        $password = \Magento\TestFramework\Bootstrap::ADMIN_PASSWORD;
        /** @var \Magento\User\Model\User $user */
        $user = Bootstrap::getObjectManager()->create(\Magento\User\Model\User::class);
        $user->authenticate($adminUserNameFromFixture, $password);
        static::assertTrue((bool)$user->getIsActive());
    }
}
