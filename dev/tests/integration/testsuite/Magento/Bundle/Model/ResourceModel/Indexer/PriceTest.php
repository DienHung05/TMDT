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

namespace Magento\Bundle\Model\ResourceModel\Indexer;

<<<<<<< HEAD
use Magento\Bundle\Test\Fixture\Option as BundleOptionFixture;
use Magento\Bundle\Test\Fixture\Product as BundleProductFixture;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Catalog\Model\Indexer\Product\Price;
use Magento\Catalog\Test\Fixture\Product as ProductFixture;
=======
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Catalog\Model\Indexer\Product\Price;
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
use Magento\Customer\Model\Group;
use Magento\Framework\Indexer\ActionInterface;
use Magento\Framework\ObjectManagerInterface;
use Magento\Store\Api\WebsiteRepositoryInterface;
use Magento\TestFramework\Catalog\Model\Product\Price\GetPriceIndexDataByProductId;
<<<<<<< HEAD
use Magento\TestFramework\Fixture\Config;
use Magento\TestFramework\Fixture\DataFixture;
use Magento\TestFramework\Fixture\DataFixtureStorageManager;
use Magento\TestFramework\Fixture\DbIsolation;
use Magento\TestFramework\Helper\Bootstrap;
use PHPUnit\Framework\TestCase;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
=======
use Magento\CatalogInventory\Model\Indexer\Stock;
use Magento\TestFramework\Helper\Bootstrap;
use PHPUnit\Framework\TestCase;

>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
class PriceTest extends TestCase
{
    /**
     * @var ObjectManagerInterface
     */
    private $objectManager;

    /**
     * @var ActionInterface
     */
    private $indexer;

    /**
     * @var GetPriceIndexDataByProductId
     */
    private $getPriceIndexDataByProductId;

    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;

    /**
     * @var WebsiteRepositoryInterface
     */
    private $websiteRepository;

    /**
<<<<<<< HEAD
=======
     * @var Stock
     */
    private $stockIndexer;

    /**
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @inheritDoc
     */
    protected function setUp(): void
    {
        $this->objectManager = Bootstrap::getObjectManager();
        $this->indexer = $this->objectManager->get(Price::class);
        $this->productRepository = $this->objectManager->get(ProductRepositoryInterface::class);
        $this->getPriceIndexDataByProductId = $this->objectManager->get(GetPriceIndexDataByProductId::class);
        $this->websiteRepository = $this->objectManager->get(WebsiteRepositoryInterface::class);
<<<<<<< HEAD
    }

    #[
        DbIsolation(false),
        Config('cataloginventory/options/show_out_of_stock', 0, 'store'),
        DataFixture(ProductFixture::class, ['price' => 10], 'product1'),
        DataFixture(ProductFixture::class, ['price' => 3], 'product2'),
        DataFixture(ProductFixture::class, ['price' => 5, 'stock_item' => ['qty' => 0]], 'product3'),
        DataFixture(ProductFixture::class, ['price' => 8, 'stock_item' => ['qty' => 0]], 'product4'),
        DataFixture(BundleOptionFixture::class, ['product_links' => ['$product1$']], 'opt1_1'),
        DataFixture(BundleOptionFixture::class, ['product_links' => ['$product2$','$product3$']], 'opt1_2'),
        DataFixture(BundleProductFixture::class, ['_options' => ['$opt1_1$', '$opt1_2$']], 'bundle1'),
        DataFixture(BundleOptionFixture::class, ['product_links' => ['$product1$']], 'opt2_1'),
        DataFixture(BundleOptionFixture::class, ['product_links' => ['$product3$','$product4$']], 'opt2_2'),
        DataFixture(BundleProductFixture::class, ['_options' => ['$opt2_1$', '$opt2_2$']], 'bundle2'),
    ]
    public function testBundleDynamicPriceWhenShowOutOfStockIsDisabled(): void
    {
        $this->assertPriceData([
            // bundle1: required option1 (product1) + required option2 (product2, product3)
            // bundle1 is in stock: product3 is out of stock, but product2 is in stock in option2
            // expected: the price range includes only available selections
            'bundle1' => [
                'min_price' => 13,
                'max_price' => 13
            ],
            // bundle2: required option1 (product1) + required option2 (product3, product4)
            // bundle2 is out of stock: both product3 and product4 are out of stock
            // expected: no price data
            'bundle2' => null
        ]);
    }

    #[
        DbIsolation(false),
        Config('cataloginventory/options/show_out_of_stock', 1, 'store'),
        DataFixture(ProductFixture::class, ['price' => 10], 'product1'),
        DataFixture(ProductFixture::class, ['price' => 3], 'product2'),
        DataFixture(ProductFixture::class, ['price' => 5, 'stock_item' => ['qty' => 0]], 'product3'),
        DataFixture(ProductFixture::class, ['price' => 8, 'stock_item' => ['qty' => 0]], 'product4'),
        DataFixture(BundleOptionFixture::class, ['product_links' => ['$product1$']], 'opt1_1'),
        DataFixture(BundleOptionFixture::class, ['product_links' => ['$product2$','$product3$']], 'opt1_2'),
        DataFixture(BundleProductFixture::class, ['_options' => ['$opt1_1$', '$opt1_2$']], 'bundle1'),
        DataFixture(BundleOptionFixture::class, ['product_links' => ['$product1$']], 'opt2_1'),
        DataFixture(BundleOptionFixture::class, ['product_links' => ['$product3$','$product4$']], 'opt2_2'),
        DataFixture(BundleProductFixture::class, ['_options' => ['$opt2_1$', '$opt2_2$']], 'bundle2'),
    ]
    public function testBundleDynamicPriceWhenShowOutOfStockIsEnabled(): void
    {
        $this->assertPriceData([
            // bundle1: required option1 (product1) + required option2 (product2, product3)
            // bundle1 is in stock: product3 is out of stock, but product2 is in stock in option2
            // expected: the price range includes only available selections
            'bundle1' => [
                'min_price' => 13,
                'max_price' => 13
            ],
            // bundle2: required option1 (product1) + required option2 (product3, product4)
            // bundle2 is out of stock: both product3 and product4 are out of stock
            // expected: the price range includes all out of stock selections
            'bundle2' => [
                'min_price' => 15,
                'max_price' => 18
            ]
        ]);
    }

    #[
        DataFixture(
            BundleProductFixture::class,
            ['sku' => 'bundle1', 'extension_attributes' => ['website_ids' => []]]
        ),
    ]
    public function testExecuteForBundleWithoutWebsites(): void
    {
        $bundleProduct = $this->productRepository->get('bundle1');
        $this->indexer->executeRow($bundleProduct->getId());
    }

    private function assertPriceData(array $expectedPriceData): void
    {
        $fixtures = DataFixtureStorageManager::getStorage();
        $actualPriceData = [];
        foreach ($expectedPriceData as $sku => $expectedPrice) {
            $product = $fixtures->get($sku);
            $data = $this->getPriceIndexDataByProductId->execute(
                (int) $product->getId(),
                Group::NOT_LOGGED_IN_ID,
                (int) $this->websiteRepository->get('base')->getId()
            );
            $priceData = reset($data);
            $actualPriceData[$sku] = $priceData ? array_intersect_key($priceData, $expectedPrice) : null;
        }
        $this->assertEquals($expectedPriceData, $actualPriceData);
=======
        $this->stockIndexer = $this->objectManager->get(Stock::class);
    }

    /**
     * Test get bundle index price if enabled show out off stock
     *
     * @magentoDbIsolation disabled
     * @magentoAppIsolation enabled
     * @magentoDataFixture Magento/Bundle/_files/bundle_product_with_dynamic_price.php
     * @magentoConfigFixture default_store cataloginventory/options/show_out_of_stock 1
     *
     * @return void
     */
    public function testExecuteRowWithShowOutOfStock(): void
    {

        $expectedPrices = [
            'price' => 0,
            'final_price' => 0,
            'min_price' => 15.99,
            'max_price' => 15.99,
            'tier_price' => null
        ];
        $product = $this->productRepository->get('simple1');
        $product->setStockData(['qty' => 0]);
        $this->productRepository->save($product);
        $this->stockIndexer->executeRow($product->getId());
        $bundleProduct = $this->productRepository->get('bundle_product_with_dynamic_price');
        $this->indexer->executeRow($bundleProduct->getId());
        $this->assertIndexTableData($bundleProduct->getId(), $expectedPrices);
    }

    /**
     * Asserts price data in index table.
     *
     * @param int $productId
     * @param array $expectedPrices
     * @return void
     */
    private function assertIndexTableData(int $productId, array $expectedPrices): void
    {
        $data = $this->getPriceIndexDataByProductId->execute(
            $productId,
            Group::NOT_LOGGED_IN_ID,
            (int)$this->websiteRepository->get('base')->getId()
        );
        $data = reset($data);
        foreach ($expectedPrices as $column => $price) {
            $this->assertEquals($price, $data[$column]);
        }
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }
}
