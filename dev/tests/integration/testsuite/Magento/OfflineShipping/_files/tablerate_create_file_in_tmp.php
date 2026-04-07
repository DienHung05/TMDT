<?php
/**
<<<<<<< HEAD
 * Copyright 2019 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\Filesystem;
use Magento\TestFramework\Helper\Bootstrap;
use Magento\Framework\Filesystem\Directory\WriteInterface;

$importCsv = 'tablerates.csv';
$objectManager = Bootstrap::getObjectManager();
/** @var Filesystem $fileSystem */
$fileSystem = $objectManager->get(Filesystem::class);
/** @var WriteInterface $tmpDirectory */
$tmpDirectory = $fileSystem->getDirectoryWrite(DirectoryList::SYS_TMP);
$importCsvPath = $tmpDirectory->getAbsolutePath($importCsv);

$fixtureDir = realpath(__DIR__);
copy($fixtureDir . DIRECTORY_SEPARATOR . $importCsv, $importCsvPath);
