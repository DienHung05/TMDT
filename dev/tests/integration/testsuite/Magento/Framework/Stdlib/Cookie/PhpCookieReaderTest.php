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

namespace Magento\Framework\Stdlib\Cookie;

class PhpCookieReaderTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var array
     */
    protected $preTestCookies;

    /**
     * @var PhpCookieReader
     */
    protected $model;

    const NAME = 'cookie-name';
    const VALUE = 'cookie-val';
    const DEFAULT_VAL = 'default-val';

    protected function setUp(): void
    {
        $this->preTestCookies = $_COOKIE;
        $_COOKIE = [];
        $_COOKIE[self::NAME] = self::VALUE;
        $this->model = new PhpCookieReader();
    }

    public function testGetCookieExists()
    {
        $this->assertSame(self::VALUE, $this->model->getCookie(self::NAME, self::DEFAULT_VAL));
    }

    public function testGetCookieDefault()
    {
        $this->assertSame(self::DEFAULT_VAL, $this->model->getCookie('cookies does not exist', self::DEFAULT_VAL));
        $this->assertSame(self::DEFAULT_VAL, $this->model->getCookie(null, self::DEFAULT_VAL));
    }

    public function testGetCookieNoDefault()
    {
        $this->assertNull($this->model->getCookie('cookies does not exist'));
        $this->assertNull($this->model->getCookie(null));
    }

    protected function tearDown(): void
    {
        $_COOKIE = $this->preTestCookies;
    }
}
