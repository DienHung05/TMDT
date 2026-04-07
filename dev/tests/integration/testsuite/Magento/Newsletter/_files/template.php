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

$template = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
    \Magento\Newsletter\Model\Template::class
);
$template->setTemplateCode(
    'fixture_tpl'
)->setTemplateText(
    '<p>Follow this link to unsubscribe</p>
<!-- This tag is for unsubscribe link  -->
<p><a href="{{var subscriber.getUnsubscriptionLink()}}">{{var subscriber.getUnsubscriptionLink()}}</a></p>'
)->setTemplateType(
    2
)->setTemplateSubject(
    'Subject'
)->setTemplateSenderName(
    'CustomerSupport'
)->setTemplateSenderEmail(
    'support@example.com'
)->setTemplateActual(
    1
)->save();
