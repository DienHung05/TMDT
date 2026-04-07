<?php
/**
<<<<<<< HEAD
 * Copyright 2017 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

namespace Magento\Sales\Model\Order;

use Magento\Framework\App\State;
use Magento\Sales\Api\Data\OrderInterfaceFactory;
use Magento\TestFramework\Helper\Bootstrap;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * Class ShipmentTest
 * @package Magento\Sales\Model\Order
 */
class StatusTest extends \PHPUnit\Framework\TestCase
{
<<<<<<< HEAD
    public static function theCorrectLabelIsUsedDependingOnTheAreaProvider(): array
=======
    public function theCorrectLabelIsUsedDependingOnTheAreaProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            'backend label' => [
                'adminhtml',
                'Example',
            ],
            'store view label' => [
                'frontend',
                'Store view example',
            ],
        ];
    }

    /**
     * In the backend the regular label must be showed.
     *
     * @param $area
     * @param $result
     *
     * @magentoDataFixture Magento/Sales/_files/order_status.php
<<<<<<< HEAD
     */
    #[DataProvider('theCorrectLabelIsUsedDependingOnTheAreaProvider')]
=======
     * @dataProvider theCorrectLabelIsUsedDependingOnTheAreaProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testTheCorrectLabelIsUsedDependingOnTheArea($area, $result)
    {
        $objectManager = Bootstrap::getObjectManager();
        $objectManager->get(State::class)->setAreaCode($area);

        /** @var \Magento\Sales\Model\Order $order */
        $order = $objectManager->create(\Magento\Sales\Model\Order::class);
        $order->loadByIncrementId('100000001');

        $this->assertEquals($result, $order->getStatusLabel());
    }

    /**
     * Tests that specified order status frontend label for store should be displayed correctly
     *
     * @magentoDataFixture Magento/Sales/_files/order_status_with_different_labels.php
     */
    public function testTheCorrectLabelIsUsedDependingOnTheStore()
    {
        $objectManager = Bootstrap::getObjectManager();
        $objectManager->get(State::class)->setAreaCode('frontend');
        $orderFactory = $objectManager->get(OrderInterfaceFactory::class);
        $order = $orderFactory->create()->loadByIncrementId('100000001');
        $this->assertEquals('Custom status label', $order->getFrontendStatusLabel());
        $order->setStoreId(1);
        $order->save();
        $this->assertEquals(1, $order->getStoreId());
        $this->assertEquals('First store label', $order->getFrontendStatusLabel());
    }
}
