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

use Magento\Framework\App\Config\Storage\Writer;
use Magento\Framework\App\Config\Storage\WriterInterface;
use Magento\TestFramework\Helper\Bootstrap;

$objectManager = Bootstrap::getObjectManager();
/** @var Writer  $configWriter */
$configWriter = $objectManager->create(WriterInterface::class);

$configWriter->delete('carriers/fedex/active');
$configWriter->delete('carriers/fedex/account');
$configWriter->delete('carriers/fedex/meter_number');
$configWriter->delete('carriers/fedex/key');
$configWriter->delete('carriers/fedex/password');
$configWriter->delete('carriers/fedex/sandbox_mode');
$configWriter->delete(\Magento\Sales\Model\Order\Shipment::XML_PATH_STORE_ZIP);
