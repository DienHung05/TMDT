<?php
/**
<<<<<<< HEAD
 * Copyright 2016 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
namespace Magento\Directory\Block;

use Magento\TestFramework\Helper\CacheCleaner;

class DataTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Magento\Directory\Block\Data
     */
    private $block;

    protected function setUp(): void
    {
        $objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();
        $this->block = $objectManager->get(\Magento\Directory\Block\Data::class);
    }

    public function testGetCountryHtmlSelect()
    {
        $result = $this->block->getCountryHtmlSelect();
        $resultTwo = $this->block->getCountryHtmlSelect();
        $this->assertEquals($result, $resultTwo);
    }

    public function testGetRegionHtmlSelect()
    {
        $result = $this->block->getRegionHtmlSelect();
        $resultTwo = $this->block->getRegionHtmlSelect();
        $this->assertEquals($result, $resultTwo);
    }
}
