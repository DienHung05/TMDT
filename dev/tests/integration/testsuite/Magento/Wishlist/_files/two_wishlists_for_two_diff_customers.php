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

use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\TestFramework\Helper\Bootstrap;
use Magento\TestFramework\Workaround\Override\Fixture\Resolver;

Resolver::getInstance()->requireDataFixture('Magento/Customer/_files/two_customers.php');
Resolver::getInstance()->requireDataFixture('Magento/Catalog/_files/product_simple.php');

$objectManager = Bootstrap::getObjectManager();
/** @var ProductRepositoryInterface $productRepository */
$productRepository = $objectManager->create(ProductRepositoryInterface::class);
$product = $productRepository->get('simple');
$firstCustomerIdFromFixture = 1;
$wishlistForFirstCustomer = $objectManager->create(
    \Magento\Wishlist\Model\Wishlist::class
);
$wishlistForFirstCustomer->loadByCustomerId($firstCustomerIdFromFixture, true);
$item = $wishlistForFirstCustomer->addNewItem($product, new \Magento\Framework\DataObject([]));
$wishlistForFirstCustomer->save();

$secondCustomerIdFromFixture = 2;
$wishlistForSecondCustomer = $objectManager->create(
    \Magento\Wishlist\Model\Wishlist::class
);
$wishlistForSecondCustomer->loadByCustomerId($secondCustomerIdFromFixture, true);
$item = $wishlistForSecondCustomer->addNewItem($product, new \Magento\Framework\DataObject([]));
$wishlistForSecondCustomer->save();
