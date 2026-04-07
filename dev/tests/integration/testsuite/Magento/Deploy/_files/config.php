<?php
/**
<<<<<<< HEAD
 * Copyright 2017 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
return [
    'scopes' => [
        'websites' => []
    ],
    /**
     * Shared configuration was written to config.php and system-specific configuration to env.php.
     * Shared configuration file (config.php) doesn't contain sensitive data for security reasons.
     * Sensitive data can be stored in the following environment variables:
     * CONFIG__DEFAULT__SOME__CONFIG__PATH_ONE for some/config/path_one
     * CONFIG__DEFAULT__SOME__CONFIG__PATH_TWO for some/config/path_two
     * CONFIG__DEFAULT__SOME__CONFIG__PATH_THREE for some/config/path_three
     */
    'system' => [],
    'integrationTestImporter' => [
        'someGroup' => [
            'someField' => 'testValue',
        ]
    ],
    'integrationTestSecondImporter' => [
        'someGroup' => [
            'someField' => 'testSecondValue',
        ]
    ],
];
