<?php
/**
<<<<<<< HEAD
 * Copyright 2015 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

namespace Magento\TestModule5\Service\V1;

interface OverrideServiceInterface
{
    /**
     * Update existing item.
     *
     * @param string $entityId
     * @param string $name
     * @param bool $orders
     * @return \Magento\TestModule5\Service\V1\Entity\AllSoapAndRest
     */
    public function scalarUpdate($entityId, $name, $orders);
}
