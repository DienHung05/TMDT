<?php
/**
<<<<<<< HEAD
 * Copyright 2015 Adobe
 * All Rights Reserved.
 */
declare(strict_types=1);

=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
namespace Magento\Sales\Service\V1;

use Magento\Sales\Api\Data\InvoiceCommentInterface;
use Magento\TestFramework\TestCase\WebapiAbstract;

<<<<<<< HEAD
=======
/**
 * Class InvoiceAddCommentTest
 */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
class InvoiceAddCommentTest extends WebapiAbstract
{
    /**
     * Service read name
     */
<<<<<<< HEAD
    public const SERVICE_READ_NAME = 'salesInvoiceCommentRepositoryV1';
=======
    const SERVICE_READ_NAME = 'salesInvoiceCommentRepositoryV1';
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

    /**
     * Service version
     */
<<<<<<< HEAD
    public const SERVICE_VERSION = 'V1';
=======
    const SERVICE_VERSION = 'V1';
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

    /**
     * Test invoice add comment service
     *
     * @magentoApiDataFixture Magento/Sales/_files/invoice.php
     */
    public function testInvoiceAddComment()
    {
        $objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();
        /** @var \Magento\Sales\Model\Order\Invoice $invoice */
        $invoiceCollection = $objectManager->get(\Magento\Sales\Model\ResourceModel\Order\Invoice\Collection::class);
        $invoice = $invoiceCollection->getFirstItem();

        $commentData = [
            InvoiceCommentInterface::COMMENT => 'Hello world!',
            InvoiceCommentInterface::ENTITY_ID => null,
            InvoiceCommentInterface::CREATED_AT => null,
            InvoiceCommentInterface::PARENT_ID => $invoice->getId(),
            InvoiceCommentInterface::IS_VISIBLE_ON_FRONT => 1,
<<<<<<< HEAD
            InvoiceCommentInterface::IS_CUSTOMER_NOTIFIED => 1
=======
            InvoiceCommentInterface::IS_CUSTOMER_NOTIFIED => 1,
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        ];

        $requestData = ['entity' => $commentData];
        $serviceInfo = [
            'rest' => [
                'resourcePath' => '/V1/invoices/comments',
                'httpMethod' => \Magento\Framework\Webapi\Rest\Request::HTTP_METHOD_POST,
            ],
            'soap' => [
                'service' => self::SERVICE_READ_NAME,
                'serviceVersion' => self::SERVICE_VERSION,
                'operation' => self::SERVICE_READ_NAME . 'save',
            ],
        ];

        $result = $this->_webApiCall($serviceInfo, $requestData);
        $this->assertNotEmpty($result);
    }
}
