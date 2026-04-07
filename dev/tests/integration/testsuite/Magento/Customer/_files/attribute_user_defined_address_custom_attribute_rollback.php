<?php
/**
<<<<<<< HEAD
 * Copyright 2014 Adobe
 * All Rights Reserved.
=======
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

/** @var \Magento\Customer\Model\Attribute $attributeModel */
$attributeModel = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
    \Magento\Customer\Model\Attribute::class
);
$attributeModel->load('custom_attribute1', 'attribute_code')->delete();
$attributeModel->load('custom_attribute2', 'attribute_code')->delete();
