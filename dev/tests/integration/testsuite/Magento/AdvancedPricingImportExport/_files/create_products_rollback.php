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

use Magento\Catalog\Api\ProductRepositoryInterface;
<<<<<<< HEAD
=======
use Magento\Catalog\Model\Product;
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\ObjectManagerInterface;
use Magento\TestFramework\Helper\Bootstrap;

/** @var ObjectManagerInterface $objectManager */
$objectManager = Bootstrap::getObjectManager();

/**
<<<<<<< HEAD
 * @var ProductRepositoryInterface $productRepository
 */
=======
 * @var Product $productModel
 * @var ProductRepositoryInterface $productRepository
 */
$productModel = $objectManager->create(Product::class);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
$productRepository = $objectManager->create(ProductRepositoryInterface::class);
$skus = ['AdvancedPricingSimple 1', 'AdvancedPricingSimple 2'];
foreach ($skus as $sku) {
    try {
<<<<<<< HEAD
        $product = $productRepository->deleteById($sku);
=======
        $product = $productRepository->getById($sku);
        $productRepository->delete($product);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    } catch (NoSuchEntityException $exception) {
        // product already removed
    }
}
