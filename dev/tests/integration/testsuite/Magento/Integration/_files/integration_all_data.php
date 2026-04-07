<?php
/**
<<<<<<< HEAD
 * Copyright 2021 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

use Magento\Integration\Api\IntegrationServiceInterface;
use Magento\TestFramework\Helper\Bootstrap;

$objectManager = Bootstrap::getObjectManager();
$integrationService = $objectManager->get(IntegrationServiceInterface::class);

$data = [
    'name' => 'Fixture Integration',
    'email' => 'john.doe@example.com',
<<<<<<< HEAD
    'endpoint' => 'http://localhost/endpoint',
    'identity_link_url' => 'http://localhost/link',
=======
    'endpoint' => 'https://example.com/endpoint',
    'identity_link_url' => 'https://example.com/link',
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    'all_resources' => 0,
];
$integrationService->create($data);
