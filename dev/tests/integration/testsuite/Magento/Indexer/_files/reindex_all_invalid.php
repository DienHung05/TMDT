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

use Magento\Indexer\Model\Processor;
use Magento\TestFramework\Helper\Bootstrap;

/** @var Processor $processor */
$processor = Bootstrap::getObjectManager()->get(Processor::class);
$processor->reindexAllInvalid();
