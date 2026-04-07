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

namespace Magento\Setup\Test\Unit\Module\I18n\Parser\Adapter;

<<<<<<< HEAD
use Magento\Framework\Filesystem\Driver\File;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
use Magento\Framework\TestFramework\Unit\Helper\ObjectManager;
use Magento\Setup\Module\I18n\Dictionary\Phrase;
use Magento\Setup\Module\I18n\Parser\Adapter\Js;
use PHPUnit\Framework\TestCase;

class JsTest extends TestCase
{
    /**
     * @var string
     */
    protected $_testFile;

    /**
     * @var int
     */
    protected $_stringsCount;

    /**
     * @var Js
     */
    protected $_adapter;

    protected function setUp(): void
    {
        $this->_testFile = str_replace('\\', '/', realpath(dirname(__FILE__))) . '/_files/file.js';
        $this->_stringsCount = count(file($this->_testFile));
<<<<<<< HEAD
        $filesystem = new File();
        $this->_adapter = (new ObjectManager($this))->getObject(Js::class, ['filesystem' => $filesystem]);
=======

        $this->_adapter = (new ObjectManager($this))->getObject(Js::class);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }

    public function testParse()
    {
        $expectedResult = [
            [
                'phrase' => 'Phrase 1',
                'file' => $this->_testFile,
<<<<<<< HEAD
                'line' => 1,
=======
                'line' => $this->_stringsCount - 4,
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                'quote' => Phrase::QUOTE_SINGLE,
            ],
            [
                'phrase' => 'Phrase 2 %1',
                'file' => $this->_testFile,
<<<<<<< HEAD
                'line' => 1,
=======
                'line' => $this->_stringsCount - 3,
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                'quote' => Phrase::QUOTE_DOUBLE
            ],
            [
                'phrase' => 'Field ',
                'file' => $this->_testFile,
<<<<<<< HEAD
                'line' => 1,
=======
                'line' => $this->_stringsCount - 2,
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                'quote' => Phrase::QUOTE_SINGLE
            ],
            [
                'phrase' => ' is required.',
                'file' => $this->_testFile,
<<<<<<< HEAD
                'line' => 1,
=======
                'line' => $this->_stringsCount - 2,
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                'quote' => Phrase::QUOTE_SINGLE
            ],
            [
                'phrase' => 'Welcome, %1!',
                'file' => $this->_testFile,
<<<<<<< HEAD
                'line' => 1,
=======
                'line' => $this->_stringsCount - 1,
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                'quote' => Phrase::QUOTE_SINGLE
            ]
        ];

        $this->_adapter->parse($this->_testFile);

        $this->assertEquals($expectedResult, $this->_adapter->getPhrases());
    }
}
