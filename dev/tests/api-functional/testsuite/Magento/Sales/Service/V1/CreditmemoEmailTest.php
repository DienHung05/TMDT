<?php
/**
<<<<<<< HEAD
 * Copyright 2015 Adobe
 * All Rights Reserved.
 */
namespace Magento\Sales\Service\V1;

use Magento\Framework\Webapi\Rest\Request;
use Magento\Sales\Model\ResourceModel\Order\Creditmemo\Collection;
use Magento\TestFramework\Helper\Bootstrap;
use Magento\TestFramework\TestCase\WebapiAbstract;

/**
 * Test API call /creditmemo/{id}/emails
 */
class CreditmemoEmailTest extends WebapiAbstract
{
    private const SERVICE_VERSION = 'V1';

    private const SERVICE_NAME = 'salesCreditmemoManagementV1';
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Sales\Service\V1;

use Magento\TestFramework\TestCase\WebapiAbstract;

/**
 * Class CreditmemoEmailTest
 */
class CreditmemoEmailTest extends WebapiAbstract
{
    const SERVICE_VERSION = 'V1';

    const SERVICE_NAME = 'salesCreditmemoManagementV1';

    const CREDITMEMO_INCREMENT_ID = '100000001';
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

    /**
     * @magentoApiDataFixture Magento/Sales/_files/creditmemo_with_list.php
     */
    public function testCreditmemoEmail()
    {
<<<<<<< HEAD
        $objectManager = Bootstrap::getObjectManager();

        /** @var Collection $creditmemoCollection */
        $creditmemoCollection = $objectManager->get(
            Collection::class
=======
        $objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();

        /** @var \Magento\Sales\Model\ResourceModel\Order\Creditmemo\Collection $creditmemoCollection */
        $creditmemoCollection = $objectManager->get(
            \Magento\Sales\Model\ResourceModel\Order\Creditmemo\Collection::class
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        );
        $creditmemo = $creditmemoCollection->getFirstItem();
        $serviceInfo = [
            'rest' => [
                'resourcePath' => '/V1/creditmemo/' . $creditmemo->getId() . '/emails',
<<<<<<< HEAD
                'httpMethod' => Request::HTTP_METHOD_POST,
=======
                'httpMethod' => \Magento\Framework\Webapi\Rest\Request::HTTP_METHOD_POST,
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            ],
            'soap' => [
                'service' => self::SERVICE_NAME,
                'serviceVersion' => self::SERVICE_VERSION,
                'operation' => self::SERVICE_NAME . 'notify',
            ],
        ];
        $requestData = ['id' => $creditmemo->getId()];
<<<<<<< HEAD
        $result = $this->_webApiCall($serviceInfo, $requestData);
        $this->assertTrue($result);
=======
        $this->_webApiCall($serviceInfo, $requestData);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }
}
