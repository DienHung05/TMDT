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
namespace Magento\Setup\Model\Description\Mixin;

/**
 * Interface for Description mixin
 */
interface DescriptionMixinInterface
{
    /**
     * Apply mixin logic to block of text
     *
     * @param string $text
     * @return string
     */
    public function apply($text);
}
