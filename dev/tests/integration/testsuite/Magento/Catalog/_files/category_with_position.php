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

$category = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(\Magento\Catalog\Model\Category::class);
$category->isObjectNew(true);
$category->setId(
    '444'
)->setName(
    'Category 1'
)->setAttributeSetId(
    '3'
)->setParentId(
    2
)->setPath(
    '1/2'
)->setLevel(
    '2'
)->setDefaultSortBy(
    'name'
)->setIsActive(
    true
)->setPosition(
    '5'
)->save();
