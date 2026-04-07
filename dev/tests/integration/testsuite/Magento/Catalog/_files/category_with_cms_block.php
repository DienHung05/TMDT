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

use Magento\Catalog\Api\CategoryRepositoryInterface;
use Magento\Catalog\Api\Data\CategoryInterfaceFactory;
use Magento\Catalog\Model\Category;
use Magento\Cms\Api\GetBlockByIdentifierInterface;
use Magento\Store\Model\Store;
use Magento\Store\Model\StoreManagerInterface;
use Magento\TestFramework\Helper\Bootstrap;
use Magento\Catalog\Helper\DefaultCategory;
use Magento\TestFramework\Workaround\Override\Fixture\Resolver;

Resolver::getInstance()->requireDataFixture('Magento/Cms/_files/block.php');

$objectManager = Bootstrap::getObjectManager();
/** @var StoreManagerInterface $storeManager */
$storeManager = $objectManager->get(StoreManagerInterface::class);
/** @var CategoryInterfaceFactory $categoryFactory */
$categoryFactory = $objectManager->get(CategoryInterfaceFactory::class);
/** @var CategoryRepositoryInterface $categoryRepository */
$categoryRepository = $objectManager->get(CategoryRepositoryInterface::class);
/** @var DefaultCategory $categoryHelper */
$categoryHelper = $objectManager->get(DefaultCategory::class);
$currentStoreId = (int)$storeManager->getStore()->getId();
/** @var GetBlockByIdentifierInterface $getBlockByIdentifierInterface */
$getBlockByIdentifier = $objectManager->get(GetBlockByIdentifierInterface::class);
$block = $getBlockByIdentifier->execute('fixture_block', $currentStoreId);

$category = $categoryFactory->create();
$category->setName('Category with cms block')
    ->setParentId($categoryHelper->getId())
    ->setLevel(2)
    ->setAvailableSortBy('name')
    ->setDefaultSortBy('name')
    ->setIsActive(true)
    ->setPosition(1)
    ->setDisplayMode(Category::DM_MIXED)
    ->setLandingPage($block->getId());
try {
    $storeManager->setCurrentStore(Store::DEFAULT_STORE_ID);
    $categoryRepository->save($category);
} finally {
    $storeManager->setCurrentStore($currentStoreId);
}
