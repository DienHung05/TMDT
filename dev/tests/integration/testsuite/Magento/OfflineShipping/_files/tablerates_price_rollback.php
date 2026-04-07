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

use Magento\OfflineShipping\Model\ResourceModel\Carrier\Tablerate;
use Magento\TestFramework\Helper\Bootstrap;

$objectManager = Bootstrap::getObjectManager();
$resourceModel = $objectManager->create(Tablerate::class);
$resourceModel->getConnection()->delete($resourceModel->getMainTable());
