<?php
/**
<<<<<<< HEAD
 * Copyright 2016 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
namespace Magento\TestFramework\Utility;

class FunctionDetectorTest extends \PHPUnit\Framework\TestCase
{
    public function testDetectFunctions()
    {
        $fixturePath = __DIR__ . '/_files/test.txt';
        $expectedResults = [
            1 => ['strtoupper', 'strtolower'],
            3 => ['foo'],
            4 => ['foo'],
        ];
        $functionDetector = new FunctionDetector();
        $lines = $functionDetector->detect($fixturePath, ['foo', 'strtoupper', 'test', 'strtolower']);
        $this->assertEquals($expectedResults, $lines);
    }
}
