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

/** @var $product \Magento\Catalog\Model\Product */
$objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();

/** @var \Magento\Eav\Model\AttributeSetManagement $attributeSetManagement */
$attributeSetManagement = $objectManager->create(\Magento\Eav\Model\AttributeSetManagement::class);

/** @var \Magento\Eav\Api\Data\AttributeSetInterface $attributeSet */
$attributeSet = $objectManager->create(\Magento\Eav\Model\Entity\Attribute\Set::class);

$data = [
    'attribute_set_name' => 'second_attribute_set',
    'sort_order' => 200,
];

$attributeSet->organizeData($data);

$defaultSetId = $objectManager->create(\Magento\Catalog\Model\Product::class)->getDefaultAttributeSetId();

$attributeSetManagement->create(\Magento\Catalog\Model\Product::ENTITY, $attributeSet, $defaultSetId);
