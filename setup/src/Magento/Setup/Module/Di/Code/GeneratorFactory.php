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
namespace Magento\Setup\Module\Di\Code;

use Magento\Framework\ObjectManagerInterface;

class GeneratorFactory
{
    /**
     * @var ObjectManagerInterface
     */
    private $objectManager;

    /**
     * @param ObjectManagerInterface $objectManager
     */
    public function __construct(ObjectManagerInterface $objectManager)
    {
        $this->objectManager = $objectManager;
    }

    /**
     * Creates operation
     *
     * @param array $arguments
     * @return Generator
     */
    public function create($arguments = [])
    {
        return $this->objectManager->create(\Magento\Setup\Module\Di\Code\Generator::class, $arguments);
    }
}
