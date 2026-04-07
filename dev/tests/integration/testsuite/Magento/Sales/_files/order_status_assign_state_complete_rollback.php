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

use Magento\Sales\Model\Order\Status;
use Magento\TestFramework\Helper\Bootstrap;

/** @var Status $orderStatus */
$orderStatus = Bootstrap::getObjectManager()->create(Status::class);
$orderStatus->load('custom_complete', 'status');
$orderStatus->delete();
