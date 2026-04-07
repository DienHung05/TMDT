<?php
/**
<<<<<<< HEAD
 * Copyright 2020 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

/** @var \Magento\Framework\Registry $registry */
$registry = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()
    ->get(\Magento\Framework\Registry::class);
$registry->unregister('isSecureArea');
$registry->register('isSecureArea', true);

$categoryIDs = [444, 445, 446];
$productIDs = [444, 445];

foreach ($productIDs as $productID) {
    /** @var $product \Magento\Catalog\Model\Product */
    $product = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()
        ->create(\Magento\Catalog\Model\Product::class);
    $product->load($productID);
    if ($product->getId()) {
        $product->delete();
    }
}

foreach ($categoryIDs as $categoryID) {
    /** @var $category \Magento\Catalog\Model\Category */
    $category = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()
        ->create(\Magento\Catalog\Model\Category::class);
    $category->load($categoryID);
    if ($category->getId()) {
        $category->delete();
    }
}
