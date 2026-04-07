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

<<<<<<< HEAD
use Magento\Framework\TestFramework\Unit\Helper\ObjectManager;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
use Magento\Setup\Module\Di\Code\Scanner\XmlScanner;
use Magento\Setup\Module\Di\Compiler\Log\Log;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
<<<<<<< HEAD
use Psr\Log\LoggerInterface;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

class XmlScannerTest extends TestCase
{
    /**
     * @var XmlScanner
     */
<<<<<<< HEAD
    private XmlScanner $model;
=======
    protected $_model;
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

    /**
     * @var MockObject
     */
<<<<<<< HEAD
    private Log $logMock;
=======
    protected $_logMock;
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

    /**
     * @var array
     */
<<<<<<< HEAD
    private array $testFiles = [];
=======
    protected $_testFiles = [];
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

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
        $this->logMock = $this->createMock(Log::class);
        $this->model = new XmlScanner($this->logMock);
        $testDir = __DIR__ . '/../../' . '/_files';
        $this->testFiles = [
=======
        $this->_model = new XmlScanner(
            $this->_logMock = $this->createMock(Log::class)
        );
        $testDir = __DIR__ . '/../../' . '/_files';
        $this->_testFiles = [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            $testDir . '/app/code/Magento/SomeModule/etc/adminhtml/system.xml',
            $testDir . '/app/code/Magento/SomeModule/etc/di.xml',
            $testDir . '/app/code/Magento/SomeModule/view/frontend/default.xml',
        ];
<<<<<<< HEAD

        require_once __DIR__ . '/../../_files/app/code/Magento/SomeModule/Element.php';
        require_once __DIR__ . '/../../_files/app/code/Magento/SomeModule/NestedElement.php';
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }

    /**
     * @return void
<<<<<<< HEAD
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     */
    public function testCollectEntities(): void
    {
        $className = 'Magento\Store\Model\Config\Invalidator\Proxy';
<<<<<<< HEAD
        $this->logMock
            ->method('add')
            ->willReturnCallback(function ($arg1, $arg2, $arg3) use ($className) {
                if ($arg1 == 4 && $arg2 == $className && $arg3 == 'Invalid proxy class for ' .
                    substr($className, 0, -5)) {
                    return null;
                } elseif ($arg1 == 4 && $arg2 == 'Magento\SomeModule\Model\Element\Proxy') {
                    return null;
                } elseif ($arg1 == 4 && $arg2 == 'Magento\SomeModule\Model\Element2\Proxy') {
                    return null;
                } elseif ($arg1 == 4 && $arg2 == 'Magento\SomeModule\Model\Nested\Element\Proxy') {
                    return null;
                } elseif ($arg1 == 4 && $arg2 == 'Magento\SomeModule\Model\Nested\Element2\Proxy') {
                    return null;
                }
            });

        $actual = $this->model->collectEntities($this->testFiles);
        $expected = [];

=======
        $this->_logMock
            ->method('add')
            ->withConsecutive(
                [
                    4,
                    $className,
                    'Invalid proxy class for ' . substr($className, 0, -5)
                ],
                [
                    4,
                    '\Magento\SomeModule\Model\Element\Proxy',
                    'Invalid proxy class for ' . substr('\Magento\SomeModule\Model\Element\Proxy', 0, -5)
                ],
                [
                    4,
                    '\Magento\SomeModule\Model\Nested\Element\Proxy',
                    'Invalid proxy class for ' . substr('\Magento\SomeModule\Model\Nested\Element\Proxy', 0, -5)
                ]
            );
        $actual = $this->_model->collectEntities($this->_testFiles);
        $expected = [];
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $this->assertEquals($expected, $actual);
    }
}
