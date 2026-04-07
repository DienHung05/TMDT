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
namespace Magento\Theme\Model\Theme\Source;

use Magento\TestFramework\Helper\Bootstrap;

/**
 * Theme Test
 *
 */
class ThemeTest extends \PHPUnit\Framework\TestCase
{
    public function testGetAllOptions()
    {
        /** @var $model \Magento\Theme\Model\Theme\Source\Theme */
        $model = Bootstrap::getObjectManager()->create(\Magento\Theme\Model\Theme\Source\Theme::class);

        /** @var $expectedCollection \Magento\Theme\Model\Theme\Collection */
        $expectedCollection = Bootstrap::getObjectManager()
            ->create(\Magento\Theme\Model\ResourceModel\Theme\Collection::class);
        $expectedCollection->addFilter('area', 'frontend');

        $expectedItemsCount = count($expectedCollection);

        $labelsCollection = $model->getAllOptions(false);
        $this->assertEquals($expectedItemsCount, count($labelsCollection));

        $labelsCollection = $model->getAllOptions(true);
        $this->assertEquals(++$expectedItemsCount, count($labelsCollection));
    }
}
