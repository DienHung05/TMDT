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
namespace Magento\Store\Model;

use Magento\TestFramework\Helper\Bootstrap;

class StoreCookieManagerTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Magento\Store\Model\StoreCookieManager
     */
    protected $storeCookieManager;

    /**
     * @var array
     */
    protected $existingCookies;

    protected function setUp(): void
    {
        $this->storeCookieManager = Bootstrap::getObjectManager()->create(
            \Magento\Store\Model\StoreCookieManager::class
        );
        $this->existingCookies = $_COOKIE;
    }

    protected function tearDown(): void
    {
        $_COOKIE = $this->existingCookies;
    }

    public function testSetCookie()
    {
        $storeCode = 'store code';
        $store = $this->createPartialMock(\Magento\Store\Model\Store::class, ['getStorePath', 'getCode']);
        $store->expects($this->once())->method('getStorePath')->willReturn('/');
        $store->expects($this->once())->method('getCode')->willReturn($storeCode);

        $this->assertArrayNotHasKey(StoreCookieManager::COOKIE_NAME, $_COOKIE);
        $this->storeCookieManager->setStoreCookie($store);
        $this->assertArrayHasKey(StoreCookieManager::COOKIE_NAME, $_COOKIE);
        $this->assertEquals($storeCode, $_COOKIE[StoreCookieManager::COOKIE_NAME]);
    }
}
