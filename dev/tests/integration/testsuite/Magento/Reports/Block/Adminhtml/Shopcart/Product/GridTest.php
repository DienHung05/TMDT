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
namespace Magento\Reports\Block\Adminhtml\Shopcart\Product;

use Magento\Quote\Model\Quote\Item;
use Magento\TestFramework\Helper\Bootstrap;

/**
 * Test class for \Magento\Reports\Block\Adminhtml\Shopcart\Product\Grid
 *
 * @magentoAppArea adminhtml
 * @magentoDataFixture Magento/Sales/_files/quote.php
 * @magentoDataFixture Magento/Customer/_files/customer.php
 */
class GridTest extends \Magento\Reports\Block\Adminhtml\Shopcart\GridTestAbstract
{
    /**
     * @return void
     */
    public function testGridContent()
    {
<<<<<<< HEAD
=======
        $this->markTestSkipped('MC-40448: Product\GridTest failure on 2.4-develop');
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        /** @var \Magento\Framework\View\LayoutInterface $layout */
        $layout = Bootstrap::getObjectManager()->get(\Magento\Framework\View\LayoutInterface::class);
        /** @var Grid $grid */
        $grid = $layout->createBlock(\Magento\Reports\Block\Adminhtml\Shopcart\Product\Grid::class);
        $result = $grid->getPreparedCollection();

        $this->assertCount(1, $result->getItems());
        /** @var Item $quoteItem */
        $quoteItem = $result->getFirstItem();
        $this->assertInstanceOf(\Magento\Quote\Model\Quote\Item::class, $quoteItem);

        $this->assertGreaterThan(0, (int)$quoteItem->getProductId());
        $this->assertEquals('Simple Product', $quoteItem->getName());
    }
}
