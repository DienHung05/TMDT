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

use Magento\Cms\Model\Block;
use Magento\Store\Model\StoreManagerInterface;
use Magento\TestFramework\Helper\Bootstrap;

/** @var $block Block */
$block = Bootstrap::getObjectManager()->create(Block::class);
$block->setTitle(
    'CMS Block Title'
)->setIdentifier(
    'fixture_block_with_asset'
)->setContent(
    'content {{media url="testDirectory/path.jpg"}} content'
)->setIsActive(
    1
)->setStores(
    [
        Bootstrap::getObjectManager()->get(StoreManagerInterface::class)->getStore()->getId()
    ]
)->save();
