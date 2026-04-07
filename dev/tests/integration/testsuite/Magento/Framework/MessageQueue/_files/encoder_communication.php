<?php
/**
<<<<<<< HEAD
 * Copyright 2018 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

return [
    'topics' => [
        'customer.created' => [
            'request_type' => 'object_interface',
            'request' => \Magento\Customer\Api\Data\CustomerInterface::class,
            'response' => null,
        ],
        'customer.list.retrieved' => [
            'request_type' => 'object_interface',
            'request' => 'Magento\Customer\Api\Data\CustomerInterface[]',
            'response' => null,
        ],
        'customer.updated' => [
            'request_type' => 'object_interface',
            'request' => \Magento\Customer\Api\Data\CustomerInterface::class,
            'response' => null,
        ],
        'customer.deleted' => [
            'request_type' => 'object_interface',
            'request' => \Magento\Customer\Api\Data\CustomerInterface::class,
            'response' => null,
        ],
        'product.created' => [
            'request_type' => 'object_interface',
            'request' => \Magento\Catalog\Api\Data\ProductInterface::class,
            'response' => null,
        ],
    ],
];
