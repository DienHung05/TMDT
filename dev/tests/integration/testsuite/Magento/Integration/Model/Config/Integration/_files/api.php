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
return [
    'TestIntegration1' => [
        'resource' => [
            'Magento_Customer::manage',
            'Magento_Customer::online',
            'Magento_Sales::capture',
            'Magento_SalesRule::quote',
        ],
    ],
    'TestIntegration2' => [
        'resource' => ['Magento_Catalog::product_read', 'Magento_SalesRule::config_promo'],
    ],
    'TestIntegration3' => [
        'resource' => ['Magento_Catalog::product_read', 'Magento_Sales::create', 'Magento_SalesRule::quote'],
    ]
];
