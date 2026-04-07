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

namespace Magento\Reports\Controller\Adminhtml\Report\Statistics;

/**
 * @magentoAppArea adminhtml
 */
class IndexTest extends \Magento\TestFramework\TestCase\AbstractBackendController
{
    /**
     * Test load page
     */
    public function testExecute()
    {
        $this->dispatch('backend/reports/report_statistics');
        $actual = $this->getResponse()->getBody();
        $this->assertStringContainsString('Never', $actual);
    }
}
