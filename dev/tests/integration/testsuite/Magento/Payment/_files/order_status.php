<?php
/**
<<<<<<< HEAD
 * Copyright 2013 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

/** @var \Magento\Sales\Model\Order\Status $status */
$status = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(\Magento\Sales\Model\Order\Status::class);
//status for state new
$status->setData('status', 'custom_new_status')->setData('label', 'Test Status')->save();
$status->assignState(\Magento\Sales\Model\Order::STATE_NEW, true);
//status for state canceled
$status->setData('status', 'custom_canceled_status')->setData('label', 'Test Status')->unsetData('id')->save();
$status->assignState(\Magento\Sales\Model\Order::STATE_CANCELED, true);
