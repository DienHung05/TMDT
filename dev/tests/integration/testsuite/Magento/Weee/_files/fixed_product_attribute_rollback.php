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

$objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();

/* @var \Magento\Eav\Model\Entity\Attribute $attribute */
$attribute = $objectManager->get(\Magento\Eav\Model\Entity\Attribute::class);
$attribute->loadByCode(\Magento\Catalog\Model\Product::ENTITY, 'fixed_product_attribute');
$attribute->delete();
