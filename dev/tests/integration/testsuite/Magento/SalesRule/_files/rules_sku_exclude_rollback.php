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

/** @var \Magento\Eav\Api\AttributeRepositoryInterface $repository */
$repository = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()
    ->create(\Magento\Eav\Api\AttributeRepositoryInterface::class);

/** @var \Magento\Eav\Api\Data\AttributeInterface $skuAttribute */
$skuAttribute = $repository->get(
    'catalog_product',
    'sku'
);
$data = $skuAttribute->getData();
$data['is_used_for_promo_rules'] = 0;
$skuAttribute->setData($data);
$skuAttribute->save();

/** @var Magento\Framework\Registry $registry */
$registry = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->get(\Magento\Framework\Registry::class);

/** @var Magento\SalesRule\Model\Rule $rule */
$rule = $registry->registry('_fixture/Magento_SalesRule_Sku_Exclude');

$rule->delete();
