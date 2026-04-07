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

namespace Magento\Customer\Ui\Component;

use Magento\Backend\Model\Locale\Resolver;
<<<<<<< HEAD
use Magento\Customer\Model\Customer;
use Magento\Customer\Ui\Component\DataProvider;
use Magento\Framework\Api\Filter;
use Magento\Framework\Indexer\IndexerRegistry;
use Magento\Framework\Locale\ResolverInterface;
use Magento\TestFramework\Helper\Bootstrap;
use PHPUnit\Framework\Attributes\DataProvider as DataProviderAttribute;
=======
use Magento\Framework\Api\Filter;
use Magento\Framework\Locale\ResolverInterface;
use Magento\TestFramework\Helper\Bootstrap;
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

/**
 * Class to test Data Provider for customer listing
 *
 * @magentoAppArea adminhtml
 */
class DataProviderTest extends TestCase
{
    /**
     * @var ResolverInterface|MockObject
     */
    private $localeResolverMock;

    /**
     * @var DataProvider
     */
    private $dataProvider;

    /**
     * @inheritdoc
     */
    protected function setUp(): void
    {
        $this->initLocaleResolverMock();
<<<<<<< HEAD
        $indexerRegistry = Bootstrap::getObjectManager()->create(IndexerRegistry::class);
        $indexer = $indexerRegistry->get(Customer::CUSTOMER_GRID_INDEXER_ID);
        $indexer->reindexAll();
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }

    /**
     * Test to filter by region name in custom locale
     *
     * @param array $filterData
     * @magentoDataFixture Magento/Customer/_files/customer.php
     * @magentoDataFixture Magento/Customer/_files/customer_address.php
     * @magentoDataFixture Magento/Directory/_files/region_name_jp.php
<<<<<<< HEAD
     * @magentoDbIsolation disabled
     */
    #[DataProviderAttribute('getDataByRegionDataProvider')]
=======
     * @dataProvider getDataByRegionDataProvider
     * @magentoDbIsolation disabled
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testGetDataByRegion(array $filterData)
    {
        $locale = 'JA_jp';
        $this->localeResolverMock->method('getLocale')->willReturn($locale);
        $this->dataProvider = Bootstrap::getObjectManager()->create(
            DataProvider::class,
            [
                'name' => 'customer_listing_data_source',
                'requestFieldName' => 'id',
                'primaryFieldName' => 'entity_id',
            ]
        );

        $filter = Bootstrap::getObjectManager()->create(
            Filter::class,
            ['data' => $filterData]
        );
        $this->dataProvider->addFilter($filter);
        $data = $this->dataProvider->getData();
        $this->assertEquals(1, $data['totalRecords']);
        $this->assertCount(1, $data['items']);
        $this->assertEquals($filterData['value'], $data['items'][0]['billing_region']);
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function getDataByRegionDataProvider(): array
=======
    public function getDataByRegionDataProvider(): array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            [['condition_type' => 'fulltext', 'field' => 'fulltext', 'value' => 'アラバマ']],
            [['condition_type' => 'regular', 'field' => 'billing_region', 'value' => 'アラバマ']],
        ];
    }

    /**
     * Mock locale resolver
     */
    private function initLocaleResolverMock(): void
    {
        $this->localeResolverMock = $this->createMock(ResolverInterface::class);
        Bootstrap::getObjectManager()->removeSharedInstance(ResolverInterface::class);
        Bootstrap::getObjectManager()->removeSharedInstance(Resolver::class);
        Bootstrap::getObjectManager()->addSharedInstance($this->localeResolverMock, ResolverInterface::class);
        Bootstrap::getObjectManager()->addSharedInstance($this->localeResolverMock, Resolver::class);
    }
}
