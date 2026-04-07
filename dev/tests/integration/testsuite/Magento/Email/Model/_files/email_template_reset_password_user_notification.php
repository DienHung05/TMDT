<?php
/**
<<<<<<< HEAD
 * Copyright 2021 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

$objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();
$origTemplateCode = 'admin_emails_forgot_email_template';
/** @var \Magento\Email\Model\Template $template */
$template = $objectManager->create(\Magento\Email\Model\Template::class);
$template->loadDefault($origTemplateCode);
$template->setTemplateCode('Reset Password User Notification Custom Code');
$template->setOrigTemplateCode('admin_emails_forgot_email_template');
$template->setId(null);
$template->save();
