<?php
/**
<<<<<<< HEAD
 * Copyright 2017 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
namespace Magento\Setup\Model;

/**
 * Generate description for product
 */
interface DescriptionGeneratorInterface
{
    /**
     * Generate description per product net
     *
     * @param int $entityIndex
     * @return string
     */
    public function generate($entityIndex);
}
