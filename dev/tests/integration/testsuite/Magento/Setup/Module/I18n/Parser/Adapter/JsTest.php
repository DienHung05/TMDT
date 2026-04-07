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
namespace Magento\Setup\Module\I18n\Parser\Adapter;

/**
 * @covers \Magento\Setup\Module\I18n\Parser\Adapter\Js
 *
 */
class JsTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var Js
     */
    protected $jsPhraseCollector;

    protected function setUp(): void
    {
        $objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();
        $this->jsPhraseCollector = $objectManager->create(
            \Magento\Setup\Module\I18n\Parser\Adapter\Js::class
        );
    }

    public function testParse()
    {
        $file = __DIR__ . '/_files/jsPhrasesForTest.js';
        $this->jsPhraseCollector->parse($file);
        $expectation = [
            [
                'phrase' => 'text double quote',
                'file' => $file,
                'line' => 1,
                'quote' => '"'
            ],
            [
                'phrase' => 'text single quote',
                'file' => $file,
<<<<<<< HEAD
                'line' => 1,
=======
                'line' => 2,
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                'quote' => '\''
            ],
            [
                'phrase' => 'text "some',
                'file' => $file,
<<<<<<< HEAD
                'line' => 1,
=======
                'line' => 3,
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                'quote' => '\''
            ]
        ];
        $this->assertEquals($expectation, $this->jsPhraseCollector->getPhrases());
    }
}
