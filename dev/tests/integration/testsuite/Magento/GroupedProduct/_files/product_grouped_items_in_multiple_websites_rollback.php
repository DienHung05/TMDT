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
use Magento\Framework\Exception\NoSuchEntityException;

/** @var \Magento\Framework\Registry $registry */
$registry = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->get(\Magento\Framework\Registry::class);

/**
 * @var \Magento\Catalog\Api\ProductRepositoryInterface $productRepository
 */
$productRepository = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->get(
    \Magento\Catalog\Api\ProductRepositoryInterface::class
);
$registry->unregister('isSecureArea');
$registry->register('isSecureArea', true);
try {
    $productRepository->deleteById('simple');
} catch (NoSuchEntityException $e) {
    //already deleted
}

try {
    $productRepository->deleteById('virtual-product');
} catch (NoSuchEntityException $e) {
    //already deleted
}

try {
    $productRepository->deleteById('grouped-product');
} catch (NoSuchEntityException $e) {
    //already deleted
}

$registry->unregister('isSecureArea');
$registry->register('isSecureArea', false);
