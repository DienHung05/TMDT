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

namespace Magento\Sales\Controller\Adminhtml\Order\Invoice;

use Magento\Sales\Api\Data\InvoiceInterface;
use Magento\Sales\Api\Data\InvoiceInterfaceFactory;
use Magento\Sales\Controller\Adminhtml\Order\ExportBase;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * Tests for invoice export via admin grids.
 */
class ExportTest extends ExportBase
{
    /**
     * @var InvoiceInterfaceFactory
     */
    private $invoiceFactory;

    /**
     * @inheritdoc
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->invoiceFactory = $this->_objectManager->get(InvoiceInterfaceFactory::class);
    }

    /**
     * @magentoDbIsolation disabled
     * @magentoAppArea adminhtml
     * @magentoConfigFixture general/locale/timezone America/Chicago
     * @magentoConfigFixture test_website general/locale/timezone America/Adak
     * @magentoDataFixture Magento/Sales/_files/order_with_invoice_shipment_creditmemo_on_second_website.php
<<<<<<< HEAD
=======
     * @dataProvider exportInvoiceDataProvider
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @param string $format
     * @param bool $addIdToUrl
     * @param string $namespace
     * @return void
     */
<<<<<<< HEAD
    #[DataProvider('exportInvoiceDataProvider')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testExportInvoice(
        string $format,
        bool $addIdToUrl,
        string $namespace
    ): void {
        $order = $this->getOrder('200000001');
        $url = $this->getExportUrl($format, $addIdToUrl ? (int)$order->getId() : null);
        $response = $this->dispatchExport(
            $url,
            ['namespace' => $namespace, 'filters' => ['order_increment_id' => '200000001']]
        );
        $invoices = $this->parseResponse($format, $response);
        $invoice = $this->getInvoice('200000001');
        $exportedInvoice = reset($invoices);
        $this->assertNotFalse($exportedInvoice);
        $this->assertEquals(
            $this->prepareDate($invoice->getCreatedAt(), 'America/Chicago'),
            $exportedInvoice['Invoice Date']
        );
        $this->assertEquals(
            $this->prepareDate($order->getCreatedAt(), 'America/Chicago'),
            $exportedInvoice['Order Date']
        );
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function exportInvoiceDataProvider(): array
=======
    public function exportInvoiceDataProvider(): array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            'invoice_grid_in_csv' => [
                'format' => ExportBase::CSV_FORMAT,
<<<<<<< HEAD
                'addIdToUrl' => false,
=======
                'add_id_to_url' => false,
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                'namespace' => 'sales_order_invoice_grid',
            ],
            'invoice_grid_in_csv_from_order_view' => [
                'format' => ExportBase::CSV_FORMAT,
<<<<<<< HEAD
                'addIdToUrl' => true,
=======
                'add_id_to_url' => true,
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                'namespace' => 'sales_order_view_invoice_grid',
            ],
            'invoice_grid_in_xml' => [
                'format' => ExportBase::XML_FORMAT,
<<<<<<< HEAD
                'addIdToUrl' => false,
=======
                'add_id_to_url' => false,
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                'namespace' => 'sales_order_invoice_grid',
            ],
            'invoice_grid_in_xml_from_order_view' => [
                'format' => ExportBase::XML_FORMAT,
<<<<<<< HEAD
                'addIdToUrl' => true,
=======
                'add_id_to_url' => true,
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                'namespace' => 'sales_order_view_invoice_grid',
            ],
        ];
    }

    /**
     * Returns invoice by increment id.
     *
     * @param string $incrementId
     * @return InvoiceInterface
     */
    private function getInvoice(string $incrementId): InvoiceInterface
    {
        return $this->invoiceFactory->create()->loadByIncrementId($incrementId);
    }
}
