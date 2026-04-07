<?php
/**
<<<<<<< HEAD
 * Copyright 2020 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

use Magento\Email\Model\ResourceModel\Template as TemplateResource;
use Magento\Framework\Mail\TemplateInterface;
use Magento\Framework\Mail\TemplateInterfaceFactory;
use Magento\TestFramework\Helper\Bootstrap;

$objectManager = Bootstrap::getObjectManager();
/** @var TemplateResource $templateResource */
$templateResource = $objectManager->get(TemplateResource::class);
/** @var TemplateInterfaceFactory $templateFactory */
$templateFactory = $objectManager->get(TemplateInterfaceFactory::class);
/** @var TemplateInterface $template */
$template = $templateFactory->create();

$content = <<<HTML
{{template config_path="design/email/header_template"}}
<p>{{trans "Customer create account email template"}}</p>
{{template config_path="design/email/footer_template"}}
HTML;

$template->setTemplateCode('customer_create_account_email_template')
    ->setTemplateText($content)
    ->setTemplateType(TemplateInterface::TYPE_HTML);
$templateResource->save($template);
