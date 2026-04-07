<?php
/**
<<<<<<< HEAD
 * Copyright 2017 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

namespace Magento\Reports\Controller\Adminhtml\Report\Product;

/**
 * @magentoAppArea adminhtml
 */
class SoldTest extends \Magento\TestFramework\TestCase\AbstractBackendController
{
    public function testExecute()
    {
        $this->dispatch('backend/reports/report_product/sold');
        $actual = $this->getResponse()->getBody();
        $this->assertStringContainsString('Ordered Products Report', $actual);
        //verify if SKU column is presented on grid
        $this->assertStringContainsString('SKU', $actual);
    }
}
