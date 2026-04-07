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

namespace Magento\Setup\Test\Unit\Model\Description\Mixin;

use Magento\Setup\Model\Description\Mixin\ParagraphMixin;
use PHPUnit\Framework\TestCase;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

class ParagraphMixinTest extends TestCase
{
    /**
     * @var ParagraphMixin
     */
    private $mixin;

    protected function setUp(): void
    {
        $this->mixin = new ParagraphMixin();
    }

    /**
<<<<<<< HEAD
     */
    #[DataProvider('getTestData')]
=======
     * @dataProvider getTestData
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testApply($subject, $expectedResult)
    {
        $this->assertEquals($expectedResult, $this->mixin->apply($subject));
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
            ['', '<p></p>'],
            [
                'Lorem ipsum dolor sit amet.' . PHP_EOL
                . 'Consectetur adipiscing elit.' . PHP_EOL
                . 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',

                '<p>Lorem ipsum dolor sit amet.</p>' . PHP_EOL
                . '<p>Consectetur adipiscing elit.</p>' . PHP_EOL
                . '<p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>'
            ]
        ];
    }
}
