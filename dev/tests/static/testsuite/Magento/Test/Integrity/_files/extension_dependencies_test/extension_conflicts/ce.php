<?php
/**
<<<<<<< HEAD
 * Copyright 2022 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

return [
    // the following modules must be disabled when Live Search is used
    // so core modules must not be dependent on them
    'Magento\LiveSearch' => [
        'Magento\Elasticsearch',
<<<<<<< HEAD
        'Magento\Elasticsearch8',
        'Magento\OpenSearch'
=======
        'Magento\Elasticsearch6',
        'Magento\Elasticsearch7',
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    ],
];
