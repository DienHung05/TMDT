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

use Magento\TestFramework\Helper\Bootstrap;
use Magento\Widget\Model\ResourceModel\Widget\Instance;
use Magento\Widget\Model\ResourceModel\Widget\Instance\CollectionFactory;

$objectManager = Bootstrap::getObjectManager();
/** @var CollectionFactory $collectionFactory */
$collectionFactory = $objectManager->get(CollectionFactory::class);
/** @var Instance $widgetResourceModel */
$widgetResourceModel = $objectManager->get(Instance::class);

$widget = $collectionFactory->create()->addFieldToFilter('title', 'New Sample widget title')->getFirstItem();
if ($widget->getInstanceId()) {
    $widgetResourceModel->delete($widget);
}
