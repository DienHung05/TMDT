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

use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Customer\Model\CustomerRegistry;
use Magento\TestFramework\Helper\Bootstrap;
use Magento\TestFramework\Workaround\Override\Fixture\Resolver;

Resolver::getInstance()->requireDataFixture('Magento/Customer/_files/customer.php');
Resolver::getInstance()->requireDataFixture('Magento/Catalog/_files/product_simple.php');

$objectManager = Bootstrap::getObjectManager();
/** @var ProductRepositoryInterface $productRepository */
$productRepository = $objectManager->create(ProductRepositoryInterface::class);
$product = $productRepository->get('simple');
/** @var CustomerRegistry $customerRegistry */
$customerRegistry = Bootstrap::getObjectManager()->create(CustomerRegistry::class);
$customer = $customerRegistry->retrieve(1);

$price = Bootstrap::getObjectManager()->create(\Magento\ProductAlert\Model\Price::class);
$price->setCustomerId(
    $customer->getId()
)->setProductId(
    $product->getId()
)->setPrice(
    $product->getPrice()+1
)->setWebsiteId(
    1
<<<<<<< HEAD
)->setStoreId(
    1
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
);
$price->save();

$stock = Bootstrap::getObjectManager()->create(\Magento\ProductAlert\Model\Stock::class);
$stock->setCustomerId(
    $customer->getId()
)->setProductId(
    $product->getId()
)->setWebsiteId(
    1
<<<<<<< HEAD
)->setStoreId(
    1
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
);
$stock->save();
