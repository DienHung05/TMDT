<?php
/**
<<<<<<< HEAD
 * Copyright 2017 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

use \Magento\Framework\App\ObjectManager;
use \Magento\Framework\FlagManager;
use \Magento\Catalog\Model\ResourceModel\Attribute\WebsiteAttributesSynchronizer;

/**
 * @var FlagManager $flagManager
 */
$flagManager = ObjectManager::getInstance()->get(FlagManager::class);
$flagManager->deleteFlag(WebsiteAttributesSynchronizer::FLAG_NAME);
