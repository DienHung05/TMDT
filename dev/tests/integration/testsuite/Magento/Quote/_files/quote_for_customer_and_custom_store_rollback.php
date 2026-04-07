<?php
/**
<<<<<<< HEAD
 * Copyright 2019 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

use Magento\Framework\Registry;
use Magento\Quote\Api\CartRepositoryInterface;
use Magento\TestFramework\Helper\Bootstrap;
use Magento\TestFramework\Quote\Model\GetQuoteByReservedOrderId;

/** @var ObjectManager $objectManager */
$objectManager = Bootstrap::getObjectManager();

/** @var Registry $registry */
$registry = $objectManager->get(Registry::class);
$registry->unregister('isSecureArea');
$registry->register('isSecureArea', true);

$quote = $objectManager->get(GetQuoteByReservedOrderId::class)->execute('tsg-123456789');
if ($quote !== null) {
    /** @var CartRepositoryInterface $cartRepository */
    $cartRepository = $objectManager->get(CartRepositoryInterface::class);
    $cartRepository->delete($quote);
}

$registry->unregister('isSecureArea');
$registry->register('isSecureArea', false);
