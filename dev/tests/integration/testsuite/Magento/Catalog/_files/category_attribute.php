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

/** @var Attribute $attribute */

use Magento\Catalog\Model\Category\AttributeFactory;
use Magento\Catalog\Model\Category\Attribute;
use Magento\TestFramework\Helper\Bootstrap;

/** @var AttributeFactory $attributeFactory */
$attributeFactory = Bootstrap::getObjectManager()->get(AttributeFactory::class);
$attribute = $attributeFactory->create();
$attribute->setAttributeCode('test_attribute_code_666')
    ->setEntityTypeId(3)
    ->setIsGlobal(1)
    ->setIsUserDefined(1);
$attribute->save();
