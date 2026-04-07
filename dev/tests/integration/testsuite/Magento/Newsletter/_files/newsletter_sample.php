<?php
/**
<<<<<<< HEAD
 * Copyright 2013 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
use Magento\Framework\App\TemplateTypesInterface;

/** @var \Magento\Newsletter\Model\Template $template */
$template = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
    \Magento\Newsletter\Model\Template::class
);

$templateData = [
    'template_code' => 'some_unique_code',
    'template_type' => TemplateTypesInterface::TYPE_TEXT,
    'subject' => 'test data2__22',
    'template_sender_email' => 'sender@email.com',
    'template_sender_name' => 'Test Sender Name 222',
    'text' => 'Template Content 222',
];
$template->setData($templateData);
$template->save();
