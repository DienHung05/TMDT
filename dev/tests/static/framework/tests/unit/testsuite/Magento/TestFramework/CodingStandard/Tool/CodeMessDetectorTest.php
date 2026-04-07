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
namespace Magento\TestFramework\CodingStandard\Tool;

class CodeMessDetectorTest extends \PHPUnit\Framework\TestCase
{
    public function testCanRun()
    {
        $messDetector = new \Magento\TestFramework\CodingStandard\Tool\CodeMessDetector(
            'some/ruleset/file.xml',
            'some/report/file.xml'
        );

        $this->assertEquals(
            class_exists(\PHPMD\TextUI\Command::class),
            $messDetector->canRun()
        );
    }
}
