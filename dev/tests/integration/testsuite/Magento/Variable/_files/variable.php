<?php
/**
<<<<<<< HEAD
 * Copyright 2015 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

$variable = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
    \Magento\Variable\Model\Variable::class
);
$variable->setCode(
    'variable_code'
)->setName(
    'Variable Name'
)->setPlainValue(
    'Plain Value'
)->setHtmlValue(
    'HTML Value'
)->save();
