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

/**
 * Registry for fixtures
 */
namespace Magento\Setup\Fixtures;

class FixtureRegistry
{

    /**
     * List of fixtures applied to the application
     *
     * @var string[]
     */
    private $fixtures = [];

    /**
     * @param string[] $fixtures
     */
    public function __construct(array $fixtures = [])
    {
        $this->fixtures = $fixtures;
    }

    /**
     * Get fixtures
     *
     * @return string[]
     */
    public function getFixtures() :array
    {
        return $this->fixtures;
    }
}
