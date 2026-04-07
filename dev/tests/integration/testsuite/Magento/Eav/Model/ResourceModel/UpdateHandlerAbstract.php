<?php
/**
<<<<<<< HEAD
 * Copyright 2021 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

namespace Magento\Eav\Model\ResourceModel;

use Magento\CatalogSearch\Model\Indexer\Fulltext\Processor;
use Magento\TestFramework\Helper\Bootstrap;
use Magento\TestFramework\Indexer\TestCase;

/**
 * @magentoAppArea adminhtml
 * @magentoAppIsolation enabled
 */
class UpdateHandlerAbstract extends TestCase
{
    protected function reindexAll(): void
    {
        Bootstrap::getObjectManager()
            ->get(Processor::class)
            ->reindexAll();
    }

    /**
     * @inheritDoc
     */
    protected function tearDown(): void
    {
        parent::tearDown();
        $reflection = new \ReflectionObject($this);
        foreach ($reflection->getProperties() as $property) {
            if (!$property->isStatic() && 0 !== strpos($property->getDeclaringClass()->getName(), 'PHPUnit')) {
<<<<<<< HEAD
=======
                $property->setAccessible(true);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                $property->setValue($this, null);
            }
        }
    }
}
