<?php
/**
<<<<<<< HEAD
 * Copyright 2017 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
$objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();

/** @var \Magento\Theme\Model\Theme $theme */
$theme = $objectManager->create(\Magento\Theme\Model\Theme::class);
$theme->load('Magento/zoom1', 'theme_path');
$theme->delete();

$theme = $objectManager->create(\Magento\Theme\Model\Theme::class);
$theme->load('Magento/zoom2', 'theme_path');
$theme->delete();

$theme = $objectManager->create(\Magento\Theme\Model\Theme::class);
$theme->load('Magento/zoom3', 'theme_path');
$theme->delete();

$theme = $objectManager->create(\Magento\Theme\Model\Theme::class);
$theme->load('Vendor/child', 'theme_path');
$theme->delete();

$theme = $objectManager->create(\Magento\Theme\Model\Theme::class);
$theme->load('Vendor/parent', 'theme_path');
$theme->delete();
