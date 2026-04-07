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

namespace Magento\AsynchronousOperations\Api;

<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
use Magento\Framework\Webapi\Rest\Request;
use Magento\TestFramework\TestCase\WebapiAbstract;
use Magento\Framework\Bulk\OperationInterface;

class BulkStatusInterfaceTest extends WebapiAbstract
{
<<<<<<< HEAD
    public const RESOURCE_PATH = '/V1/bulk/';
    public const SERVICE_NAME = 'asynchronousOperationsBulkStatusV1';
    public const GET_COUNT_OPERATION_NAME = "getOperationsCountByBulkIdAndStatus";

    /**
     * @magentoApiDataFixture Magento/AsynchronousOperations/_files/operation_searchable.php
=======
    const RESOURCE_PATH = '/V1/bulk/';
    const SERVICE_NAME = 'asynchronousOperationsBulkStatusV1';
    const GET_COUNT_OPERATION_NAME = "getOperationsCountByBulkIdAndStatus";

    /**
     * @magentoApiDataFixture Magento/AsynchronousOperations/_files/operation_searchable.php
     * @dataProvider getBulkOperationCountDataProvider
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @param string $bulkUuid
     * @param int $expectedOperationCount
     * @param int $status
     * @return void
     */
<<<<<<< HEAD
    #[DataProvider('getBulkOperationCountDataProvider')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testGetOperationsCountByBulkIdAndStatus(
        string $bulkUuid,
        int $expectedOperationCount,
        int $status
    ): void {
        $resourcePath = self::RESOURCE_PATH . $bulkUuid . '/operation-status/' . $status;
        $serviceInfo = [
            'rest' => [
                'resourcePath' => $resourcePath,
                'httpMethod' => Request::HTTP_METHOD_GET,
            ],
            'soap' => [
                'service' => self::SERVICE_NAME,
                'serviceVersion' => 'V1',
                'operation' => self::SERVICE_NAME . self::GET_COUNT_OPERATION_NAME,
            ],
        ];
        $actualOperationCount = $this->_webApiCall(
            $serviceInfo,
            ['bulkUuid' => $bulkUuid, 'status' => $status]
        );
        $this->assertEquals($expectedOperationCount, $actualOperationCount);
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function getBulkOperationCountDataProvider(): array
=======
    public function getBulkOperationCountDataProvider(): array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            'Completed operations' => [
                'bulk-uuid-searchable-6',
                1,
                OperationInterface::STATUS_TYPE_COMPLETE,
            ],
            'Failed operations, can try to perform again' => [
                'bulk-uuid-searchable-6',
                1,
                OperationInterface::STATUS_TYPE_RETRIABLY_FAILED,
            ],
            'Failed operations. Must change something to retry' => [
                'bulk-uuid-searchable-6',
                1,
                OperationInterface::STATUS_TYPE_NOT_RETRIABLY_FAILED,
            ],
            'Opened operations' => [
                'bulk-uuid-searchable-6',
                2,
                OperationInterface::STATUS_TYPE_OPEN,
            ],
            'Rejected operations' => [
                'bulk-uuid-searchable-6',
                1,
                OperationInterface::STATUS_TYPE_REJECTED,
            ],
            'Not started scheduled operations by open status' => [
                'bulk-uuid-searchable-7',
                0,
                OperationInterface::STATUS_TYPE_OPEN,
            ],
        ];
    }
}
