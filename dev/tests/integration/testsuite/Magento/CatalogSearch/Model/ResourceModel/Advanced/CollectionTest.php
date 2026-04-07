<?php
/**
<<<<<<< HEAD
 * Copyright 2016 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
namespace Magento\CatalogSearch\Model\ResourceModel\Advanced;

use Magento\CatalogSearch\Model\Indexer\Fulltext;
use Magento\Framework\Indexer\IndexerRegistry;
use Magento\TestFramework\Helper\Bootstrap;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * Test class for \Magento\CatalogSearch\Model\ResourceModel\Advanced\Collection.
 * @magentoDbIsolation disabled
 */
class CollectionTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Magento\CatalogSearch\Model\ResourceModel\Advanced\Collection
     */
    private $advancedCollection;

    protected function setUp(): void
    {
        $advanced = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()
            ->create(\Magento\CatalogSearch\Model\Search\ItemCollectionProvider::class);
        $this->advancedCollection = $advanced->getCollection();
        $indexerRegistry = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()
            ->create(IndexerRegistry::class);
        $indexerRegistry->get(Fulltext::INDEXER_ID)->reindexAll();
    }

    /**
<<<<<<< HEAD
     * @magentoDataFixture Magento/Framework/Search/_files/products.php
     */
    #[DataProvider('filtersDataProvider')]
=======
     * @dataProvider filtersDataProvider
     * @magentoDataFixture Magento/Framework/Search/_files/products.php
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testLoadWithFilterNoFilters($filters, $expectedCount)
    {
        // addFieldsToFilter will load filters,
        //   then loadWithFilter will trigger _renderFiltersBefore code in Advanced/Collection
        $this->advancedCollection->addFieldsToFilter([$filters])->loadWithFilter();
        $items = $this->advancedCollection->getItems();
        $this->assertCount($expectedCount, $items);
    }

<<<<<<< HEAD
    public static function filtersDataProvider()
=======
    public function filtersDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            [['name' => ['like' => 'shorts'], 'description' => ['like' => 'green']], 1],
            [['name' => 'white', 'description' => '  '], 1],
            [['name' => '  ', 'description' => 'green'], 2],
            [['name' => '  ', 'description' => '   '], 0],
        ];
    }
}
