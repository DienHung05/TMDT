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
declare(strict_types=1);

namespace Magento\TestFramework\Fixture;

use Magento\Framework\DataObject;

/**
 * Interface for revertible data fixtures
 */
interface RevertibleDataFixtureInterface extends DataFixtureInterface
{
    /**
     * Revert fixture data
     *
     * @param DataObject $data
     */
    public function revert(DataObject $data): void;
}
