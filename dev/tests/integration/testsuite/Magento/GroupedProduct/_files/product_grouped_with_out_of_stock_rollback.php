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
use Magento\TestFramework\Workaround\Override\Fixture\Resolver;

Resolver::getInstance()->requireDataFixture('Magento/GroupedProduct/_files/product_grouped_rollback.php');
Resolver::getInstance()->requireDataFixture('Magento/Catalog/_files/product_virtual_out_of_stock_rollback.php');
Resolver::getInstance()->requireDataFixture('Magento/Catalog/_files/product_virtual_in_stock_rollback.php');
Resolver::getInstance()->requireDataFixture('Magento/Catalog/_files/product_associated_rollback.php');
