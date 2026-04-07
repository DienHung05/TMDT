<?php
/**
 * Integration test for  Magento\Framework\Session\Config\Validator\CookieLifetimeValidator
 *
<<<<<<< HEAD
 * Copyright 2014 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
namespace Magento\Framework\Session\Config\Validator;

class CookieLifetimeValidatorTest extends \PHPUnit\Framework\TestCase
{
    /** @var  \Magento\Framework\Session\Config\Validator\CookieLifetimeValidator   */
    private $model;

    protected function setUp(): void
    {
        $objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();
        $this->model = $objectManager->create(
            \Magento\Framework\Session\Config\Validator\CookieLifetimeValidator::class
        );
    }

    public function testNonNumeric()
    {
        $this->assertFalse($this->model->isValid('non-numeric value'));
    }

    public function testNegative()
    {
        $this->assertFalse($this->model->isValid(-1));
    }

    public function testPositive()
    {
        $this->assertTrue($this->model->isValid(1));
    }

    public function testZero()
    {
        $this->assertTrue($this->model->isValid(0));
    }
}
