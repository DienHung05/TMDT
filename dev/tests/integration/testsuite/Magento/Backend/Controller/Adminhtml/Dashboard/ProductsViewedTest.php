<?php
/**
<<<<<<< HEAD
 * Copyright 2015 Adobe
 * All Rights Reserved.
=======
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

namespace Magento\Backend\Controller\Adminhtml\Dashboard;

/**
 * Test product viewed backend controller.
 */
class ProductsViewedTest extends \Magento\TestFramework\TestCase\AbstractBackendController
{
    /**
     * @magentoAppArea adminhtml
     * @magentoDataFixture Magento/Reports/_files/viewed_products.php
     * @magentoConfigFixture default/reports/options/enabled 1
     */
    public function testExecute()
    {
        $this->getRequest()->setMethod("POST");
        $this->dispatch('backend/admin/dashboard/productsViewed/');

        $this->assertEquals(200, $this->getResponse()->getHttpResponseCode());

        $actual = $this->getResponse()->getBody();
        $this->assertStringContainsString('Simple Product', $actual);
    }
}
