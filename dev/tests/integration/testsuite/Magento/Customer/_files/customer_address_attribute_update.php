<?php
/**
 * this fixture update customer_address `input_validation` to `alphanum-with-spaces` for `street` field.
 *
<<<<<<< HEAD
 * Copyright 2021 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
$attributeCode = 'street';
$entityType = \Magento\Customer\Model\Metadata\AddressMetadata::ENTITY_TYPE_ADDRESS;

//@codingStandardsIgnoreFile
/** @var \Magento\Customer\Model\Attribute $model */
$model = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(\Magento\Customer\Model\Attribute::class);
$model->loadByCode($entityType, $attributeCode);

$validationRules = array_replace_recursive($model->getValidationRules(),['input_validation'=>'alphanum-with-spaces']);
$model->setValidationRules($validationRules);

$model->save();
