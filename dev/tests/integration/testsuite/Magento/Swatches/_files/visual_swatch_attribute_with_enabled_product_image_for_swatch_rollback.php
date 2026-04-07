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

use Magento\TestFramework\Workaround\Override\Fixture\Resolver;

Resolver::getInstance()->requireDataFixture(
    'Magento/Swatches/_files/visual_swatch_attribute_with_different_options_type_rollback.php'
);
Resolver::getInstance()->requireDataFixture('Magento/ConfigurableProduct/_files/configurable_products_rollback.php');
Resolver::getInstance()->requireDataFixture('Magento/Catalog/_files/product_image_rollback.php');
