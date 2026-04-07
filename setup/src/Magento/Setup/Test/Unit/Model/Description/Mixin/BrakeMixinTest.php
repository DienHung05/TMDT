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

use Magento\Setup\Model\Description\Mixin\BrakeMixin;
use PHPUnit\Framework\TestCase;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

class BrakeMixinTest extends TestCase
{
    /**
     * @var BrakeMixin
     */
    private $mixin;

    protected function setUp(): void
    {
        $this->mixin = new BrakeMixin();
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

                'Lorem ipsum dolor sit amet.' . PHP_EOL
                . '</br>' . PHP_EOL
                . 'Consectetur adipiscing elit.' . PHP_EOL
                . '</br>' . PHP_EOL
                . 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
            ]
        ];
    }
}
