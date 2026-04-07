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
/** @var \Magento\Eav\Model\Entity\Attribute\Group $attributeSet */
$attributeGroup = $objectManager->create(\Magento\Eav\Model\Entity\Attribute\Group::class)
    ->load('empty_attribute_group', 'attribute_group_name');
if ($attributeGroup->getId()) {
    $attributeGroup->delete();
}

$attributeGroupUpdated = $objectManager->create(\Magento\Eav\Model\Entity\Attribute\Group::class)
    ->load('empty_attribute_group_updated', 'attribute_group_name');
if ($attributeGroupUpdated->getId()) {
    $attributeGroupUpdated->delete();
}
