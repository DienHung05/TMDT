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

use Magento\TestFramework\Workaround\Override\Config;

/**
 * Trait for dynamic skip tests.
 *
 * Any class using this trait is required to implement Magento\TestFramework\SkippableInterface
 */
trait SkippableTrait
{
    /**
     * Checks config and skip test before start.
     *
     * @before
     * @inheritdoc
     */
    public function ___beforeTestRun(): void
    {
        $skipConfig = Config::getInstance()->getSkipConfiguration($this);
        if ($skipConfig['skip']) {
            self::markTestSkipped($skipConfig['skipMessage']);
        }
    }
}
