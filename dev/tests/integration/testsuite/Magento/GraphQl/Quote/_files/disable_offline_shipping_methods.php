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
/**
 * @deprecated use next @magentoConfigFixture instead:
 * @magentoConfigFixture default_store carriers/flatrate/active 0
 * @magentoConfigFixture default_store carriers/tablerate/active 0
 * @magentoConfigFixture default_store carriers/freeshipping/active 0
 */
declare(strict_types=1);

use Magento\Framework\App\Config\Storage\Writer;
use Magento\Framework\App\Config\Storage\WriterInterface;
use Magento\TestFramework\Helper\Bootstrap;
use Magento\Framework\App\Config\ScopeConfigInterface;

$objectManager = Bootstrap::getObjectManager();
/** @var Writer $configWriter */
$configWriter = $objectManager->get(WriterInterface::class);

$configWriter->save('carriers/flatrate/active', 0);
$configWriter->save('carriers/tablerate/active', 0);
$configWriter->save('carriers/freeshipping/active', 0);

$scopeConfig = $objectManager->get(ScopeConfigInterface::class);
$scopeConfig->clean();
