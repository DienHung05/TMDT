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

declare(strict_types=1);

use Magento\Cms\Model\Page;
use Magento\Cms\Model\ResourceModel\Page as PageResource;
use Magento\TestFramework\Helper\Bootstrap;

$objectManager = Bootstrap::getObjectManager();

/**
 * @var Page $page
 * @var PageResource $pageResource
 */
$page = $objectManager->create(Page::class);
$pageResource = $objectManager->create(PageResource::class);

$pageResource->load($page, 'no-route', 'identifier');
$page->setIsActive(0);
$pageResource->save($page);
