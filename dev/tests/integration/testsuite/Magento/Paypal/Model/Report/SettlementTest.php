<?php
/**
<<<<<<< HEAD
 * Copyright 2013 Adobe
 * All Rights Reserved.
 */
namespace Magento\Paypal\Model\Report;

use PHPUnit\Framework\Attributes\DataProvider;

=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Paypal\Model\Report;

>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
class SettlementTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @magentoDbIsolation enabled
     */
    public function testFetchAndSave()
    {
        /** @var $model \Magento\Paypal\Model\Report\Settlement; */
        $model = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
            \Magento\Paypal\Model\Report\Settlement::class
        );
        $connection = $this->createPartialMock(\Magento\Framework\Filesystem\Io\Sftp::class, ['rawls', 'read']);
        $filename = 'STL-00000000.00.abc.CSV';
        $connection->expects($this->once())->method('rawls')->willReturn([$filename => []]);
        $connection->expects($this->once())->method('read')->with($filename, $this->anything());
        $model->fetchAndSave($connection);
    }

    /**
     * @param array $config
<<<<<<< HEAD
     */
    #[DataProvider('createConnectionExceptionDataProvider')]
=======
     * @dataProvider createConnectionExceptionDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testCreateConnectionException($config)
    {
        $this->expectException(\InvalidArgumentException::class);

        \Magento\Paypal\Model\Report\Settlement::createConnection($config);
    }

    /**
     * @param array $automaticMode
     * @param array $expectedResult
     *
<<<<<<< HEAD
=======
     * @dataProvider createAutomaticModeDataProvider
     *
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @magentoConfigFixture default_store paypal/fetch_reports/active 0
     * @magentoConfigFixture default_store paypal/fetch_reports/ftp_ip 192.168.0.1
     * @magentoConfigFixture current_store paypal/fetch_reports/active 1
     * @magentoConfigFixture current_store paypal/fetch_reports/ftp_ip 127.0.0.1
     * @magentoConfigFixture current_store paypal/fetch_reports/ftp_path /tmp
     * @magentoConfigFixture current_store paypal/fetch_reports/ftp_login login
     * @magentoConfigFixture current_store paypal/fetch_reports/ftp_password password
     * @magentoConfigFixture current_store paypal/fetch_reports/ftp_sandbox 0
     * @magentoDbIsolation enabled
     */
<<<<<<< HEAD
    #[DataProvider('createAutomaticModeDataProvider')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testGetSftpCredentials($automaticMode, $expectedResult)
    {
        /** @var $model \Magento\Paypal\Model\Report\Settlement; */
        $model = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
            \Magento\Paypal\Model\Report\Settlement::class
        );

        $result = $model->getSftpCredentials($automaticMode);

        $this->assertEquals($expectedResult, $result);
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function createConnectionExceptionDataProvider(): array
=======
    public function createConnectionExceptionDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            [[]],
            [['username' => 'test', 'password' => 'test', 'path' => '/']],
            [['hostname' => 'example.com', 'password' => 'test', 'path' => '/']],
            [['hostname' => 'example.com', 'username' => 'test', 'path' => '/']],
            [['hostname' => 'example.com', 'username' => 'test', 'password' => 'test']]
        ];
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function createAutomaticModeDataProvider(): array
=======
    public function createAutomaticModeDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            [
                true,
                [
                    [
                        'hostname' => '127.0.0.1',
                        'path' => '/tmp',
                        'username' => 'login',
                        'password' => 'password',
                        'sandbox' => '0'
                    ]
                ]
            ],
            [
                false,
                [
                    [
                        'hostname' => '127.0.0.1',
                        'path' => '/tmp',
                        'username' => 'login',
                        'password' => 'password',
                        'sandbox' => '0'
                    ]
                ]
            ],
        ];
    }
}
