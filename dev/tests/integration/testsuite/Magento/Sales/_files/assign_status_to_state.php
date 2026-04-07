<?php
/**
<<<<<<< HEAD
 * Copyright 2014 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

/** @var \Magento\Sales\Model\Order\Status $status */
$status = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
    \Magento\Sales\Model\Order\Status::class
);
$status->setData(
    [
        'status' => 'fake_status_do_not_use_it',
        'label' => 'Fake status do not use it',
    ]
);
$status->save();
$status->assignState('fake_state_do_not_use_it', true, true);
