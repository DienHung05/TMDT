<?php
declare(strict_types=1);
/**
<<<<<<< HEAD
 * Copyright 2019 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

$objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();

/**
 * Create an admin user with expired and non-expired access date
 */

/** @var $userModelNotExpired \Magento\User\Model\User */
$userModelNotExpired = $objectManager->create(\Magento\User\Model\User::class);
$userModelNotExpired->setFirstName("John")
    ->setLastName("Doe")
    ->setUserName('adminUserNotExpired')
    ->setPassword(\Magento\TestFramework\Bootstrap::ADMIN_PASSWORD)
    ->setEmail('adminUserNotExpired@example.com')
    ->setRoleType('G')
    ->setResourceId('Magento_Adminhtml::all')
    ->setPrivileges("")
    ->setAssertId(0)
    ->setRoleId(1)
    ->setPermission('allow')
    ->setIsActive(1)
    ->save();
$futureDate = new \DateTime();
$futureDate->modify('+10 days');
$notExpiredRecord = $objectManager->create(\Magento\Security\Model\UserExpiration::class);
$notExpiredRecord
    ->setId($userModelNotExpired->getId())
    ->setExpiresAt($futureDate->format('Y-m-d H:i:s'))
    ->save();

/** @var $userModelExpired \Magento\User\Model\User */
$pastDate = new \DateTime();
$pastDate->modify('-10 days');
$userModelExpired = $objectManager->create(\Magento\User\Model\User::class);
$userModelExpired->setFirstName("John")
    ->setLastName("Doe")
    ->setUserName('adminUserExpired')
    ->setPassword(\Magento\TestFramework\Bootstrap::ADMIN_PASSWORD)
    ->setEmail('adminUserExpired@example.com')
    ->setRoleType('G')
    ->setResourceId('Magento_Adminhtml::all')
    ->setPrivileges("")
    ->setAssertId(0)
    ->setRoleId(1)
    ->setPermission('allow')
    ->setIsActive(1)
    ->save();
$expiredRecord = $objectManager->create(\Magento\Security\Model\UserExpiration::class);
$expiredRecord
    ->setId($userModelExpired->getId())
    ->setExpiresAt($pastDate->format('Y-m-d H:i:s'))
    ->save();
