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

namespace Magento\Setup\Test\Unit\Module\Di\Code\Scanner;

use Magento\Setup\Module\Di\Code\Scanner\ArrayScanner;
use PHPUnit\Framework\TestCase;

class ArrayScannerTest extends TestCase
{
    /**
     * @var ArrayScanner
     */
    protected $_model;

    /**
     * @var string
     */
    protected $_testDir;

    protected function setUp(): void
    {
        $this->_model = new ArrayScanner();
        $this->_testDir = str_replace('\\', '/', realpath(__DIR__ . '/../../') . '/_files');
    }

    public function testCollectEntities()
    {
        $actual = $this->_model->collectEntities([$this->_testDir . '/additional.php']);
        $expected = ['Some_Model_Proxy', 'Some_Model_EntityFactory'];
        $this->assertEquals($expected, $actual);
    }
}
