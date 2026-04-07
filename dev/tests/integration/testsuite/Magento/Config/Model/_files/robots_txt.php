<?php
/**
<<<<<<< HEAD
 * Copyright 2015 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\Filesystem;
use Magento\TestFramework\Helper\Bootstrap;

/** @var $fileSystem Filesystem */
$fileSystem = Bootstrap::getObjectManager()->get(Filesystem::class);
$pubDirectory = $fileSystem->getDirectoryWrite(DirectoryList::PUB);
$rootDirectory = $fileSystem->getDirectoryRead(DirectoryList::ROOT);
$source = $rootDirectory->getAbsolutePath(__DIR__ . '/robots.txt');
$content = $rootDirectory->readFile(__DIR__ . '/robots.txt');
$pubDirectory->writeFile('robots.txt', $content);
