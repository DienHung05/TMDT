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

use Magento\Framework\App\Bootstrap;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Setup\Mvc\Bootstrap\InitParamListener;

return [
    InitParamListener::BOOTSTRAP_PARAM => array_merge(
        $_SERVER,
        [
            Bootstrap::INIT_PARAM_FILESYSTEM_DIR_PATHS => [
                DirectoryList::ROOT => [
                    DirectoryList::PATH => BP
                ]
            ]
        ]
    )
];
