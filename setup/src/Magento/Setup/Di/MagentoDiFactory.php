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

namespace Magento\Setup\Di;

use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Magento\Framework\App\ObjectManager;

/**
 * Instantiates the type via Magento object manager
 */
class MagentoDiFactory implements FactoryInterface
{
    /**
     * @inheritdoc
     */
<<<<<<< HEAD
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null)
=======
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return ObjectManager::getInstance()->get($requestedName);
    }
}
