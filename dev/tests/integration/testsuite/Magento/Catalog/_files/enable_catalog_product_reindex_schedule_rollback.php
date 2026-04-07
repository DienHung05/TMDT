<?php
/**
<<<<<<< HEAD
 * Copyright 2018 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

use Magento\Framework\Indexer\IndexerRegistry;
use Magento\TestFramework\Helper\Bootstrap;

/** @var IndexerRegistry $indexRegistry */
$indexRegistry = Bootstrap::getObjectManager()->get(IndexerRegistry::class);

$model = $indexRegistry->get('catalog_category_product');
$model->setScheduled(false);

$model = $indexRegistry->get('catalog_product_category');
$model->setScheduled(false);
