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

namespace Magento\Backend\Model\Auth;

use Magento\TestFramework\Bootstrap as TestHelper;
use Magento\TestFramework\Helper\Bootstrap;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * @magentoAppArea adminhtml
 * @magentoAppIsolation enabled
 * @magentoDbIsolation enabled
 */
class SessionTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Magento\Backend\Model\Auth
     */
    private $auth;

    /**
     * @var \Magento\Backend\Model\Auth\Session
     */
    private $authSession;

    /**
     * @var \Magento\Framework\ObjectManagerInterface
     */
    private $objectManager;

    protected function setUp(): void
    {
        parent::setUp();
        $this->objectManager = Bootstrap::getObjectManager();
        $this->objectManager->get(\Magento\Framework\Config\ScopeInterface::class)
            ->setCurrentScope(\Magento\Backend\App\Area\FrontNameResolver::AREA_CODE);
        $this->auth = $this->objectManager->create(\Magento\Backend\Model\Auth::class);
        $this->authSession = $this->objectManager->create(\Magento\Backend\Model\Auth\Session::class);
        $this->authSession->setUser($this->objectManager->create(\Magento\User\Model\User::class));
        $this->auth->setAuthStorage($this->authSession);
        $this->auth->logout();
    }

    protected function tearDown(): void
    {
        $this->auth = null;
        $this->objectManager->get(\Magento\Framework\Config\ScopeInterface::class)->setCurrentScope(null);
    }

    /**
<<<<<<< HEAD
     */
    #[DataProvider('loginDataProvider')]
=======
     * @dataProvider loginDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testIsLoggedIn($loggedIn)
    {
        if ($loggedIn) {
            $this->auth->login(
                TestHelper::ADMIN_NAME,
                TestHelper::ADMIN_PASSWORD
            );
        }
        $this->assertEquals($loggedIn, $this->authSession->isLoggedIn());
    }

<<<<<<< HEAD
    public static function loginDataProvider()
=======
    public function loginDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [[false], [true]];
    }
}
