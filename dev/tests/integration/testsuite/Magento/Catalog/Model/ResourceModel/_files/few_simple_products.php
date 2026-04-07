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
declare(strict_types=1);

use Magento\TestFramework\Helper\Bootstrap;
use Magento\Catalog\Model\ProductFactory;
use Magento\Catalog\Api\ProductRepositoryInterface;

/** @var Magento\Framework\ObjectManagerInterface $objcetManager */
$objectManager = Bootstrap::getObjectManager();

/** @var ProductFactory $productFactory */
$productFactory = $objectManager->create(ProductFactory::class);

/** @var ProductRepositoryInterface $productRepository */
$productRepository = $objectManager->create(ProductRepositoryInterface::class);

// Create 10 products (with change this variable, don't forget to change the same in rollback)
$productsAmount = 10;

for ($i = 1; $i <= $productsAmount; $i++) {
    $productArray = [
        'data' => [
            'name' => "Product{$i}",
            'sku' => "Product{$i}",
            'price' => 100,
            'attribute_set_id' => 4,
            'website_ids' => [1]
        ]
    ];
    
    $productRepository->save($productFactory->create($productArray));
}
