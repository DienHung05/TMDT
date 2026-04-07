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

use Magento\Framework\Registry;
use Magento\TestFramework\Helper\Bootstrap;
use Magento\Wishlist\Model\ResourceModel\Wishlist as WishlistResource;
use Magento\Wishlist\Model\Wishlist;
use Magento\Wishlist\Model\WishlistFactory;
use Magento\TestFramework\Workaround\Override\Fixture\Resolver;

$objectManager = Bootstrap::getObjectManager();

Resolver::getInstance()->requireDataFixture('Magento/Catalog/_files/simple_product_disabled_rollback.php');
Resolver::getInstance()->requireDataFixture('Magento/Customer/_files/customer_rollback.php');

/** @var Registry $registry */
$registry = $objectManager->get(Registry::class);
/** @var WishlistResource $wishListResource */
$wishListResource = $objectManager->get(WishlistResource::class);
$registry->unregister('isSecureArea');
$registry->register('isSecureArea', true);
/** @var Wishlist $wishlist */
$wishlist = $objectManager->get(WishlistFactory::class)->create();
$wishlist->loadByCustomerId(1);
if ($wishlist->getId()) {
    $wishListResource->delete($wishlist);
}

$registry->unregister('isSecureArea');
$registry->register('isSecureArea', false);
