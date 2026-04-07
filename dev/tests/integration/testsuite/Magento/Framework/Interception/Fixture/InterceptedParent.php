<?php
/**
<<<<<<< HEAD
 * Copyright 2014 Adobe
 * All Rights Reserved.
=======
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

namespace Magento\Framework\Interception\Fixture;

/**
 * @codingStandardsIgnoreStart
 */
class InterceptedParent implements InterceptedParentInterface
{
    /**
     * @SuppressWarnings(PHPMD.ShortMethodName)
     */
    public function A($param1)
    {
        return 'A' . $param1 . 'A';
    }

    /**
     * @SuppressWarnings(PHPMD.ShortMethodName)
     */
    public function B($param1, $param2)
    {
        return $param1 . $param2 . $this->A($param1);
    }
}
