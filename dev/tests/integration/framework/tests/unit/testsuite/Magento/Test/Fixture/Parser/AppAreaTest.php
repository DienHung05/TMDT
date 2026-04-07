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

use Magento\TestFramework\Fixture\AppArea;
use Magento\TestFramework\Fixture\ParserInterface;
use PHPUnit\Framework\TestCase;

#[
    AppArea('adminhtml')
]
class AppAreaTest extends TestCase
{
    #[
        AppArea('frontend')
    ]
    public function testScopeMethod(): void
    {
        $model = new \Magento\TestFramework\Fixture\Parser\AppArea();
        $this->assertEquals(
            [['area' => 'frontend']],
            $model->parse($this, ParserInterface::SCOPE_METHOD)
        );
    }

    #[
        AppArea('webapi_rest')
    ]
    public function testScopeClass(): void
    {
        $model = new \Magento\TestFramework\Fixture\Parser\AppArea();
        $this->assertEquals(
            [['area' => 'adminhtml']],
            $model->parse($this, ParserInterface::SCOPE_CLASS)
        );
    }
}
