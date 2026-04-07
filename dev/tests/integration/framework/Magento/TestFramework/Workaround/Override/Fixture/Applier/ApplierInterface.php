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

namespace Magento\TestFramework\Workaround\Override\Fixture\Applier;

/**
 * Interface ApplierInterface must be implemented in applier
 */
interface ApplierInterface
{
    /**
     * Apply configurations to fixtures
     *
     * @param array $fixtures
     * @return array
     */
    public function apply(array $fixtures): array;
}
