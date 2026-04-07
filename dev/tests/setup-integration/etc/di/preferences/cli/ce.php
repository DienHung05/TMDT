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

use Magento\Framework as MF;
use Magento\TestFramework as TF;

return [
    MF\App\AreaList::class => TF\App\AreaList::class,
    MF\Mview\TriggerCleaner::class => TF\Mview\DummyTriggerCleaner::class,
];
