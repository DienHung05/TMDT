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

namespace Magento\Setup\Test\Unit\Fixtures;

use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;
use Magento\ConfigurableProduct\Api\LinkManagementInterface;
use Magento\ConfigurableProduct\Api\OptionRepositoryInterface;
use Magento\Framework\ObjectManager\ObjectManager;
use Magento\Framework\Serialize\SerializerInterface;
use Magento\Sales\Model\ResourceModel\Order;
use Magento\Setup\Fixtures\FixtureModel;
use Magento\Setup\Fixtures\OrdersFixture;
use Magento\Store\Model\StoreManagerInterface;
use PHPUnit\Framework\MockObject\MockObject;
<<<<<<< HEAD
use Magento\Framework\TestFramework\Unit\Helper\MockCreationTrait;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
use PHPUnit\Framework\TestCase;

class OrdersFixtureTest extends TestCase
{
<<<<<<< HEAD
    use MockCreationTrait;

=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

    /**
     * @var MockObject|FixtureModel
     */
    private $fixtureModelMock;

    /**
     * @var OrdersFixture
     */
    private $model;

    public function testExecute()
    {
        $storeManagerMock = $this->getMockBuilder(StoreManagerInterface::class)
            ->disableOriginalConstructor()
<<<<<<< HEAD
            ->getMock();
=======
            ->getMockForAbstractClass();
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

        $productCollectionFactoryMock = $this->getMockBuilder(
            CollectionFactory::class
        )
            ->disableOriginalConstructor()
            ->getMock();

        $productRepositoryMock = $this->getMockBuilder(ProductRepositoryInterface::class)
            ->disableOriginalConstructor()
<<<<<<< HEAD
            ->getMock();

        $optionRepositoryMock = $this->getMockBuilder(OptionRepositoryInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $linkManagementMock = $this->getMockBuilder(LinkManagementInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $serializerMock = $this->getMockBuilder(SerializerInterface::class)
            ->disableOriginalConstructor()
            ->getMock();
=======
            ->getMockForAbstractClass();

        $optionRepositoryMock = $this->getMockBuilder(OptionRepositoryInterface::class)
            ->disableOriginalConstructor()
            ->getMockForAbstractClass();

        $linkManagementMock = $this->getMockBuilder(LinkManagementInterface::class)
            ->disableOriginalConstructor()
            ->getMockForAbstractClass();

        $serializerMock = $this->getMockBuilder(SerializerInterface::class)
            ->disableOriginalConstructor()
            ->getMockForAbstractClass();
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

        $this->fixtureModelMock = $this->getMockBuilder(FixtureModel::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->model = new OrdersFixture(
            $storeManagerMock,
            $productCollectionFactoryMock,
            $productRepositoryMock,
            $optionRepositoryMock,
            $linkManagementMock,
            $serializerMock,
            $this->fixtureModelMock
        );

<<<<<<< HEAD
        $orderMock = $this->createPartialMockWithReflection(
            Order::class,
            ['getTable', 'getConnection', 'query', 'getTableName', 'fetchColumn']
        );
=======
        $orderMock = $this->getMockBuilder(Order::class)
            ->addMethods(['getTableName', 'query', 'fetchColumn'])
            ->onlyMethods(['getTable', 'getConnection'])
            ->disableOriginalConstructor()
            ->getMock();
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

        $path = explode('\\', Order::class);
        $name = array_pop($path);

        $orderMock->expects($this->atLeastOnce())
            ->method('getConnection')
            ->willReturn($orderMock);
        $orderMock->expects($this->once())
            ->method('getTable')
            ->willReturn(strtolower($name) . '_table_name');
        $orderMock->expects($this->once())
            ->method('query')
            ->willReturn($orderMock);
        $orderMock->expects($this->once())
            ->method('getTableName')
            ->willReturn(strtolower($name) . '_table_name');

        $objectManagerMock = $this->createMock(ObjectManager::class);
        $objectManagerMock->expects($this->atLeastOnce())
            ->method('get')
            ->willReturn($orderMock);

        $this->fixtureModelMock
            ->expects($this->atLeastOnce())
            ->method('getObjectManager')
            ->willReturn($objectManagerMock);

        $this->model->execute();
    }
}
