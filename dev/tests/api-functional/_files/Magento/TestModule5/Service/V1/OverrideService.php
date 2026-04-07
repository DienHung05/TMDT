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

use Magento\TestModule5\Service\V1\Entity\AllSoapAndRestFactory;

class OverrideService implements OverrideServiceInterface
{
    /**
     * @var AllSoapAndRestFactory
     */
    protected $factory;

    /**
     * @param AllSoapAndRestFactory $factory
     */
    public function __construct(AllSoapAndRestFactory $factory)
    {
        $this->factory = $factory;
    }

    /**
     * {@inheritdoc}
     */
    public function scalarUpdate($entityId, $name, $hasOrders)
    {
        return $this->factory->create()
            ->setEntityId($entityId)
            ->setName($name)
            ->setHasOrders($hasOrders);
    }
}
