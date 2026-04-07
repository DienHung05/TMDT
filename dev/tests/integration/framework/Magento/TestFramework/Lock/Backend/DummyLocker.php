<?php
/**
<<<<<<< HEAD
 * Copyright 2019 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

namespace Magento\TestFramework\Lock\Backend;

use Magento\Framework\Lock\LockManagerInterface;

/**
 * Dummy locker for the integration framework.
 */
class DummyLocker implements LockManagerInterface
{
    /**
     * @inheritdoc
     */
    public function lock(string $name, int $timeout = -1): bool
    {
        return true;
    }

    /**
     * @inheritdoc
     */
    public function unlock(string $name): bool
    {
        return true;
    }

    /**
     * @inheritdoc
     */
    public function isLocked(string $name): bool
    {
        return false;
    }
}
