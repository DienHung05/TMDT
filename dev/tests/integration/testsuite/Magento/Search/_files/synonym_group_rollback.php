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

use Magento\Search\Model\ResourceModel\SynonymGroup\Collection;
use Magento\TestFramework\Helper\Bootstrap;
use Magento\Search\Model\SynonymGroupRepository;

$objectManager = Bootstrap::getObjectManager();

$synonymGroupModel = $objectManager->get(Collection::class)->getLastItem();

$synonymGroupRepository=$objectManager->create(SynonymGroupRepository::class);
$synonymGroupRepository->delete($synonymGroupModel);
