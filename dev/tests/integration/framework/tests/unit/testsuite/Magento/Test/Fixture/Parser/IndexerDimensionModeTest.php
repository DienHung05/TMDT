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

use Magento\TestFramework\Fixture\IndexerDimensionMode;
use Magento\TestFramework\Fixture\ParserInterface;
use PHPUnit\Framework\TestCase;

#[
    IndexerDimensionMode('class_indexer', 'IndexerDimensionModeTest')
]
class IndexerDimensionModeTest extends TestCase
{
    #[
        IndexerDimensionMode('method_indexer', 'testScopeMethod')
    ]
    public function testScopeMethod(): void
    {
        $model = new \Magento\TestFramework\Fixture\Parser\IndexerDimensionMode();
        $this->assertEquals(
            [['indexer' => 'method_indexer', 'dimension' => 'testScopeMethod']],
            $model->parse($this, ParserInterface::SCOPE_METHOD)
        );
    }

    #[
        IndexerDimensionMode('method_indexer', 'testScopeClass')
    ]
    public function testScopeClass(): void
    {
        $model = new \Magento\TestFramework\Fixture\Parser\IndexerDimensionMode();
        $this->assertEquals(
            [['indexer' => 'class_indexer', 'dimension' => 'IndexerDimensionModeTest']],
            $model->parse($this, ParserInterface::SCOPE_CLASS)
        );
    }
}
