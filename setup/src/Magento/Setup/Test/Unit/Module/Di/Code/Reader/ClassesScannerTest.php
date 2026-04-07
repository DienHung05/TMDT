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
declare(strict_types=1);

namespace Magento\Setup\Test\Unit\Module\Di\Code\Reader;

use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Setup\Module\Di\Code\Reader\ClassesScanner;
use PHPUnit\Framework\TestCase;

class ClassesScannerTest extends TestCase
{
    /**
     * @var ClassesScanner
     */
    private $model;

    /**
     * the /var/generation directory realpath
     *
     * @var string
     */

    private $generation;

    protected function setUp(): void
    {
        $this->generation = realpath(__DIR__ . '/../../_files/var/generation');
        $mock = $this->getMockBuilder(DirectoryList::class)
            ->disableOriginalConstructor()
<<<<<<< HEAD
            ->onlyMethods(
=======
            ->setMethods(
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                ['getPath']
            )->getMock();
        $mock->method('getPath')->willReturn($this->generation);
        $this->model = new ClassesScanner([], $mock);
    }

    public function testGetList()
    {
        $pathToScan = str_replace('\\', '/', realpath(__DIR__ . '/../../') . '/_files/app/code/Magento/SomeModule');
        $actual = $this->model->getList($pathToScan);
        $this->assertIsArray($actual);
<<<<<<< HEAD
        $this->assertCount(7, $actual);
=======
        $this->assertCount(6, $actual);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }
}
