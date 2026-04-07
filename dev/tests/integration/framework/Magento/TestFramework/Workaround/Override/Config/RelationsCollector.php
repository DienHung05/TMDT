<?php
/**
<<<<<<< HEAD
 * Copyright 2020 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

namespace Magento\TestFramework\Workaround\Override\Config;

use Magento\Framework\App\ObjectManager;
use Magento\Framework\ObjectManager\Relations\Runtime;
use Magento\Framework\ObjectManager\RelationsInterface;
use PHPUnit\Framework\TestCase;

/**
 * Class collects test class parents and interfaces.
 */
class RelationsCollector
{
    /**
     * @var RelationsInterface
     */
    private $relations;

    /**
     * @var array
     */
    private $internalParents = [];

    /**
     * Returns filtered list of parent classes and interfaces for given class name.
     *
     * @param string $className
     * @return array
     */
    public function getParents(string $className): array
    {
        return array_diff($this->getRelations($className), $this->getInternalParents());
    }

    /**
     * Returns list of parent classes and interfaces for given class name.
     *
     * @param string $className
     * @return array
     */
    private function getRelations(string $className): array
    {
        $parents = $this->getRelationsReader()->getParents($className);
        $result = [$parents];

        foreach ($parents as $parent) {
            $result[] = $this->getRelations($parent);
        }

        return array_merge([], ...$result);
    }

    /**
     * Returns class relations reader.
     *
     * @return RelationsInterface
     */
    private function getRelationsReader(): RelationsInterface
    {
        if (empty($this->relations)) {
            $this->relations = ObjectManager::getInstance()->create(Runtime::class);
        }

        return  $this->relations;
    }

    /**
     * Returns list of classes that should not be in list of parent classes.
     *
     * @return array
     */
    private function getInternalParents(): array
    {
        if (empty($this->internalParents)) {
            $this->internalParents = $this->getRelations(TestCase::class);
            $this->internalParents[] = TestCase::class;
        }

        return  $this->internalParents;
    }
}
