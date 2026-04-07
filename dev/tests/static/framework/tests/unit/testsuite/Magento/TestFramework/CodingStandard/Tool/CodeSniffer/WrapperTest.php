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
namespace Magento\TestFramework\CodingStandard\Tool\CodeSniffer;

class WrapperTest extends \PHPUnit\Framework\TestCase
{
    public function testSetValues()
    {
        if (!class_exists('\PHP_CodeSniffer\Runner')) {
            $this->markTestSkipped('Code Sniffer is not installed');
        }
        $wrapper = new Wrapper();
        $expected = ['some_key' => 'some_value'];
        $wrapper->setSettings($expected);
    }
}
