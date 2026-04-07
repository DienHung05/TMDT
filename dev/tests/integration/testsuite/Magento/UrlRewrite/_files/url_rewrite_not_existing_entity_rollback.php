<?php
/**
<<<<<<< HEAD
 * Copyright 2019 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

use Magento\TestFramework\Helper\Bootstrap;
use Magento\UrlRewrite\Model\UrlRewrite;

$objectManager = Bootstrap::getObjectManager();

/** @var UrlRewrite $urlRewrite */
$urlRewrite = $objectManager->create(UrlRewrite::class);
$urlRewrite->load('non-exist-entity.html', 'request_path');
$urlRewrite->delete();
