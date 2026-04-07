<?php
/**
<<<<<<< HEAD
 * Copyright 2014 Adobe
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
    /** @var $simpleProduct \Magento\Catalog\Model\Product */
    $simpleProduct = $productRepository->get('simple', false, null, true);
    $simpleProduct->delete();
} catch (NoSuchEntityException $e) {
    //already deleted
}

try {
    /** @var $virtualProduct \Magento\Catalog\Model\Product */
    $virtualProduct = $productRepository->get('virtual-product', false, null, true);
    $virtualProduct->delete();
} catch (NoSuchEntityException $e) {
    //already deleted
}

try {
    /** @var $groupedProduct \Magento\Catalog\Model\Product */
    $groupedProduct = $productRepository->get('grouped-product', false, null, true);
    $groupedProduct->delete();
} catch (NoSuchEntityException $e) {
    //already deleted
}

$registry->unregister('isSecureArea');
$registry->register('isSecureArea', false);
