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

use Magento\Framework\Config\ConfigOptionsListConstants;
use Magento\Framework\Math\Random;

/**
 * Generates a crypt.
 */
class CryptKeyGenerator implements CryptKeyGeneratorInterface
{
    /**
     * @var Random
     */
    private $random;

    /**
     * CryptKeyGenerator constructor.
     *
     * @param Random $random
     */
    public function __construct(Random $random)
    {
        $this->random = $random;
    }

    /**
     * Generates & returns a string to be used as crypt key.
     *
     * @return string
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function generate()
    {
<<<<<<< HEAD
        return $this->getRandomString();
=======
        // md5() here is not for cryptographic use. It used for generate encryption key itself
        // and do not encrypt any passwords
        // phpcs:ignore Magento2.Security.InsecureFunction
        return md5($this->getRandomString());
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }

    /**
     * Returns a random string.
     *
     * @return string
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    private function getRandomString()
    {
<<<<<<< HEAD
        return ConfigOptionsListConstants::STORE_KEY_ENCODED_RANDOM_STRING_PREFIX .
            $this->random->getRandomBytes(ConfigOptionsListConstants::STORE_KEY_RANDOM_STRING_SIZE);
=======
        return $this->random->getRandomString(ConfigOptionsListConstants::STORE_KEY_RANDOM_STRING_SIZE);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }
}
