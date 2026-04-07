<?php
/**
<<<<<<< HEAD
 * Copyright 2025 Adobe
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

$configWriter->delete('carriers/usps/active');
$configWriter->delete(\Magento\Sales\Model\Order\Shipment::XML_PATH_STORE_ZIP);
<<<<<<< HEAD
$configWriter->delete(\Magento\Sales\Model\Order\Shipment::XML_PATH_STORE_ZIP);
$configWriter->delete('carriers/usps/usps_type');
$configWriter->delete('carriers/usps/allowed_methods');
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
