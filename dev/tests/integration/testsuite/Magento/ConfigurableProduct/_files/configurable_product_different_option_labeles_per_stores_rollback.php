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

use Magento\TestFramework\ConfigurableProduct\Model\DeleteConfigurableProduct;
use Magento\TestFramework\Helper\Bootstrap;
use Magento\TestFramework\Workaround\Override\Fixture\Resolver;

$objectManager = Bootstrap::getObjectManager();
/** @var DeleteConfigurableProduct $deleteConfigurableProduct */
$deleteConfigurableProduct = $objectManager->get(DeleteConfigurableProduct::class);
$deleteConfigurableProduct->execute('configurable');

Resolver::getInstance()->requireDataFixture(
    'Magento/ConfigurableProduct/_files/configurable_attribute_different_labels_per_stores_rollback.php'
);
