<?php
/**
<<<<<<< HEAD
 * Copyright 2015 Adobe
 * All Rights Reserved.
 */
namespace Magento\Sales\Model\ResourceModel\Report\Bestsellers;

use PHPUnit\Framework\Attributes\DataProvider;

=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Sales\Model\ResourceModel\Report\Bestsellers;

>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
class CollectionTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Magento\Sales\Model\ResourceModel\Report\Bestsellers\Collection
     */
    private $_collection;

    protected function setUp(): void
    {
        $this->_collection = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
            \Magento\Sales\Model\ResourceModel\Report\Bestsellers\Collection::class
        );
        $this->_collection->setPeriod('day')->setDateRange(null, null)->addStoreFilter([1]);
    }

    /**
     * @magentoDataFixture Magento/Sales/_files/order.php
     * @magentoDataFixture Magento/Sales/_files/report_bestsellers.php
     */
    public function testGetItems()
    {
        $expectedResult = [1 => 2];
        $actualResult = [];
        /** @var \Magento\Reports\Model\Item $reportItem */
        foreach ($this->_collection->getItems() as $reportItem) {
            $actualResult[$reportItem->getData('product_id')] = $reportItem->getData('qty_ordered');
        }
        $this->assertEquals($expectedResult, $actualResult);
    }

    /**
<<<<<<< HEAD
=======
     * @dataProvider tableForPeriodDataProvider
     *
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @param $period
     * @param $expectedTable
     * @param $dateFrom
     * @param $dateTo
     */
<<<<<<< HEAD
    #[DataProvider('tableForPeriodDataProvider')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testTableSelection($period, $expectedTable, $dateFrom, $dateTo)
    {
        $dbTableName = $this->_collection->getTable($expectedTable);
        $this->_collection->setPeriod($period);
        $this->_collection->setDateRange($dateFrom, $dateTo);
        $this->_collection->load();
        $from = $this->_collection->getSelect()->getPart('from');

        $this->assertArrayHasKey($dbTableName, $from);

        $this->assertArrayHasKey('tableName', $from[$dbTableName]);
        $actualTable = $from[$dbTableName]['tableName'];

        $this->assertEquals($dbTableName, $actualTable);
    }

    /**
     * Data provider for testTableSelection
     *
     * @return array
     */
<<<<<<< HEAD
    public static function tableForPeriodDataProvider(): array
=======
    public function tableForPeriodDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        $dateNow = date('Y-m-d', time());
        $dateYearAgo = date('Y-m-d', strtotime($dateNow . ' -1 year'));
        return [
            [
                'period'    => 'year',
<<<<<<< HEAD
                'expectedTable'     => 'sales_bestsellers_aggregated_yearly',
                'dateFrom' => null,
                'dateTo'   => null,
            ],
            [
                'period'    => 'month',
                'expectedTable'     => 'sales_bestsellers_aggregated_monthly',
                'dateFrom' => null,
                'dateTo'   => null
            ],
            [
                'period'    => 'day',
                'expectedTable'     => 'sales_bestsellers_aggregated_daily',
                'dateFrom' => null,
                'dateTo'   => null
            ],
            [
                'period'    => 'undefinedPeriod',
                'expectedTable'     => 'sales_bestsellers_aggregated_daily',
                'dateFrom' => null,
                'dateTo'   => null
            ],
            [
                'period'    => null,
                'expectedTable'     => 'sales_bestsellers_aggregated_daily',
                'dateFrom' => $dateYearAgo,
                'dateTo'   => $dateNow
            ],
            [
                'period'    => null,
                'expectedTable'     => 'sales_bestsellers_aggregated_daily',
                'dateFrom' => $dateNow,
                'dateTo'   => $dateNow
            ],
            [
                'period'    => null,
                'expectedTable'     => 'sales_bestsellers_aggregated_daily',
                'dateFrom' => $dateYearAgo,
                'dateTo'   => $dateYearAgo
            ],
            [
                'period'    => null,
                'expectedTable'     => 'sales_bestsellers_aggregated_yearly',
                'dateFrom' => null,
                'dateTo'   => null
=======
                'table'     => 'sales_bestsellers_aggregated_yearly',
                'date_from' => null,
                'date_to'   => null,
            ],
            [
                'period'    => 'month',
                'table'     => 'sales_bestsellers_aggregated_monthly',
                'date_from' => null,
                'date_to'   => null
            ],
            [
                'period'    => 'day',
                'table'     => 'sales_bestsellers_aggregated_daily',
                'date_from' => null,
                'date_to'   => null
            ],
            [
                'period'    => 'undefinedPeriod',
                'table'     => 'sales_bestsellers_aggregated_daily',
                'date_from' => null,
                'date_to'   => null
            ],
            [
                'period'    => null,
                'table'     => 'sales_bestsellers_aggregated_daily',
                'date_from' => $dateYearAgo,
                'date_to'   => $dateNow
            ],
            [
                'period'    => null,
                'table'     => 'sales_bestsellers_aggregated_daily',
                'date_from' => $dateNow,
                'date_to'   => $dateNow
            ],
            [
                'period'    => null,
                'table'     => 'sales_bestsellers_aggregated_daily',
                'date_from' => $dateYearAgo,
                'date_to'   => $dateYearAgo
            ],
            [
                'period'    => null,
                'table'     => 'sales_bestsellers_aggregated_yearly',
                'date_from' => null,
                'date_to'   => null
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            ],
        ];
    }
}
