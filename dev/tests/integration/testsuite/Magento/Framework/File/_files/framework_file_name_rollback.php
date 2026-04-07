<?php
/**
<<<<<<< HEAD
 * Copyright 2021 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

use Magento\Framework\App\Filesystem\DirectoryList;

$fileSystem = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->get(
    \Magento\Framework\Filesystem::class
);
/** @var \Magento\Framework\Filesystem\Directory\WriteInterface $mediaDirectory */
$mediaDirectory = $fileSystem->getDirectoryWrite(DirectoryList::MEDIA);
/** @var \Magento\Framework\Filesystem\Directory\WriteInterface $varDirectory */
$varDirectory = $fileSystem->getDirectoryWrite(DirectoryList::VAR_DIR);

$mediaDirectory->delete('image');
$varDirectory->delete('image');
