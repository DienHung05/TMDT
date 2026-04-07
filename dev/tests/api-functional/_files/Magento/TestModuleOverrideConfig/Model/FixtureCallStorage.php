<?php
/**
<<<<<<< HEAD
 * Copyright 2020 Adobe
 * All Rights Reserved.
=======
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

namespace Magento\TestModuleOverrideConfig\Model;

/**
 * Class represent simple container to save data
 */
class FixtureCallStorage
{
    /** @var array */
    private $storage = [];

    /**
     * Add fixture to storage
     *
     * @param string $fixture
     * @return void
     */
    public function addFixtureToStorage(string $fixture): void
    {
        $this->storage[] = $fixture;
    }

    /**
     * Get fixture position in storage
     *
     * @param string $fixture
     * @return null|int
     */
    public function getFixturePosition(string $fixture): ?int
    {
        return array_search($fixture, $this->storage) ?: null;
    }

    /**
     * Get storage
     *
     * @return array
     */
    public function getStorage(): array
    {
        return $this->storage;
    }

    /**
     * Get fixtures count in storage
     *
     * @param string $fixture
     * @return int
     */
    public function getFixturesCount(string $fixture = ''): int
    {
        $count = count($this->storage);
        if ($fixture) {
            $result = array_filter($this->storage, function ($storedFixture) use ($fixture) {
                return $storedFixture === $fixture;
            });
            $count = count($result);
        }

        return $count;
    }

    /**
     * Clear storage
     *
     * @return void
     */
    public function clearStorage(): void
    {
        $this->storage = [];
    }
}
