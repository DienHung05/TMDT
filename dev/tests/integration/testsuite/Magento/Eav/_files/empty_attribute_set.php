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
$objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();
/** @var \Magento\Eav\Model\Entity\Attribute\Set $attributeSet */
$attributeSet = $objectManager->create(\Magento\Eav\Model\Entity\Attribute\Set::class);
$entityTypeId = $objectManager->create(\Magento\Eav\Model\Entity\Type::class)->loadByCode('catalog_product')->getId();
$attributeSet->setData([
    'attribute_set_name' => 'empty_attribute_set',
    'entity_type_id' => $entityTypeId,
    'sort_order' => 200,
]);
$attributeSet->validate();
$attributeSet->save();
