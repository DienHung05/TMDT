<?php
/**
 * Integration test for Magento\Framework\Session\Config\Validator\CookieDomainValidator
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

class CookieDomainValidatorTest extends \PHPUnit\Framework\TestCase
{
    /** @var  \Magento\Framework\Session\Config\Validator\CookieDomainValidator   */
    private $model;

    protected function setUp(): void
    {
        $objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();
        $this->model = $objectManager->create(\Magento\Framework\Session\Config\Validator\CookieDomainValidator::class);
    }

    public function testEmptyString()
    {
        $this->assertTrue($this->model->isValid(''));
    }

    public function testInvalidHostname()
    {
        $this->assertFalse($this->model->isValid('http://'));
    }

    public function testNotString()
    {
        $this->assertFalse($this->model->isValid(1));
    }

    public function testNonemptyValid()
    {
        $this->assertTrue($this->model->isValid('domain.com'));
    }
}
