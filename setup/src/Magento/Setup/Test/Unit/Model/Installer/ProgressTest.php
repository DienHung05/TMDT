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
declare(strict_types=1);

namespace Magento\Setup\Test\Unit\Model\Installer;

use Magento\Setup\Model\Installer\Progress;
use PHPUnit\Framework\TestCase;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

class ProgressTest extends TestCase
{
    /**
     * @param int $total
     * @param int $current
<<<<<<< HEAD
     */
    #[DataProvider('constructorExceptionInvalidTotalDataProvider')]
=======
     * @dataProvider constructorExceptionInvalidTotalDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testConstructorExceptionInvalidTotal($total, $current)
    {
        $this->expectException('LogicException');
        $this->expectExceptionMessage('Total number must be more than zero.');
        new Progress($total, $current);
    }

    /**
     * return array
     */
<<<<<<< HEAD
    public static function constructorExceptionInvalidTotalDataProvider()
=======
    public function constructorExceptionInvalidTotalDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [[0,0], [0, 1], [[], 1]];
    }

    public function testConstructorExceptionCurrentExceedsTotal()
    {
        $this->expectException('LogicException');
        $this->expectExceptionMessage('Current cannot exceed total number.');
        new Progress(1, 2);
    }

    public function testSetNext()
    {
        $progress = new Progress(10);
        $progress->setNext();
        $this->assertEquals(1, $progress->getCurrent());
    }

    public function testSetNextException()
    {
        $this->expectException('LogicException');
        $this->expectExceptionMessage('Current cannot exceed total number.');
        $progress = new Progress(10, 10);
        $progress->setNext();
    }

    public function testFinish()
    {
        $progress = new Progress(10);
        $progress->finish();
        $this->assertEquals(10, $progress->getCurrent());
    }

    public function testGetCurrent()
    {
        $progress = new Progress(10, 5);
        $this->assertEquals(5, $progress->getCurrent());
    }

    public function testGetTotal()
    {
        $progress = new Progress(10);
        $this->assertEquals(10, $progress->getTotal());
    }

    /**
     * @param int $total
     * @param int $current
<<<<<<< HEAD
     */
    #[DataProvider('ratioDataProvider')]
=======
     * @dataProvider ratioDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testRatio($total, $current)
    {
        $progress = new Progress($total, $current);
        $this->assertEquals($current / $total, $progress->getRatio());
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function ratioDataProvider()
=======
    public function ratioDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        $data = [];
        for ($i = 10; $i <= 20; $i++) {
            for ($j = 0; $j <= $i; $j++) {
                $data[] = [$i, $j];
            }
        }
        return $data;
    }
}
