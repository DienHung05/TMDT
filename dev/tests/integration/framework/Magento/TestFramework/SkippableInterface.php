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

namespace Magento\TestFramework;

/**
 * Interface for test class wrapper, which allows dynamically skip tests.
 */
interface SkippableInterface
{
    /**
     * Hook method to check config and skip test before start.
     *
     * @before
     * @return void
     */
    public function ___beforeTestRun(): void;
}
