<?php
/**
<<<<<<< HEAD
 * Copyright 2017 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

namespace Magento\Setup\Test\Unit\Model\Description\Mixin\Helper;

use Magento\Setup\Model\Description\Mixin\Helper\WordWrapper;
use PHPUnit\Framework\TestCase;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

class WordWrapperTest extends TestCase
{
    /**
     * @var WordWrapper
     */
    private $wrapper;

    protected function setUp(): void
    {
        $this->wrapper = new WordWrapper();
    }

    /**
     * @param array $inputData
     * @param string $expectedResult
<<<<<<< HEAD
     */
    #[DataProvider('getTestData')]
=======
     * @dataProvider getTestData
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testWrapping($inputData, $expectedResult)
    {
        $this->assertEquals(
            $expectedResult,
            $this->wrapper->wrapWords($inputData['source'], $inputData['words'], $inputData['format'])
        );
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function getTestData()
=======
    public function getTestData()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            [
                [
                    'source' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                    'words' => [],
                    'format' => '',
                ],
                'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
            ],

            [
                [
                    'source' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                    'words' => ['Lorem'],
                    'format' => '<test>%s</test>',
                ],
                '<test>Lorem</test> ipsum dolor sit amet, consectetur adipiscing elit.'
            ],

            [
                [
                    'source' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                    'words' => ['Lorem', 'consectetur', 'elit'],
                    'format' => '<test>%s</test>',
                ],
                '<test>Lorem</test> ipsum dolor sit amet, <test>consectetur</test> adipiscing <test>elit</test>.'
            ],
        ];
    }
}
