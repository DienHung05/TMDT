<?php
/**
<<<<<<< HEAD
 * Copyright 2013 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
return [
    'blocks' => [
        'reorder_sidebar' => [
            'name_in_layout' => 'sale.reorder.sidebar',
            'class' => \Magento\PersistentHistory\Model\Observer::class,
            'method' => 'initReorderSidebar',
            'block_type' => \Magento\Sales\Block\Reorder\Sidebar::class,
        ],
        'viewed_products' => [
            'name_in_layout' => 'left.reports.product.viewed',
            'class' => \Magento\PersistentHistory\Model\Observer::class,
            'method' => 'emulateViewedProductsBlock',
            'block_type' => \Magento\Sales\Block\Reorder\Sidebar::class,
        ],
        'compared_products' => [
            'name_in_layout' => 'right.reports.product.compared',
            'class' => \Magento\PersistentHistory\Model\Observer::class,
            'method' => 'emulateComparedProductsBlock',
            'block_type' => \Magento\Reports\Block\Product\Compared::class,
        ],
    ]
];
