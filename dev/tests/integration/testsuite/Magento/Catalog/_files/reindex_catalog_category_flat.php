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

use Magento\Catalog\Model\Indexer\Category\Flat\State;
use Magento\Indexer\Model\Indexer;
use Magento\TestFramework\Helper\Bootstrap;

$objectManager = Bootstrap::getObjectManager();
/** @var Indexer $indexer */
$indexer = $objectManager->get(Indexer::class);
$indexer->load(State::INDEXER_ID);
$indexer->reindexAll();
