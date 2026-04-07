<?php
/**
<<<<<<< HEAD
 * Copyright 2022 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

namespace Magento\Test\Fixture\Parser;

use Magento\TestFramework\Fixture\DataFixture;
use Magento\TestFramework\Fixture\ParserInterface;
use PHPUnit\Framework\TestCase;

#[
    DataFixture('\Test\Fixture\Test', ['param1' => 'value1'])
]
class DataFixtureTest extends TestCase
{
    #[
        DataFixture('\Test\Fixture\Test1', ['method' => 'testScopeMethod'], 'f1'),
        DataFixture('\Test\Fixture\Test2', as: 'f2'),
        DataFixture('\Test\Fixture\Test3')
    ]
    public function testScopeMethod(): void
    {
        $model = new \Magento\TestFramework\Fixture\Parser\DataFixture();
        $this->assertEquals(
            [
                [
                    'name' => 'f1',
                    'factory' => '\Test\Fixture\Test1',
<<<<<<< HEAD
                    'data' => ['method' => 'testScopeMethod'],
                    'scope' => null
=======
                    'data' => ['method' => 'testScopeMethod']
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                ],
                [
                    'name' => 'f2',
                    'factory' => '\Test\Fixture\Test2',
<<<<<<< HEAD
                    'data' => [],
                    'scope' => null
=======
                    'data' => []
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                ],
                [
                    'name' => null,
                    'factory' => '\Test\Fixture\Test3',
<<<<<<< HEAD
                    'data' => [],
                    'scope' => null
=======
                    'data' => []
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                ]
            ],
            $model->parse($this, ParserInterface::SCOPE_METHOD)
        );
    }

    #[
        DataFixture('\Test\Fixture\Test1', ['method' => 'testScopeClass'])
    ]
    public function testScopeClass(): void
    {
        $model = new \Magento\TestFramework\Fixture\Parser\DataFixture();
        $this->assertEquals(
            [
                [
                    'name' => null,
                    'factory' => '\Test\Fixture\Test',
<<<<<<< HEAD
                    'data' => ['param1' => 'value1'],
                    'scope' => null
=======
                    'data' => ['param1' => 'value1']
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                ]
            ],
            $model->parse($this, ParserInterface::SCOPE_CLASS)
        );
    }
}
