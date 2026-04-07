<?php
/**
<<<<<<< HEAD
 * Copyright 2016 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

$objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();
$resource = $objectManager->get(\Magento\Framework\App\ResourceConnection::class);
$connection = $resource->getConnection();
$resourceModel = $objectManager->create(\Magento\OfflineShipping\Model\ResourceModel\Carrier\Tablerate::class);
$entityTable = $resourceModel->getTable('shipping_tablerate');
$connection->query("DELETE FROM {$entityTable};");
