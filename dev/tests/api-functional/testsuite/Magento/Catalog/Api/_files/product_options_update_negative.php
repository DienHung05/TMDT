<?php
/**
<<<<<<< HEAD
 * Copyright 2016 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

return [
    'missing_product_sku' => [
        [
            'title'          => 'title',
            'type'           => 'field',
            'sort_order'     => 1,
            'is_require'     => 1,
            'price'          => 10.0,
            'price_type'     => 'fixed',
            'max_characters' => 10,
        ],
        'The ProductSku is empty. Set the ProductSku and try again.',
        400,
    ],
    'invalid_product_sku' => [
        [
            'title'          => 'title',
            'type'           => 'field',
            'sort_order'     => 1,
            'is_require'     => 1,
            'price'          => 10.0,
            'price_type'     => 'fixed',
            'product_sku'    => 'sku1',
            'max_characters' => 10,
        ],
<<<<<<< HEAD
        'The product with SKU "%1" does not exist.',
=======
        'The product that was requested doesn\'t exist. Verify the product and try again.',
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        404,
    ],
];
