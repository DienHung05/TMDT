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
 * Interface for crypt key generators.
 */
interface CryptKeyGeneratorInterface
{
    /**
     * Generates & returns a string to be used as crypt key.
     *
     * The key length is not a parameter, but an implementation detail.
     *
     * @return string
     */
    public function generate();
}
