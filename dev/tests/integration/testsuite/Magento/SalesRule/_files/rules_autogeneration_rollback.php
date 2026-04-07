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

/** @var $objectManager \Magento\TestFramework\ObjectManager */
$objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();
/** @var Magento\Framework\Registry $registry */
$registry = $objectManager->get(\Magento\Framework\Registry::class);
/** @var $salesRule \Magento\SalesRule\Model\Rule */
$salesRule = $registry->registry('_fixture/Magento_SalesRule_Api_RuleRepository');
$salesRule->delete();
$registry->unregister('_fixture/Magento_SalesRule_Api_RuleRepository');
