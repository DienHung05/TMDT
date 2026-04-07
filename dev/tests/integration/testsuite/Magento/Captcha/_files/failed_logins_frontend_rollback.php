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

use Magento\TestFramework\Helper\Bootstrap;
use Magento\Captcha\Model\ResourceModel\LogFactory;
use Magento\Captcha\Model\ResourceModel\Log;

$objectManager = Bootstrap::getObjectManager();
$logFactory = $objectManager->get(LogFactory::class);

/** @var Log $captchaLog */
$captchaLog = $logFactory->create();
$captchaLog->deleteUserAttempts('mageuser@dummy.com');
