<?php
/**
<<<<<<< HEAD
 * Copyright 2022 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

use Magento\Store\Api\WebsiteRepositoryInterface;
use Magento\Catalog\Model\ResourceModel\Category\CollectionFactory;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Catalog\Api\CategoryLinkManagementInterface;
use Magento\TestFramework\Helper\Bootstrap;

$objectManager = Bootstrap::getObjectManager();
$websiteRepository = $objectManager->get(WebsiteRepositoryInterface::class);
$websites = $websiteRepository->getList();
$websiteIds = [];
foreach ($websites as $website) {
    $websiteIds[] = $website->getId();
}

$categoryCollectionFactory = $objectManager->get(CollectionFactory::class);
$categoryCollection = $categoryCollectionFactory->create();
$categoryIds = [];
foreach ($categoryCollection as $category) {
    $categoryIds[] = $category->getId();
}

$productSkus = ['simple-4', 'simple-3', '12345', 'simple'];
$productRepository = $objectManager->get(ProductRepositoryInterface::class);
$categoryLinkManagement = $objectManager->get(CategoryLinkManagementInterface::class);

foreach ($productSkus as $sku) {
    $product = $productRepository->get($sku);
    $product->setWebsiteIds($websiteIds);
    $productRepository->save($product);
    $categoryLinkManagement->assignProductToCategories($sku, $categoryIds);
}
