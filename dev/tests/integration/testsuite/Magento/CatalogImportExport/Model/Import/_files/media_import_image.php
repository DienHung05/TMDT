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

/** @var \Magento\Framework\Filesystem\Directory\Write $mediaDirectory */
$mediaDirectory = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->get(
    \Magento\Framework\Filesystem::class
)->getDirectoryWrite(
    \Magento\Framework\App\Filesystem\DirectoryList::MEDIA
);
$mediaDirectory->create('import/m/a');
$dirPath = $mediaDirectory->getAbsolutePath('import/m/a');
$driver = $mediaDirectory->getDriver();
$driver->createDirectory($dirPath);
$driver->filePutContents(
    $dirPath . '/magento_image.jpg',
    file_get_contents(__DIR__ . '/../../../../../Magento/Catalog/_files/magento_image.jpg')
);
