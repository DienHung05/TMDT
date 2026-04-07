<?php
/**
<<<<<<< HEAD
 * Copyright 2013 Adobe.
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

namespace Magento\Setup\Test\Unit\Module\Di\Code\Scanner;

use Magento\Framework\Reflection\TypeProcessor;

<<<<<<< HEAD
require_once __DIR__ . '/../../_files/app/code/Magento/SomeModule/Helper/TestHelper.php';
=======
require_once __DIR__ . '/../../_files/app/code/Magento/SomeModule/Helper/Test.php';
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
require_once __DIR__ . '/../../_files/app/code/Magento/SomeModule/ElementFactory.php';
require_once __DIR__ . '/../../_files/app/code/Magento/SomeModule/Model/DoubleColon.php';
require_once __DIR__ . '/../../_files/app/code/Magento/SomeModule/Api/Data/SomeInterface.php';
require_once __DIR__ . '/../../_files/app/code/Magento/SomeModule/Model/StubWithAnonymousClass.php';

<<<<<<< HEAD
use Magento\Framework\TestFramework\Unit\Helper\ObjectManager;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
use Magento\Setup\Module\Di\Code\Scanner\PhpScanner;
use Magento\Setup\Module\Di\Compiler\Log\Log;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
<<<<<<< HEAD
use Psr\Log\LoggerInterface;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

class PhpScannerTest extends TestCase
{
    /**
     * @var PhpScanner
     */
    private $scanner;

    /**
     * @var string
     */
    private $testDir;

    /**
     * @var Log|MockObject
     */
    private $log;

    /**
     * @inheritdoc
     */
    protected function setUp(): void
    {
<<<<<<< HEAD
        $objectManagerHelper = new ObjectManager($this);
        $objects = [
            [
                LoggerInterface::class,
                $this->createMock(LoggerInterface::class)
            ],
        ];
        $objectManagerHelper->prepareObjectManager($objects);
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $this->log = $this->createMock(Log::class);
        $this->scanner = new PhpScanner($this->log, new TypeProcessor());
        $this->testDir = str_replace('\\', '/', realpath(__DIR__ . '/../../') . '/_files');
    }

    /**
     * @return void
     */
    public function testCollectEntities(): void
    {
        $testFiles = [
<<<<<<< HEAD
            $this->testDir . '/app/code/Magento/SomeModule/Helper/TestHelper.php',
=======
            $this->testDir . '/app/code/Magento/SomeModule/Helper/Test.php',
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            $this->testDir . '/app/code/Magento/SomeModule/Model/DoubleColon.php',
            $this->testDir . '/app/code/Magento/SomeModule/Api/Data/SomeInterface.php',
            $this->testDir . '/app/code/Magento/SomeModule/Model/StubWithAnonymousClass.php'
        ];

        $this->log
            ->method('add')
<<<<<<< HEAD
            ->willReturnCallback(function ($arg1, $arg2, $arg3) use ($testFiles) {
                if ($arg1 == 4 && $arg2 == 'Magento\SomeModule\Module\Factory'
                    && $arg3 == 'Invalid Factory for nonexistent class Magento\SomeModule\Module in file '
                    . $testFiles[0]
                ) {
                    return null;
                } elseif ($arg1 == 4 && $arg2 == 'Magento\SomeModule\Element\Factory'
                    && $arg3 == 'Invalid Factory declaration for class Magento\SomeModule\Element in file '
                    . $testFiles[0]
                ) {
                    return null;
                }
            });
=======
            ->withConsecutive(
                [
                    4,
                    'Magento\SomeModule\Module\Factory',
                    'Invalid Factory for nonexistent class Magento\SomeModule\Module in file ' . $testFiles[0]
                ],
                [
                    4,
                    'Magento\SomeModule\Element\Factory',
                    'Invalid Factory declaration for class Magento\SomeModule\Element in file ' . $testFiles[0]
                ]
            );
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

        $result = $this->scanner->collectEntities($testFiles);

        self::assertEquals(
            ['\\' . \Magento\Eav\Api\Data\AttributeExtensionInterface::class],
            $result
        );
    }
}
