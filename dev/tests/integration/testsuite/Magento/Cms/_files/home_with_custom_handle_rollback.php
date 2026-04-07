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
declare(strict_types=1);

use Magento\Cms\Api\PageRepositoryInterface;
use Magento\Cms\Model\Page\CustomLayout\CustomLayoutRepository;
use Magento\TestFramework\Helper\Bootstrap;

$objectManager = Bootstrap::getObjectManager();

/** @var PageRepositoryInterface $pageRepository */
$pageRepository = $objectManager->get(PageRepositoryInterface::class);
$cmsPage = $pageRepository->getById('home');
$cmsPageId = (int)$cmsPage->getId();

/** @var CustomLayoutRepository $customLayoutRepository */
$customLayoutRepository = $objectManager->get(CustomLayoutRepository::class);
$customLayoutRepository->deleteFor($cmsPageId);
