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

namespace Magento\Setup\Test\Unit\Fixtures;

use Magento\Indexer\Console\Command\IndexerReindexCommand;
use Magento\Setup\Fixtures\FixtureModel;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Output\OutputInterface;

class FixtureModelTest extends TestCase
{
    /**
     * @var FixtureModel
     */
    private $model;

    protected function setUp(): void
    {
        $reindexCommandMock = $this->createMock(IndexerReindexCommand::class);
        $this->model = new FixtureModel($reindexCommandMock);
    }

    public function testReindex()
    {
<<<<<<< HEAD
        $outputMock = $this->createMock(OutputInterface::class);
=======
        $outputMock = $this->getMockForAbstractClass(OutputInterface::class);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $this->model->reindex($outputMock);
    }
}
