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

use Magento\SendFriend\Model\ResourceModel\SendFriend as SendFriendResource;
use Magento\Store\Api\WebsiteRepositoryInterface;
use Magento\TestFramework\Helper\Bootstrap;

$objectManager = Bootstrap::getObjectManager();
/** @var WebsiteRepositoryInterface $websiteRepository */
$websiteRepository = $objectManager->get(WebsiteRepositoryInterface::class);
$baseWebsiteId = $websiteRepository->get('base')->getId();
$ip =  ip2long('127.0.0.1');
$updateDatetime =  new \DateTime('-0.5 hours');
/** @var SendFriendResource $sendFriendResource */
$sendFriendResource = $objectManager->get(SendFriendResource::class);
$sendFriendResource->addSendItem($ip, $updateDatetime->getTimestamp(), $baseWebsiteId);
