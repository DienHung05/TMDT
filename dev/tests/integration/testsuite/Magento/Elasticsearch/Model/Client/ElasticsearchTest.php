<?php
/**
<<<<<<< HEAD
 * Copyright 2018 Adobe
 * All Rights Reserved.
 */
namespace Magento\Elasticsearch\Model\Client;

use Magento\AdvancedSearch\Model\Client\ClientInterface;
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Elasticsearch\Model\Client;

use Magento\Catalog\Api\ProductRepositoryInterface;
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
use Magento\Indexer\Model\Indexer;
use Magento\TestFramework\Helper\Bootstrap;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Elasticsearch\SearchAdapter\ConnectionManager;
<<<<<<< HEAD
use Magento\Elasticsearch\Model\Config;
use Magento\Elasticsearch\SearchAdapter\SearchIndexNameResolver;
use Magento\TestModuleCatalogSearch\Model\SearchEngineVersionReader;
=======
use Magento\Elasticsearch6\Model\Client\Elasticsearch as ElasticsearchClient;
use Magento\Elasticsearch\Model\Config;
use Magento\Elasticsearch\SearchAdapter\SearchIndexNameResolver;
use Magento\TestModuleCatalogSearch\Model\ElasticsearchVersionChecker;
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
use Magento\Framework\Search\EngineResolverInterface;

/**
 * @magentoDbIsolation enabled
 * @magentoAppIsolation enabled
 * @magentoDataFixture Magento/Elasticsearch/_files/configurable_products.php
 */
class ElasticsearchTest extends \PHPUnit\Framework\TestCase
{
    /**
<<<<<<< HEAD
=======
     * @var string
     */
    private $searchEngine;

    /**
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @var ConnectionManager
     */
    private $connectionManager;

    /**
<<<<<<< HEAD
     * @var ClientInterface
=======
     * @var ElasticsearchClient
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     */
    private $client;

    /**
     * @var StoreManagerInterface
     */
    private $storeManager;

    /**
     * @var Config
     */
    private $clientConfig;

    /**
     * @var SearchIndexNameResolver
     */
    private $searchIndexNameResolver;

<<<<<<< HEAD
=======
    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;

    /**
     * Elasticsearch7 engine configuration is also compatible with OpenSearch 1
     */
    private const ENGINE_SUPPORTED_VERSIONS = [
        7 => 'elasticsearch7',
        1 => 'elasticsearch7',
    ];

>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    protected function setUp(): void
    {
        $objectManager = Bootstrap::getObjectManager();
        $this->connectionManager = $objectManager->create(ConnectionManager::class);
        $this->client = $this->connectionManager->getConnection();
        $this->storeManager = $objectManager->create(StoreManagerInterface::class);
        $this->clientConfig = $objectManager->create(Config::class);
        $this->searchIndexNameResolver = $objectManager->create(SearchIndexNameResolver::class);
<<<<<<< HEAD
=======
        $this->productRepository = $objectManager->create(ProductRepositoryInterface::class);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $indexer = $objectManager->create(Indexer::class);
        $indexer->load('catalogsearch_fulltext');
        $indexer->reindexAll();
    }

    /**
     * Make sure that correct engine is set
     */
    protected function assertPreConditions(): void
    {
<<<<<<< HEAD
        $objectManager = Bootstrap::getObjectManager();
        $currentEngine = $objectManager->get(EngineResolverInterface::class)->getCurrentSearchEngine();
        $installedEngine = $objectManager->get(SearchEngineVersionReader::class)->getFullVersion();
        $this->assertEquals(
            $installedEngine,
=======
        $currentEngine = Bootstrap::getObjectManager()->get(EngineResolverInterface::class)->getCurrentSearchEngine();
        $this->assertEquals(
            $this->getInstalledSearchEngine(),
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            $currentEngine,
            sprintf(
                'Search engine configuration "%s" is not compatible with the installed version',
                $currentEngine
            )
        );
    }

    /**
     * @param string $text
     * @return array
     */
    private function search($text)
    {
        $storeId = $this->storeManager->getDefaultStoreView()->getId();
        $searchQuery = [
            'index' => $this->searchIndexNameResolver->getIndexName($storeId, 'catalogsearch_fulltext'),
            'type' => $this->clientConfig->getEntityType(),
            'body' => [
                'query' => [
                    'bool' => [
                        'minimum_should_match' => 1,
                        'should' => [
                            [
                                'match' => [
                                    '_all' => $text,
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ];
        $queryResult = $this->client->query($searchQuery);
        return isset($queryResult['hits']['hits']) ? $queryResult['hits']['hits'] : [];
    }

    /**
<<<<<<< HEAD
     * @return void
=======
     * @magentoConfigFixture current_store catalog/search/elasticsearch_index_prefix composite_product_search
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     */
    public function testSearchConfigurableProductBySimpleProductName()
    {
        $this->assertProductWithSkuFound('configurable', $this->search('Configurable Option'));
    }

    /**
<<<<<<< HEAD
     * @return void
=======
     * @magentoConfigFixture current_store catalog/search/elasticsearch_index_prefix composite_product_search
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     */
    public function testSearchConfigurableProductBySimpleProductAttributeMultiselect()
    {
        $this->assertProductWithSkuFound('configurable', $this->search('dog'));
    }

    /**
<<<<<<< HEAD
     * @return void
=======
     * @magentoConfigFixture current_store catalog/search/elasticsearch_index_prefix composite_product_search
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     */
    public function testSearchConfigurableProductBySimpleProductAttributeSelect()
    {
        $this->assertProductWithSkuFound('configurable', $this->search('chair'));
    }

    /**
<<<<<<< HEAD
     * @return void
=======
     * @magentoConfigFixture current_store catalog/search/elasticsearch_index_prefix composite_product_search
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     */
    public function testSearchConfigurableProductBySimpleProductAttributeShortDescription()
    {
        $this->assertProductWithSkuFound('configurable', $this->search('simpledescription'));
    }

    /**
     * Assert that product with SKU is present in response
     *
     * @param string $sku
     * @param array $result
     * @return bool
     */
    private function assertProductWithSkuFound($sku, array $result)
    {
        foreach ($result as $item) {
            if ($item['_source']['sku'] == $sku) {
                return true;
            }
        }
        return false;
    }
<<<<<<< HEAD
=======

    /**
     * Returns installed on server search service
     *
     * @return string
     */
    private function getInstalledSearchEngine()
    {
        if (!$this->searchEngine) {
            // phpstan:ignore "Class Magento\TestModuleCatalogSearch\Model\ElasticsearchVersionChecker not found."
            $version = Bootstrap::getObjectManager()->get(ElasticsearchVersionChecker::class)->getVersion();
            $this->searchEngine = self::ENGINE_SUPPORTED_VERSIONS[$version] ?? 'elasticsearch' . $version;
        }
        return $this->searchEngine;
    }
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
}
