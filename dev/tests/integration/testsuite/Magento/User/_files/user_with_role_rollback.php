<?php
/**
<<<<<<< HEAD
 * Copyright 2016 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

use Magento\TestFramework\Helper\Bootstrap;
use Magento\User\Model\User;

/** @var $model \Magento\User\Model\User */
$model = Bootstrap::getObjectManager()->create(User::class);
$user = $model->loadByUsername('adminUser');
if ($user->getId()) {
    $model->delete();
}
