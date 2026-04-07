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
use Magento\Framework\Encryption\EncryptorInterface;
use Magento\Store\Api\WebsiteRepositoryInterface;
use Magento\Store\Model\ScopeInterface;
use Magento\TestFramework\Helper\Bootstrap;
use Magento\TestFramework\Workaround\Override\Fixture\Resolver;

// save payment website config data
Resolver::getInstance()->requireDataFixture('Magento/Store/_files/second_website_with_two_stores.php');

$objectManager = Bootstrap::getObjectManager();
/** @var WebsiteRepositoryInterface $websiteRepository */
$websiteRepository = $objectManager->get(WebsiteRepositoryInterface::class);
$website = $websiteRepository->get('test');
$websiteId = $website->getCode();
/** @var EncryptorInterface $encryptor */
$encryptor = $objectManager->get(EncryptorInterface::class);
$websiteConfigData = [
    'payment/payflowpro/partner' => 'website_partner',
    'payment/payflowpro/vendor' => 'website_vendor',
    'payment/payflowpro/user' => $encryptor->encrypt('website_user'),
    'payment/payflowpro/pwd' => $encryptor->encrypt('website_pwd'),
];
/** @var Config $websiteConfig */
$websiteConfig = $objectManager->create(Config::class);
$websiteConfig->setScope(ScopeInterface::SCOPE_WEBSITES);
$websiteConfig->setWebsite($websiteId);
foreach ($websiteConfigData as $key => $value) {
    $websiteConfig->setDataByPath($key, $value);
    $websiteConfig->save();
}
