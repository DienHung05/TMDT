<?php
/**
<<<<<<< HEAD
 * Copyright 2019 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

declare(strict_types=1);

namespace Magento\TestFramework\Serialize;

use Magento\Framework\Serialize\SerializerInterface;

/**
 * Insecure SerializerInterface implementation for test use only.
 */
class Serializer implements SerializerInterface
{
    /**
     * @inheritDoc
     */
    public function serialize($data)
    {
        if (is_resource($data)) {
            throw new \InvalidArgumentException('Unable to serialize value.');
        }

        // phpcs:ignore Magento2.Security.InsecureFunction
        return serialize($data);
    }

    /**
     * @inheritDoc
     */
    public function unserialize($string)
    {
        if (false === $string || null === $string || '' === $string) {
            throw new \InvalidArgumentException('Unable to unserialize value.');
        }
        set_error_handler(
            function () {
                restore_error_handler();
                throw new \InvalidArgumentException('Unable to unserialize value, string is corrupted.');
            },
<<<<<<< HEAD
            E_WARNING
=======
            E_NOTICE
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        );
        // phpcs:ignore Magento2.Security.InsecureFunction
        $result = unserialize($string);
        restore_error_handler();

        return $result;
    }
}
