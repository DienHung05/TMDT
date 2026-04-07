<?php
/**
<<<<<<< HEAD
 * Copyright 2014 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

namespace Magento\Paypal\Model;

<<<<<<< HEAD
use Magento\Framework\DataObject;
use Magento\Framework\HTTP\LaminasClient;
use Magento\Framework\HTTP\LaminasClientFactory;
use Magento\Framework\Math\Random;
use Magento\Framework\ObjectManagerInterface;
use Magento\Payment\Model\Method\Logger;
use Magento\Paypal\Model\Payflow\Service\Gateway;
use Magento\Sales\Model\Order;
use Magento\TestFramework\Helper\Bootstrap;
use PHPUnit\Framework\TestCase;

class PayflowproTest extends TestCase
{
    /**
     * @var ObjectManagerInterface
=======
class PayflowproTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Magento\Framework\ObjectManagerInterface
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     */
    protected $_objectManager;

    /**
<<<<<<< HEAD
     * @var Payflowpro
=======
     * @var \Magento\Paypal\Model\Payflowpro
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     */
    protected $_model;

    /**
<<<<<<< HEAD
     * @var LaminasClient
=======
     * @var \Magento\Framework\HTTP\ZendClient
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     */
    protected $_httpClientMock;

    /**
<<<<<<< HEAD
     * @var Gateway
=======
     * @var \Magento\Paypal\Model\Payflow\Service\Gateway
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     */
    protected $gatewayMock;

    protected function setUp(): void
    {
<<<<<<< HEAD
        $this->_objectManager = Bootstrap::getObjectManager();
        $httpClientFactoryMock = $this->getMockBuilder(LaminasClientFactory::class)
            ->onlyMethods(['create'])
            ->disableOriginalConstructor()
            ->getMock();
        $this->_httpClientMock = $this->getMockBuilder(LaminasClient::class)
            ->disableOriginalConstructor()
            ->onlyMethods([
                'setUri',
                'setOptions',
                'setMethod',
                'setParameterPost',
                'setHeaders',
                'setUrlEncodeBody',
                'send'
            ])->getMock();
        $this->_httpClientMock->expects($this->any())->method('setUri')->willReturnSelf();
        $this->_httpClientMock->expects($this->any())->method('setOptions')->willReturnSelf();
=======
        $this->_objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();
        $httpClientFactoryMock = $this->getMockBuilder(\Magento\Framework\HTTP\ZendClientFactory::class)
            ->setMethods(['create'])
            ->disableOriginalConstructor()
            ->getMock();
        $this->_httpClientMock = $this->getMockBuilder(\Magento\Framework\HTTP\ZendClient::class)->setMethods([])
            ->disableOriginalConstructor()->getMock();
        $this->_httpClientMock->expects($this->any())->method('setUri')->willReturnSelf();
        $this->_httpClientMock->expects($this->any())->method('setConfig')->willReturnSelf();
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $this->_httpClientMock->expects($this->any())->method('setMethod')->willReturnSelf();
        $this->_httpClientMock->expects($this->any())->method('setParameterPost')->willReturnSelf();
        $this->_httpClientMock->expects($this->any())->method('setHeaders')->willReturnSelf();
        $this->_httpClientMock->expects($this->any())->method('setUrlEncodeBody')->willReturnSelf();

        $httpClientFactoryMock->expects($this->any())->method('create')
            ->willReturn($this->_httpClientMock);

<<<<<<< HEAD
        $mathRandomMock = $this->createMock(Random::class);
        $loggerMock = $this->createMock(Logger::class);
        $this->gatewayMock =$this->_objectManager->create(
            Gateway::class,
=======
        $mathRandomMock = $this->createMock(\Magento\Framework\Math\Random::class);
        $loggerMock = $this->createMock(\Magento\Payment\Model\Method\Logger::class);
        $this->gatewayMock =$this->_objectManager->create(
            \Magento\Paypal\Model\Payflow\Service\Gateway::class,
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            [
                'httpClientFactory' => $httpClientFactoryMock,
                'mathRandom' => $mathRandomMock,
                'logger' => $loggerMock,
            ]
        );
        $this->_model = $this->_objectManager->create(
<<<<<<< HEAD
            Payflowpro::class,
=======
            \Magento\Paypal\Model\Payflowpro::class,
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            ['gateway' => $this->gatewayMock]
        );
    }

    /**
     * @magentoDataFixture Magento/Sales/_files/order_paid_with_payflowpro.php
     */
    public function testReviewPaymentNullResponce()
    {
<<<<<<< HEAD
        /** @var Order $order */
        $order = $this->_objectManager->create(Order::class);
        $order->loadByIncrementId('100000001');

        $this->_httpClientMock->expects($this->any())->method('send')
            ->willReturn(new DataObject(['body' => 'RESULTval=12&val2=34']));
=======
        /** @var \Magento\Sales\Model\Order $order */
        $order = $this->_objectManager->create(\Magento\Sales\Model\Order::class);
        $order->loadByIncrementId('100000001');

        $this->_httpClientMock->expects($this->any())->method('request')
            ->willReturn(new \Magento\Framework\DataObject(['body' => 'RESULTval=12&val2=34']));
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $expectedResult = ['resultval' => '12', 'val2' => '34', 'result_code' => null];

        $this->assertEquals($expectedResult, $this->_model->acceptPayment($order->getPayment()));
    }
}
