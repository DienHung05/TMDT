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

use Magento\Sales\Api\Data\ShipmentCommentInterface;
use Magento\TestFramework\TestCase\WebapiAbstract;

<<<<<<< HEAD
=======
/**
 * Class ShipmentAddCommentTest
 */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
class ShipmentAddCommentTest extends WebapiAbstract
{
    /**
     * Service read name
     */
<<<<<<< HEAD
    public const SERVICE_READ_NAME = 'salesShipmentCommentRepositoryV1';
=======
    const SERVICE_READ_NAME = 'salesShipmentCommentRepositoryV1';
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
     * Shipment increment id
     */
<<<<<<< HEAD
    public const SHIPMENT_INCREMENT_ID = '100000001';
=======
    const SHIPMENT_INCREMENT_ID = '100000001';
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

    /**
     * @var \Magento\Framework\ObjectManagerInterface
     */
    protected $objectManager;

    protected function setUp(): void
    {
        $this->objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();
    }

    /**
     * Test shipment add comment service
<<<<<<< HEAD
=======
     *
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @magentoApiDataFixture Magento/Sales/_files/shipment.php
     */
    public function testShipmentAddComment()
    {
        /** @var \Magento\Sales\Model\ResourceModel\Order\Shipment\Collection $shipmentCollection */
        $shipmentCollection = $this->objectManager->get(
            \Magento\Sales\Model\ResourceModel\Order\Shipment\Collection::class
        );
        $shipment = $shipmentCollection->getFirstItem();

        $commentData = [
            ShipmentCommentInterface::COMMENT => 'Hello world!',
            ShipmentCommentInterface::ENTITY_ID => null,
            ShipmentCommentInterface::CREATED_AT => null,
            ShipmentCommentInterface::PARENT_ID => $shipment->getId(),
            ShipmentCommentInterface::IS_VISIBLE_ON_FRONT => 1,
<<<<<<< HEAD
            ShipmentCommentInterface::IS_CUSTOMER_NOTIFIED => 1
=======
            ShipmentCommentInterface::IS_CUSTOMER_NOTIFIED => 1,
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        ];

        $requestData = ['entity' => $commentData];
        $serviceInfo = [
            'rest' => [
                'resourcePath' => '/V1/shipment/' . $shipment->getId() . '/comments',
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
