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

namespace Magento\Backend\Controller\Adminhtml\Dashboard;

use Magento\TestFramework\TestCase\AbstractBackendController;
use Magento\Framework\App\Request\Http as HttpRequest;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * @magentoAppArea adminhtml
 */
class AjaxBlockTest extends AbstractBackendController
{
    /**
     * Test execute to check render block
     *
     * @param string $block
     * @param string $expectedResult
<<<<<<< HEAD
     */
    #[DataProvider('ajaxBlockDataProvider')]
=======
     *
     * @dataProvider ajaxBlockDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testExecute($block, $expectedResult)
    {
        $this->getRequest()->setMethod(HttpRequest::METHOD_POST);
        $this->getRequest()->setParam('block', $block);

        $this->dispatch('backend/admin/dashboard/ajaxBlock/');

        $this->assertEquals(200, $this->getResponse()->getHttpResponseCode());

        $actual = $this->getResponse()->getBody();

        $this->assertStringContainsString($expectedResult, $actual);
    }

    /**
     * Provides POST data and Expected Result
     *
     * @return array
     */
<<<<<<< HEAD
    public static function ajaxBlockDataProvider(): array
=======
    public function ajaxBlockDataProvider(): array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            [
                'totals',
                'dashboard_diagram_totals'
            ],
            [
                '',
                ''
            ],
            [
                'test_block',
                ''
            ]
        ];
    }
}
