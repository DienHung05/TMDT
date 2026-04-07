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

namespace Magento\TestFramework\Fixture;

use Attribute;

#[Attribute(Attribute::TARGET_METHOD | Attribute::TARGET_CLASS | Attribute::IS_REPEATABLE)]
class DataFixture
{
    /**
<<<<<<< HEAD
     * @param string $type Fixture class name
     * @param array $data Data passed on to the fixture.
     * @param string|null $as Fixture identifier used to retrieve the data returned by the fixture
     * @param string|null $scope Name of scope data fixture in which the data fixture should be executed
     * @param int $count Number of instances to generate
=======
     * @param string $type
     * @param array $data
     * @param string|null $as
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     */
    public function __construct(
        public string $type,
        public array $data = [],
<<<<<<< HEAD
        public ?string $as = null,
        public ?string $scope = null,
        public int $count = 1
=======
        public ?string $as = null
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    ) {
    }
}
