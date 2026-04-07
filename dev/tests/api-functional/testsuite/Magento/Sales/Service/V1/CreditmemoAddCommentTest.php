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

use Magento\Sales\Api\Data\CreditmemoCommentInterface as Comment;
use Magento\TestFramework\TestCase\WebapiAbstract;

<<<<<<< HEAD
=======
/**
 * Class CreditmemoAddCommentTest
 */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
class CreditmemoAddCommentTest extends WebapiAbstract
{
    /**
     * Service read name
     */
<<<<<<< HEAD
    public const SERVICE_READ_NAME = 'salesCreditmemoCommentRepositoryV1';
=======
    const SERVICE_READ_NAME = 'salesCreditmemoCommentRepositoryV1';
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
     * Creditmemo increment id
     */
<<<<<<< HEAD
    public const CREDITMEMO_INCREMENT_ID = '100000001';
=======
    const CREDITMEMO_INCREMENT_ID = '100000001';
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

    /**
     * @var \Magento\Framework\ObjectManagerInterface
     */
    protected $objectManager;

    /**
     * Set up
     *
     * @return void
     */
    protected function setUp(): void
    {
        $this->objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();
    }

    /**
     * Test creditmemo add comment service
     *
     * @magentoApiDataFixture Magento/Sales/_files/creditmemo_with_list.php
     */
    public function testCreditmemoAddComment()
    {
        /** @var \Magento\Sales\Model\ResourceModel\Order\Creditmemo\Collection $creditmemoCollection */
        $creditmemoCollection =
            $this->objectManager->get(\Magento\Sales\Model\ResourceModel\Order\Creditmemo\Collection::class);
        $creditmemo = $creditmemoCollection->getFirstItem();

        $commentData = [
            Comment::COMMENT => 'Hello world!',
            Comment::ENTITY_ID => null,
            Comment::CREATED_AT => null,
            Comment::PARENT_ID => $creditmemo->getId(),
            Comment::IS_VISIBLE_ON_FRONT => 1,
<<<<<<< HEAD
            Comment::IS_CUSTOMER_NOTIFIED => 1
=======
            Comment::IS_CUSTOMER_NOTIFIED => 1,
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        ];

        $requestData = ['entity' => $commentData];
        $serviceInfo = [
            'rest' => [
                'resourcePath' => '/V1/creditmemo/' . $creditmemo->getId() . '/comments',
                'httpMethod' => \Magento\Framework\Webapi\Rest\Request::HTTP_METHOD_POST,
            ],
            'soap' => [
                'service' => self::SERVICE_READ_NAME,
                'serviceVersion' => self::SERVICE_VERSION,
                'operation' => self::SERVICE_READ_NAME . 'save',
            ],
        ];

        $result = $this->_webApiCall($serviceInfo, $requestData);

        self::assertNotEmpty($result);
        self::assertNotEmpty($result[Comment::ENTITY_ID]);
        self::assertEquals($creditmemo->getId(), $result[Comment::PARENT_ID]);
    }
}
