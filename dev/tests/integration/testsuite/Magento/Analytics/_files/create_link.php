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
$objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();

/**
 * @var $fileInfoManager \Magento\Analytics\Model\FileInfoManager
 */
$fileInfoManager = $objectManager->create(\Magento\Analytics\Model\FileInfoManager::class);

/**
 * @var $fileInfo \Magento\Analytics\Model\FileInfo
 */
$fileInfo = $objectManager->create(
    \Magento\Analytics\Model\FileInfo::class,
    ['path' => 'analytics/jsldjsfdkldf/data.tgz', 'initializationVector' => 'binaryDataisdodssds8iui']
);

$fileInfoManager->save($fileInfo);
