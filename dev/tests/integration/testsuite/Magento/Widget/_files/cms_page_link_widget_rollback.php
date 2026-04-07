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
use Magento\Widget\Model\Widget\InstanceFactory;
use Magento\Widget\Model\Widget\Instance;

$objectManager = Bootstrap::getObjectManager();

/** @var InstanceFactory $widgetModelFactory */
$widgetModelFactory = $objectManager->get(InstanceFactory::class);
/** @var Instance $widgetModel */
$widgetModel = $widgetModelFactory->create();
$widgetModel->load('Test Widget', 'title');

if ($widgetModel->getId()) {
    $widgetModel->delete();
}
