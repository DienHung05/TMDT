<?php
/**
<<<<<<< HEAD
 * Copyright 2020 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

namespace Magento\Backend\Model\Dashboard;

<<<<<<< HEAD
use Magento\Framework\ObjectManagerInterface;
use Magento\TestFramework\Helper\Bootstrap;
use PHPUnit\Framework\TestCase;
use Magento\Sales\Model\Order;
use Magento\Sales\Model\Order\Payment;
use Magento\Framework\Stdlib\DateTime\TimezoneInterface;
use Magento\Framework\Stdlib\DateTime;
use DateTimeZone;
use PHPUnit\Framework\Attributes\DataProvider;
=======
use Magento\TestFramework\Helper\Bootstrap;
use PHPUnit\Framework\TestCase;
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * Verify chart data by different period.
 *
 * @magentoAppArea adminhtml
 */
class ChartTest extends TestCase
{
    /**
<<<<<<< HEAD
     * @var ObjectManagerInterface
     */
    private $objectManager;

    /**
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @var Chart
     */
    private $model;

    /**
     * @inheritdoc
     */
    protected function setUp(): void
    {
<<<<<<< HEAD
        $this->objectManager = Bootstrap::getObjectManager();
        $this->model = $this->objectManager->get(Chart::class);
=======
        $this->model = Bootstrap::getObjectManager()->create(Chart::class);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }

    /**
     * Verify getByPeriod with all types of period
     *
     * @magentoDataFixture Magento/Sales/_files/order_list_with_invoice.php
<<<<<<< HEAD
     * @return void
     */
    #[DataProvider('getChartDataProvider')]
    public function testGetByPeriodWithParam(
        int $expectedDataQty,
        string $period,
        string $chartParam,
        string $orderIncrementId
    ): void {
        $payment = $this->objectManager->get(Payment::class);
        $payment->setMethod('checkmo');
        $payment->setAdditionalInformation('last_trans_id', '11122');
        $payment->setAdditionalInformation('metadata', [
            'type' => 'free',
            'fraudulent' => false
        ]);

        $timezoneLocal = $this->objectManager->get(TimezoneInterface::class)->getConfigTimezone();
        $dateTime = new \DateTime('now', new \DateTimeZone($timezoneLocal));
        if ($period === '1m') {
            $dateTime->modify('first day of this month')->format(DateTime::DATETIME_PHP_FORMAT);
        } elseif ($period === '1y') {
            $monthlyDateTime = clone $dateTime;
            $monthlyDateTime->modify('first day of this month')->format(DateTime::DATETIME_PHP_FORMAT);
            $monthlyDateTime->setTimezone(new DateTimeZone('UTC'));
            $monthlyOrder = $this->objectManager->get(Order::class);
            $monthlyOrder->loadByIncrementId('100000004');
            $monthlyOrder->setCreatedAt($monthlyDateTime->format(DateTime::DATETIME_PHP_FORMAT));
            $monthlyOrder->setPayment($payment);
            $monthlyOrder->save();
            $dateTime->modify('first day of january this year')->format(DateTime::DATETIME_PHP_FORMAT);
        } elseif ($period === '2y') {
            $dateTime->modify('first day of january last year')->format(DateTime::DATETIME_PHP_FORMAT);
        }
        $dateTime->setTimezone(new DateTimeZone('UTC'));
        $order = $this->objectManager->get(Order::class);
        $order->loadByIncrementId($orderIncrementId);
        $order->setCreatedAt($dateTime->format(DateTime::DATETIME_PHP_FORMAT));
        $order->setPayment($payment);
        $order->save();
=======
     * @dataProvider getChartDataProvider
     * @return void
     */
    public function testGetByPeriodWithParam(int $expectedDataQty, string $period, string $chartParam): void
    {
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $ordersData = $this->model->getByPeriod($period, $chartParam);
        $ordersCount = array_sum(array_map(function ($item) {
            return $item['y'];
        }, $ordersData));
        $this->assertGreaterThanOrEqual($expectedDataQty, $ordersCount);
    }

    /**
     * Expected chart data
     *
     * @return array
     */
<<<<<<< HEAD
    public static function getChartDataProvider(): array
=======
    public function getChartDataProvider(): array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            [
                2,
                '24h',
<<<<<<< HEAD
                'quantity',
                '100000002'
=======
                'quantity'
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            ],
            [
                3,
                '7d',
<<<<<<< HEAD
                'quantity',
                '100000003'
=======
                'quantity'
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            ],
            [
                4,
                '1m',
<<<<<<< HEAD
                'quantity',
                '100000004'
=======
                'quantity'
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            ],
            [
                5,
                '1y',
<<<<<<< HEAD
                'quantity',
                '100000005'
=======
                'quantity'
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            ],
            [
                6,
                '2y',
<<<<<<< HEAD
                'quantity',
                '100000006'
=======
                'quantity'
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            ]
        ];
    }
}
