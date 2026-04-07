<?php
/**
<<<<<<< HEAD
 * Copyright 2016 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

$objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();
/** @var \Magento\Email\Model\Template $template */
$template = $objectManager->create(\Magento\Email\Model\Template::class);
$template->setOptions(['area' => 'test area', 'store' => 1]);
$template->setData(
    [
        'template_text' => file_get_contents(__DIR__ . '/template_fixture.html'),
        'template_code' => \Magento\Theme\Model\Config\ValidatorTest::TEMPLATE_CODE,
<<<<<<< HEAD
        'template_type' => \Magento\Email\Model\Template::TYPE_TEXT,
        'orig_template_code' => 'template_fixture'
=======
        'template_type' => \Magento\Email\Model\Template::TYPE_TEXT
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    ]
);
$template->save();
