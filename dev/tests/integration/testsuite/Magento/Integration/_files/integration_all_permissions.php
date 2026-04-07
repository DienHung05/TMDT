<?php
/**
<<<<<<< HEAD
 * Copyright 2015 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

/** @var $integration \Magento\Integration\Model\Integration */
$objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();
$integration = $objectManager->create(\Magento\Integration\Model\Integration::class);
$integration->setName('Fixture Integration')->save();

/** Grant permissions to integrations */
/** @var \Magento\Integration\Api\AuthorizationServiceInterface */
$authorizationService = $objectManager->create(\Magento\Integration\Api\AuthorizationServiceInterface::class);
$authorizationService->grantAllPermissions($integration->getId());
