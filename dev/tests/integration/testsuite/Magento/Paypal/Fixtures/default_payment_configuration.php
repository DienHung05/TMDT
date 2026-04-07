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

use Magento\Config\Model\Config;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\Encryption\EncryptorInterface;
use Magento\TestFramework\Helper\Bootstrap;
use Magento\TestFramework\Workaround\Override\Fixture\Resolver;

$objectManager = Bootstrap::getObjectManager();

/** @var EncryptorInterface $encryptor */
$encryptor = $objectManager->get(EncryptorInterface::class);

// save payment configuration for the default scope
$configData = [
    'payment/payflowpro/partner' => 'def_partner',
    'payment/payflowpro/vendor' => 'def_vendor',
    'payment/payflowpro/user' => $encryptor->encrypt('def_user'),
    'payment/payflowpro/pwd' => $encryptor->encrypt('def_pwd'),
];
/** @var Config $defConfig */
$defConfig = $objectManager->create(Config::class);
$defConfig->setScope(ScopeConfigInterface::SCOPE_TYPE_DEFAULT);
foreach ($configData as $key => $value) {
    $defConfig->setDataByPath($key, $value);
    $defConfig->save();
}
