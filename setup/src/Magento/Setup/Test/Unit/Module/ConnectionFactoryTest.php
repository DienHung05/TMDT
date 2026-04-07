<?php
/**
<<<<<<< HEAD
 * Copyright 2015 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

namespace Magento\Setup\Test\Unit\Module;

use Laminas\ServiceManager\ServiceLocatorInterface;
use Magento\Framework\ObjectManagerInterface;
use Magento\Framework\TestFramework\Unit\Helper\ObjectManager;
use Magento\Setup\Model\ObjectManagerProvider;
use Magento\Setup\Module\ConnectionFactory;
use PHPUnit\Framework\TestCase;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

class ConnectionFactoryTest extends TestCase
{
    /**
     * @var ConnectionFactory
     */
    private $connectionFactory;

    protected function setUp(): void
    {
        $objectManager = new ObjectManager($this);
<<<<<<< HEAD
        $serviceLocatorMock = $this->createMock(ServiceLocatorInterface::class);
=======
        $serviceLocatorMock = $this->getMockForAbstractClass(ServiceLocatorInterface::class);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $objectManagerProviderMock = $this->createMock(ObjectManagerProvider::class);
        $serviceLocatorMock->expects($this->once())
            ->method('get')
            ->with(
                ObjectManagerProvider::class
            )
            ->willReturn($objectManagerProviderMock);
<<<<<<< HEAD
        $objectManagerMock = $this->createMock(ObjectManagerInterface::class);
=======
        $objectManagerMock = $this->getMockForAbstractClass(ObjectManagerInterface::class);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $objectManagerProviderMock->expects($this->once())
            ->method('get')
            ->willReturn($objectManagerMock);
        $this->connectionFactory = $objectManager->getObject(
            ConnectionFactory::class,
            [
                'serviceLocator' => $serviceLocatorMock
            ]
        );
    }

    /**
     * @param array $config
<<<<<<< HEAD
     */
    #[DataProvider('createDataProvider')]
=======
     * @dataProvider createDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testCreate($config)
    {
        $this->expectException('InvalidArgumentException');
        $this->expectExceptionMessage('MySQL adapter: Missing required configuration option \'host\'');
        $this->connectionFactory->create($config);
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function createDataProvider()
=======
    public function createDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            [
                []
            ],
            [
                ['value']
            ],
            [
                ['active' => 0]
            ],
        ];
    }
}
