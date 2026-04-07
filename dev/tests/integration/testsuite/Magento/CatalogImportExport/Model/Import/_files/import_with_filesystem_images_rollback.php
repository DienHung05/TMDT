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

/** @var \Magento\Framework\Filesystem $fileSystem */
$fileSystem = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->get(
    \Magento\Framework\Filesystem::class
);
/** @var \Magento\Framework\Filesystem\Directory\Write $mediaDirectory */
$mediaDirectory = $fileSystem->getDirectoryWrite(
    \Magento\Framework\App\Filesystem\DirectoryList::MEDIA
);
/** @var \Magento\Framework\Filesystem\Directory\Write $varDirectory */
$varDirectory = $fileSystem->getDirectoryWrite(
    \Magento\Framework\App\Filesystem\DirectoryList::VAR_DIR
);
$varDirectory->delete('import');
$mediaDirectory->delete('catalog');
