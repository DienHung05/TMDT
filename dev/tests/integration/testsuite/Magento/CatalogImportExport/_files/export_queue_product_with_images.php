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

use Magento\Catalog\Api\Data\ProductAttributeInterface;
use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Framework\MessageQueue\PublisherInterface;
use Magento\ImportExport\Model\Export\Entity\ExportInfoFactory;
use Magento\TestFramework\Helper\Bootstrap;
use Magento\TestFramework\Workaround\Override\Fixture\Resolver;

Resolver::getInstance()->requireDataFixture('Magento/Catalog/_files/product_with_image.php');

$objectManager = Bootstrap::getObjectManager();
/** @var ExportInfoFactory $exportInfoFactory */
$exportInfoFactory = $objectManager->get(ExportInfoFactory::class);
/** @var PublisherInterface $messagePublisher */
$messagePublisher = $objectManager->get(PublisherInterface::class);
$dataObject = $exportInfoFactory->create(
    'csv',
    ProductAttributeInterface::ENTITY_TYPE_CODE,
    [ProductInterface::SKU => 'simple'],
    []
);
$messagePublisher->publish('import_export.export', $dataObject);
