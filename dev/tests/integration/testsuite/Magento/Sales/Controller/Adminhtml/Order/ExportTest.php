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

namespace Magento\Sales\Controller\Adminhtml\Order;

<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;

=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
/**
 * Tests for order export via admin grid.
 */
class ExportTest extends ExportBase
{
    /**
     * @magentoDbIsolation disabled
     * @magentoAppArea adminhtml
     * @magentoConfigFixture general/locale/timezone America/Chicago
     * @magentoConfigFixture test_website general/locale/timezone America/Adak
     * @magentoDataFixture Magento/Sales/_files/order_with_invoice_shipment_creditmemo_on_second_website.php
<<<<<<< HEAD
     * @param string $format
     * @return void
     */
    #[DataProvider('exportOrderDataProvider')]
=======
     * @dataProvider exportOrderDataProvider
     * @param string $format
     * @return void
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testExportOrder(string $format): void
    {
        $order = $this->getOrder('200000001');
        $url = $this->getExportUrl($format, null);
        $response = $this->dispatchExport(
            $url,
            ['namespace' => 'sales_order_grid', 'filters' => ['increment_id' => '200000001']]
        );
        $orders = $this->parseResponse($format, $response);
        $exportedOrder = reset($orders);
        $this->assertNotFalse($exportedOrder);
        $this->assertEquals(
            $this->prepareDate($order->getCreatedAt(), 'America/Chicago'),
            $exportedOrder['Purchase Date']
        );
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function exportOrderDataProvider(): array
=======
    public function exportOrderDataProvider(): array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            'order_grid_in_csv' => ['format' => ExportBase::CSV_FORMAT],
            'order_grid_in_xml' => ['format' => ExportBase::XML_FORMAT],
        ];
    }
}
