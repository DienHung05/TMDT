<?php
/**
<<<<<<< HEAD
 * Copyright 2013 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

namespace Magento\Catalog\Model\Product\Attribute\Backend;

use Magento\Catalog\Api\Data\ProductInterface;
<<<<<<< HEAD
use Magento\Catalog\Api\Data\ProductTierPriceInterfaceFactory;
use Magento\Catalog\Model\Product;
use Magento\Catalog\Model\Product\Type;
use Magento\Catalog\Model\ProductRepository;
use Magento\Framework\DataObject;
use Magento\Framework\EntityManager\MetadataPool;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\InputException;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\StateException;
use Magento\TestFramework\Helper\Bootstrap;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * Test class for \Magento\Catalog\Model\Product\Attribute\Backend\Tierprice.
 *
 * @magentoDataFixture Magento/Catalog/_files/product_simple.php
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
<<<<<<< HEAD
class TierpriceTest extends TestCase
{
    /**
     * @var MetadataPool
=======
class TierpriceTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Magento\Framework\EntityManager\MetadataPool
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     */
    protected $metadataPool;

    /**
<<<<<<< HEAD
     * @var ProductRepository
=======
     * @var \Magento\Catalog\Model\ProductRepository
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     */
    protected $productRepository;

    /**
<<<<<<< HEAD
     * @var ProductTierPriceInterfaceFactory
=======
     * @var \Magento\Catalog\Api\Data\ProductTierPriceInterfaceFactory
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     */
    private $tierPriceFactory;

    /**
<<<<<<< HEAD
     * @var Tierprice
=======
     * @var \Magento\Catalog\Model\Product\Attribute\Backend\Tierprice
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     */
    protected $_model;

    protected function setUp(): void
    {
<<<<<<< HEAD
        $this->_model = Bootstrap::getObjectManager()->create(
            Tierprice::class
        );
        $this->productRepository = Bootstrap::getObjectManager()->create(
            ProductRepository::class
        );
        $this->metadataPool = Bootstrap::getObjectManager()->create(
            MetadataPool::class
        );
        $this->tierPriceFactory = Bootstrap::getObjectManager()
            ->create(ProductTierPriceInterfaceFactory::class);

        $this->_model->setAttribute(
            Bootstrap::getObjectManager()->get(
=======
        $this->_model = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
            \Magento\Catalog\Model\Product\Attribute\Backend\Tierprice::class
        );
        $this->productRepository = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
            \Magento\Catalog\Model\ProductRepository::class
        );
        $this->metadataPool = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
            \Magento\Framework\EntityManager\MetadataPool::class
        );
        $this->tierPriceFactory = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()
            ->create(\Magento\Catalog\Api\Data\ProductTierPriceInterfaceFactory::class);

        $this->_model->setAttribute(
            \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->get(
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                \Magento\Eav\Model\Config::class
            )->getAttribute(
                'catalog_product',
                'tier_price'
            )
        );
    }

    public function testValidate()
    {
<<<<<<< HEAD
        $product = new DataObject();
=======
        $product = new \Magento\Framework\DataObject();
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $product->setTierPrice(
            [
                ['website_id' => 0, 'cust_group' => 1, 'price_qty' => 2, 'price' => 8],
                ['website_id' => 0, 'cust_group' => 1, 'price_qty' => 5, 'price' => 5],
                ['website_id' => 0, 'cust_group' => 1, 'price_qty' => 5.6, 'price' => 4],
            ]
        );
        $this->assertTrue($this->_model->validate($product));
    }

    /**
     * Test that duplicated tier price values issues exception during validation.
<<<<<<< HEAD
     */
    #[DataProvider('validateDuplicateDataProvider')]
    public function testValidateDuplicate(array $tierPricesData)
    {
        $this->expectException(LocalizedException::class);

        $product = new DataObject();
=======
     *
     * @dataProvider validateDuplicateDataProvider
     */
    public function testValidateDuplicate(array $tierPricesData)
    {
        $this->expectException(\Magento\Framework\Exception\LocalizedException::class);

        $product = new \Magento\Framework\DataObject();
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $product->setTierPrice($tierPricesData);

        $this->_model->validate($product);
    }

    /**
     * testValidateDuplicate data provider.
     *
     * @return array
     */
<<<<<<< HEAD
    public static function validateDuplicateDataProvider(): array
=======
    public function validateDuplicateDataProvider(): array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            [
                [
                    ['website_id' => 0, 'cust_group' => 1, 'price_qty' => 2, 'price' => 8],
                    ['website_id' => 0, 'cust_group' => 1, 'price_qty' => 2, 'price' => 8],
                ],
            ],
            [
                [
                    ['website_id' => 0, 'cust_group' => 1, 'price_qty' => 2.2, 'price' => 8],
                    ['website_id' => 0, 'cust_group' => 1, 'price_qty' => 2.2, 'price' => 8],
                ],
            ],
        ];
    }

    /**
     */
    public function testValidateDuplicateWebsite()
    {
<<<<<<< HEAD
        $this->expectException(LocalizedException::class);

        $product = new DataObject();
=======
        $this->expectException(\Magento\Framework\Exception\LocalizedException::class);

        $product = new \Magento\Framework\DataObject();
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $product->setTierPrice(
            [
                ['website_id' => 0, 'cust_group' => 1, 'price_qty' => 2.2, 'price' => 8],
                ['website_id' => 0, 'cust_group' => 1, 'price_qty' => 5.3, 'price' => 5],
                ['website_id' => 1, 'cust_group' => 1, 'price_qty' => 5.3, 'price' => 5],
            ]
        );

        $this->_model->validate($product);
    }

    /**
     */
    public function testValidatePercentage()
    {
<<<<<<< HEAD
        $this->expectException(LocalizedException::class);

        $product = new DataObject();
=======
        $this->expectException(\Magento\Framework\Exception\LocalizedException::class);

        $product = new \Magento\Framework\DataObject();
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $product->setTierPrice(
            [
                ['website_id' => 0, 'cust_group' => 1, 'price_qty' => 2, 'percentage_value' => 101],
            ]
        );

        $this->_model->validate($product);
    }

    public function testPreparePriceData()
    {
        $data = [
<<<<<<< HEAD
            ['website_id' => 0, 'cust_group' => 1, 'price_qty' => 2, 'price' => 8, 'percentage_value' => 10],
            ['website_id' => 0, 'cust_group' => 1, 'price_qty' => 5, 'price' => 5, 'percentage_value' => null],
            ['website_id' => 1, 'cust_group' => 1, 'price_qty' => 5, 'price' => 5, 'percentage_value' => 40],
            ['website_id' => 1, 'cust_group' => 1, 'price_qty' => 5.3, 'price' => 4, 'percentage_value' => 10],
            ['website_id' => 1, 'cust_group' => 1, 'price_qty' => 5.4, 'price' => 3, 'percentage_value' => 50],
            ['website_id' => 1, 'cust_group' => 1, 'price_qty' => '5.40', 'price' => 2, 'percentage_value' => null],
        ];

        $newData = $this->_model->preparePriceData($data, Type::TYPE_SIMPLE, 1);
=======
            ['website_id' => 0, 'cust_group' => 1, 'price_qty' => 2, 'price' => 8],
            ['website_id' => 0, 'cust_group' => 1, 'price_qty' => 5, 'price' => 5],
            ['website_id' => 1, 'cust_group' => 1, 'price_qty' => 5, 'price' => 5],
            ['website_id' => 1, 'cust_group' => 1, 'price_qty' => 5.3, 'price' => 4],
            ['website_id' => 1, 'cust_group' => 1, 'price_qty' => 5.4, 'price' => 3],
            ['website_id' => 1, 'cust_group' => 1, 'price_qty' => '5.40', 'price' => 2],
        ];

        $newData = $this->_model->preparePriceData($data, \Magento\Catalog\Model\Product\Type::TYPE_SIMPLE, 1);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $this->assertCount(4, $newData);
        $this->assertArrayHasKey('1-2', $newData);
        $this->assertArrayHasKey('1-5', $newData);
        $this->assertArrayHasKey('1-5.3', $newData);
        $this->assertArrayHasKey('1-5.4', $newData);
    }

    public function testAfterLoad()
    {
<<<<<<< HEAD
        /** @var $product Product */
        $product = Bootstrap::getObjectManager()->create(
            Product::class
=======
        /** @var $product \Magento\Catalog\Model\Product */
        $product = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
            \Magento\Catalog\Model\Product::class
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        );
        $fixtureProduct = $this->productRepository->get('simple');
        $product->setId($fixtureProduct->getId());
        $linkField = $this->metadataPool->getMetadata(ProductInterface::class)->getLinkField();
        $product->setData($linkField, $fixtureProduct->getData($linkField));
        $this->_model->afterLoad($product);
        $price = $product->getTierPrice();
        $this->assertNotEmpty($price);
        $this->assertCount(5, $price);
    }

    /**
<<<<<<< HEAD
     * @param array $tierPricesData
     * @param int $tierPriceCount
     * @throws CouldNotSaveException
     * @throws InputException
     * @throws NoSuchEntityException
     * @throws StateException
     */
    #[DataProvider('saveExistingProductDataProvider')]
    public function testSaveExistingProduct(array $tierPricesData, int $tierPriceCount): void
    {
        /** @var $product Product */
=======
     * @dataProvider saveExistingProductDataProvider
     * @param array $tierPricesData
     * @param int $tierPriceCount
     * @throws \Magento\Framework\Exception\CouldNotSaveException
     * @throws \Magento\Framework\Exception\InputException
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\StateException
     */
    public function testSaveExistingProduct(array $tierPricesData, int $tierPriceCount): void
    {
        /** @var $product \Magento\Catalog\Model\Product */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $product = $this->productRepository->get('simple', true);
        $tierPrices = [];
        foreach ($tierPricesData as $tierPrice) {
            $tierPrices[] = $this->tierPriceFactory->create([
                'data' => $tierPrice
            ]);
        }
        $product->setTierPrices($tierPrices);
        $product = $this->productRepository->save($product);
        $this->assertEquals($tierPriceCount, count($product->getTierPrice()));
        $this->assertEquals(0, $product->getData('tier_price_changed'));
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function saveExistingProductDataProvider(): array
=======
    public function saveExistingProductDataProvider(): array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            'same' => [
                [
                    ['website_id' => 0, 'customer_group_id' => 32000, 'qty' => 2, 'value' => 8],
                    ['website_id' => 0, 'customer_group_id' => 32000, 'qty' => 5, 'value' => 5],
                    ['website_id' => 0, 'customer_group_id' => 0, 'qty' => 3, 'value' => 5],
                    ['website_id' => 0, 'customer_group_id' => 0, 'qty' => 3.2, 'value' => 6],
                    [
                        'website_id' => 0,
                        'customer_group_id' => 0,
                        'qty' => 10,
<<<<<<< HEAD
                        'extension_attributes' => new DataObject(['percentage_value' => 50])
=======
                        'extension_attributes' => new \Magento\Framework\DataObject(['percentage_value' => 50])
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    ],
                ],
                5,
            ],
            'update one' => [
                [
                    ['website_id' => 0, 'customer_group_id' => 32000, 'qty' => 2, 'value' => 8],
                    ['website_id' => 0, 'customer_group_id' => 32000, 'qty' => 5, 'value' => 5],
                    ['website_id' => 0, 'customer_group_id' => 0, 'qty' => 3, 'value' => 5],
                    ['website_id' => 0, 'customer_group_id' => 0, 'qty' => '3.2', 'value' => 6],
                    [
                        'website_id' => 0,
                        'customer_group_id' => 0,
                        'qty' => 10,
<<<<<<< HEAD
                        'extension_attributes' => new DataObject(['percentage_value' => 10])
=======
                        'extension_attributes' => new \Magento\Framework\DataObject(['percentage_value' => 10])
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    ],
                ],
                5,
            ],
            'delete one' => [
                [
                    ['website_id' => 0, 'customer_group_id' => 32000, 'qty' => 5, 'value' => 5],
                    ['website_id' => 0, 'customer_group_id' => 0, 'qty' => 3, 'value' => 5],
                    ['website_id' => 0, 'customer_group_id' => 0, 'qty' => '3.2', 'value' => 6],
                    [
                        'website_id' => 0,
                        'customer_group_id' => 0,
                        'qty' => 10,
<<<<<<< HEAD
                        'extension_attributes' => new DataObject(['percentage_value' => 50])
=======
                        'extension_attributes' => new \Magento\Framework\DataObject(['percentage_value' => 50])
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    ],
                ],
                4,
            ],
            'add one' => [
                [
                    ['website_id' => 0, 'customer_group_id' => 32000, 'qty' => 2, 'value' => 8],
                    ['website_id' => 0, 'customer_group_id' => 32000, 'qty' => 5, 'value' => 5],
                    ['website_id' => 0, 'customer_group_id' => 0, 'qty' => 3, 'value' => 5],
                    ['website_id' => 0, 'customer_group_id' => 0, 'qty' => 3.2, 'value' => 6],
                    [
                        'website_id' => 0,
                        'customer_group_id' => 32000,
                        'qty' => 20,
<<<<<<< HEAD
                        'extension_attributes' => new DataObject(['percentage_value' => 90])
=======
                        'extension_attributes' => new \Magento\Framework\DataObject(['percentage_value' => 90])
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    ],
                    [
                        'website_id' => 0,
                        'customer_group_id' => 0,
                        'qty' => 10,
<<<<<<< HEAD
                        'extension_attributes' => new DataObject(['percentage_value' => 50])
=======
                        'extension_attributes' => new \Magento\Framework\DataObject(['percentage_value' => 50])
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    ],
                ],
                6,
            ],
            'delete all' => [[], 0,],
        ];
    }

    /**
<<<<<<< HEAD
     * @param array $tierPricesData
     * @param int $tierPriceCount
     * @throws CouldNotSaveException
     * @throws InputException
     * @throws LocalizedException
     * @throws StateException
     */
    #[DataProvider('saveNewProductDataProvider')]
    public function testSaveNewProduct(array $tierPricesData, int $tierPriceCount): void
    {
        /** @var $product Product */
        $product = Bootstrap::getObjectManager()
            ->create(Product::class);
        $product->isObjectNew(true);
        $product->setTypeId(Type::TYPE_SIMPLE)
=======
     * @dataProvider saveNewProductDataProvider
     * @param array $tierPricesData
     * @param int $tierPriceCount
     * @throws \Magento\Framework\Exception\CouldNotSaveException
     * @throws \Magento\Framework\Exception\InputException
     * @throws \Magento\Framework\Exception\LocalizedException
     * @throws \Magento\Framework\Exception\StateException
     */
    public function testSaveNewProduct(array $tierPricesData, int $tierPriceCount): void
    {
        /** @var $product \Magento\Catalog\Model\Product */
        $product = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()
            ->create(\Magento\Catalog\Model\Product::class);
        $product->isObjectNew(true);
        $product->setTypeId(\Magento\Catalog\Model\Product\Type::TYPE_SIMPLE)
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            ->setAttributeSetId(4)
            ->setName('Simple Product New')
            ->setSku('simple product new')
            ->setPrice(10);
        $tierPrices = [];
        foreach ($tierPricesData as $tierPrice) {
            $tierPrices[] = $this->tierPriceFactory->create([
                'data' => $tierPrice,
            ]);
        }
        $product->setTierPrices($tierPrices);
        $product = $this->productRepository->save($product);
        $this->assertEquals($tierPriceCount, count($product->getTierPrice()));
        $this->assertEquals(0, $product->getData('tier_price_changed'));
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function saveNewProductDataProvider(): array
=======
    public function saveNewProductDataProvider(): array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            [
                [
                    ['website_id' => 0, 'customer_group_id' => 32000, 'qty' => 2, 'value' => 8],
                    ['website_id' => 0, 'customer_group_id' => 32000, 'qty' => 5, 'value' => 5],
                    ['website_id' => 0, 'customer_group_id' => 0, 'qty' => 3, 'value' => 5],
                    ['website_id' => 0, 'customer_group_id' => 0, 'qty' => '3.2', 'value' => 4],
                    ['website_id' => 0, 'customer_group_id' => 0, 'qty' => '3.3', 'value' => 3],
                    [
                        'website_id' => 0,
                        'customer_group_id' => 0,
                        'qty' => 10,
<<<<<<< HEAD
                        'extension_attributes' => new DataObject(['percentage_value' => 50])
=======
                        'extension_attributes' => new \Magento\Framework\DataObject(['percentage_value' => 50])
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    ],
                ],
                6,
            ],
        ];
    }
}
