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
namespace Magento\Backend\Controller\Adminhtml\System;

use Magento\TestFramework\Bootstrap;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * @magentoAppArea adminhtml
 */
class AccountTest extends \Magento\TestFramework\TestCase\AbstractBackendController
{
    /**
<<<<<<< HEAD
     * @magentoDbIsolation enabled
     */
    #[DataProvider('saveDataProvider')]
=======
     * @dataProvider saveDataProvider
     * @magentoDbIsolation enabled
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testSaveAction($password, $passwordConfirmation, $isPasswordChanged)
    {
        $userId = $this->_session->getUser()->getId();
        /** @var $user \Magento\User\Model\User */
        $user = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
            \Magento\User\Model\User::class
        )->load(
            $userId
        );
        $oldPassword = $user->getPassword();

        $request = $this->getRequest();
        $request->setParam(
            'username',
            $user->getUsername()
        )->setParam(
            'email',
            $user->getEmail()
        )->setParam(
            'firstname',
            $user->getFirstname()
        )->setParam(
            'lastname',
            $user->getLastname()
        )->setParam(
            'password',
            $password
        )->setParam(
            'password_confirmation',
            $passwordConfirmation
        )->setParam(
            \Magento\Backend\Block\System\Account\Edit\Form::IDENTITY_VERIFICATION_PASSWORD_FIELD,
            Bootstrap::ADMIN_PASSWORD
        );
        $this->dispatch('backend/admin/system_account/save');

        /** @var $user \Magento\User\Model\User */
        $user = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
            \Magento\User\Model\User::class
        )->load(
            $userId
        );

        if ($isPasswordChanged) {
            $this->assertNotEquals($oldPassword, $user->getPassword());
            $objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();
            /** @var $encryptor \Magento\Framework\Encryption\EncryptorInterface */
            $encryptor = $objectManager->get(\Magento\Framework\Encryption\EncryptorInterface::class);
            $this->assertTrue($encryptor->validateHash($password, $user->getPassword()));
        } else {
            $this->assertEquals($oldPassword, $user->getPassword());
        }
    }

<<<<<<< HEAD
    public static function saveDataProvider()
=======
    public function saveDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        $password = uniqid('123q');
        return [
            [$password, $password, true],
            [$password, '', false],
            [$password, $password . '123', false],
            ['', '', false],
            ['', $password, false]
        ];
    }
}
