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
use Magento\TestFramework\Helper\Bootstrap;

/** @var \Magento\Framework\Registry $registry */
$registry = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->get(\Magento\Framework\Registry::class);
$registry->unregister('isSecureArea');
$registry->register('isSecureArea', true);

/** @var \Magento\Catalog\Model\ResourceModel\Eav\Attribute $attribute */
$attribute = Bootstrap::getObjectManager()->create(\Magento\Catalog\Model\ResourceModel\Eav\Attribute::class);
$attribute->loadByCode(4, 'label_attr_code3df4tr3');

if ($attribute->getId()) {
    $attribute->delete();
}

/** @var \Magento\Catalog\Model\ResourceModel\Eav\Attribute $attribute */
$attribute = Bootstrap::getObjectManager()->create(\Magento\Catalog\Model\ResourceModel\Eav\Attribute::class);
$attribute->loadByCode(4, 'test_attribute_code_l');

if ($attribute->getId()) {
    $attribute->delete();
}
