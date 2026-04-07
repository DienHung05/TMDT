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

use Magento\Setup\Model\Description\Mixin\HeaderMixin;
use PHPUnit\Framework\TestCase;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

class HeaderMixinTest extends TestCase
{
    /**
     * @var HeaderMixin
     */
    private $mixin;

    protected function setUp(): void
    {
        $this->mixin = new HeaderMixin();
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
            ['', ''],
            [
                'Lorem ipsum dolor sit amet.' . PHP_EOL
                . 'Consectetur adipiscing elit.' . PHP_EOL
                . 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',

                '<h1>Lorem ipsum</h1>' . PHP_EOL
                . 'Lorem ipsum dolor sit amet.' . PHP_EOL
                . '<h1>Consectetur</h1>' . PHP_EOL
                . 'Consectetur adipiscing elit.' . PHP_EOL
                . '<h1>Sed do eiusmod</h1>' . PHP_EOL
                . 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
            ]
        ];
    }
}
