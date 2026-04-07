<?php
/**
<<<<<<< HEAD
 * Copyright 2015 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 *
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

namespace Magento\Integration\Block\Adminhtml\Integration;

use Magento\TestFramework\Helper\Bootstrap;

/**
 * Test class for \Magento\Integration\Block\Adminhtml\Integration\Grid
 *
 * @magentoAppArea adminhtml
 */
class GridTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Magento\Integration\Block\Adminhtml\Integration\Grid
     */
    protected $gridBlock;

    protected function setUp(): void
    {
        $this->gridBlock = Bootstrap::getObjectManager()
            ->create(\Magento\Integration\Block\Adminhtml\Integration\Grid::class);
    }

    public function testGetRowClickCallback()
    {
        $this->assertEquals('', $this->gridBlock->getRowClickCallback());
    }

    public function testGetRowInitCallback()
    {
        $this->assertEquals('', $this->gridBlock->getRowInitCallback());
    }
}
