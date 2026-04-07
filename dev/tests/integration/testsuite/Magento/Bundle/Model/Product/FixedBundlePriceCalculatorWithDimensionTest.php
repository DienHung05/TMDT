<?php
/**
<<<<<<< HEAD
 * Copyright 2018 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

namespace Magento\Bundle\Model\Product;

<<<<<<< HEAD
use Magento\Bundle\Api\Data\LinkInterface;
use PHPUnit\Framework\Attributes\DataProvider;
=======
use \Magento\Bundle\Api\Data\LinkInterface;
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * @magentoDbIsolation disabled
 * @magentoIndexerDimensionMode catalog_product_price website_and_customer_group
 * @group indexer_dimension
 */
class FixedBundlePriceCalculatorWithDimensionTest extends BundlePriceAbstract
{
    /**
     * @param array $strategyModifiers
     * @param array $expectedResults
<<<<<<< HEAD
=======
     * @dataProvider getTestCases
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @magentoAppIsolation enabled
     * @magentoDataFixture Magento/Bundle/_files/PriceCalculator/fixed_bundle_product.php
     * @magentoDbIsolation disabled
     */
<<<<<<< HEAD
    #[DataProvider('getTestCases')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testPriceForFixedBundle(array $strategyModifiers, array $expectedResults)
    {
        $this->prepareFixture($strategyModifiers, 'bundle_product');
        $bundleProduct = $this->productRepository->get('bundle_product', false, null, true);

        /** @var \Magento\Framework\Pricing\PriceInfo\Base $priceInfo */
        $priceInfo = $bundleProduct->getPriceInfo();
        $priceCode = \Magento\Catalog\Pricing\Price\FinalPrice::PRICE_CODE;

        $this->assertEquals(
            $expectedResults['minimalPrice'],
            $priceInfo->getPrice($priceCode)->getMinimalPrice()->getValue(),
            'Failed to check minimal price on product'
        );
        $this->assertEquals(
            $expectedResults['maximalPrice'],
            $priceInfo->getPrice($priceCode)->getMaximalPrice()->getValue(),
            'Failed to check maximal price on product'
        );

        $priceInfoFromIndexer = $this->productCollectionFactory->create()
            ->addIdFilter([42])
            ->addPriceData()
            ->load()
            ->getFirstItem();

        $this->assertEquals($expectedResults['minimalPrice'], $priceInfoFromIndexer->getMinimalPrice());
        $this->assertEquals($expectedResults['maximalPrice'], $priceInfoFromIndexer->getMaxPrice());
    }

    /**
     * @param array $strategyModifiers
     * @param array $expectedResults
<<<<<<< HEAD
=======
     * @dataProvider getTestCases
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @magentoAppIsolation enabled
     * @magentoConfigFixture current_store catalog/price/scope 1
     * @magentoDataFixture Magento/Bundle/_files/PriceCalculator/fixed_bundle_product.php
     * @magentoDbIsolation disabled
     */
<<<<<<< HEAD
    #[DataProvider('getTestCases')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testPriceForFixedBundleInWebsiteScope(array $strategyModifiers, array $expectedResults)
    {
        $this->prepareFixture($strategyModifiers, 'bundle_product');
        $bundleProduct = $this->productRepository->get('bundle_product', false, null, true);

        /** @var \Magento\Framework\Pricing\PriceInfo\Base $priceInfo */
        $priceInfo = $bundleProduct->getPriceInfo();
        $priceCode = \Magento\Catalog\Pricing\Price\FinalPrice::PRICE_CODE;

        $this->assertEquals(
            $expectedResults['minimalPrice'],
            $priceInfo->getPrice($priceCode)->getMinimalPrice()->getValue(),
            'Failed to check minimal price on product'
        );
        $this->assertEquals(
            $expectedResults['maximalPrice'],
            $priceInfo->getPrice($priceCode)->getMaximalPrice()->getValue(),
            'Failed to check maximal price on product'
        );

        $priceInfoFromIndexer = $this->productCollectionFactory->create()
            ->addFieldToFilter('sku', 'bundle_product')
            ->addPriceData()
            ->load()
            ->getFirstItem();

        $this->assertEquals($expectedResults['minimalPrice'], $priceInfoFromIndexer->getMinimalPrice());
        $this->assertEquals($expectedResults['maximalPrice'], $priceInfoFromIndexer->getMaxPrice());
    }

    /**
     * Test cases for current test
     * @return array
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
<<<<<<< HEAD
    public static function getTestCases()
    {
        return [
            '#1 Testing price for fixed bundle product with one simple' => [
                'strategyModifiers' => self::getProductWithOneSimple(),
=======
    public function getTestCases()
    {
        return [
            '#1 Testing price for fixed bundle product with one simple' => [
                'strategy' => $this->getProductWithOneSimple(),
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                'expectedResults' => [
                    //  110 + 10 (price from simple1)
                    'minimalPrice' => 120,
                    // 110 + 10 (sum of simple price)
                    'maximalPrice' => 120,
                ]
            ],

            '#2 Testing price for fixed bundle product with three simples and different qty' => [
<<<<<<< HEAD
                'strategyModifiers' => self::getProductWithDifferentQty(),
=======
                'strategy' => $this->getProductWithDifferentQty(),
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                'expectedResults' => [
                    // 110 + 10 (min price from simples)
                    'minimalPrice' => 120,
                    //  110 + (3 * 10) + (2 * 10) + 10
                    'maximalPrice' => 170,
                ]
            ],

            '#3 Testing price for fixed bundle product with three simples and different price' => [
<<<<<<< HEAD
                'strategyModifiers' => self::getProductWithDifferentPrice(),
=======
                'strategy' => $this->getProductWithDifferentPrice(),
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                'expectedResults' => [
                    //  110 + 10
                    'minimalPrice' => 120,
                    // 110 + 60
                    'maximalPrice' => 170,
                ]
            ],

            '#4 Testing price for fixed bundle product with three simples' => [
<<<<<<< HEAD
                'strategyModifiers' => self::getProductWithSamePrice(),
=======
                'strategy' => $this->getProductWithSamePrice(),
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                'expectedResults' => [
                    //  110 + 10
                    'minimalPrice' => 120,
                    // 110 + 30
                    'maximalPrice' => 140,
                ]
            ],

            '
<<<<<<< HEAD
                #5 Testing price for fixed bundle product
                with fixed sub items, fixed options and without any discounts
            ' => [
                'strategyModifiers' => self::getBundleConfiguration3(
=======
                #5 Testing price for fixed bundle product 
                with fixed sub items, fixed options and without any discounts
            ' => [
                'strategy' => $this->getBundleConfiguration3(
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    LinkInterface::PRICE_TYPE_FIXED,
                    self::CUSTOM_OPTION_PRICE_TYPE_FIXED
                ),
                'expectedResults' => [
                    // 110 + 1 * 20 + 100
                    'minimalPrice' => 230,

                    // 110 + 1 * 20 + 100
                    'maximalPrice' => 230,
                ]
            ],

            '
<<<<<<< HEAD
                #6 Testing price for fixed bundle product
                with percent sub items, percent options and without any discounts
            ' => [
                'strategyModifiers' => self::getBundleConfiguration3(
=======
                #6 Testing price for fixed bundle product 
                with percent sub items, percent options and without any discounts
            ' => [
                'strategy' => $this->getBundleConfiguration3(
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    LinkInterface::PRICE_TYPE_PERCENT,
                    self::CUSTOM_OPTION_PRICE_TYPE_PERCENT
                ),
                'expectedResults' => [
                    // 110 + 110 * 0.2 + 110 * 1
                    'minimalPrice' => 242,

                    // 110 + 110 * 0.2 + 110 * 1
                    'maximalPrice' => 242,
                ]
            ],

            '
<<<<<<< HEAD
                #7 Testing price for fixed bundle product
                with fixed sub items, percent options and without any discounts
            ' => [
                'strategyModifiers' => self::getBundleConfiguration3(
=======
                #7 Testing price for fixed bundle product 
                with fixed sub items, percent options and without any discounts
            ' => [
                'strategy' => $this->getBundleConfiguration3(
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    LinkInterface::PRICE_TYPE_FIXED,
                    self::CUSTOM_OPTION_PRICE_TYPE_PERCENT
                ),
                'expectedResults' => [
                    // 110 + 1 * 20 + 110 * 1
                    'minimalPrice' => 240,

                    // 110 + 1 * 20 + 110 * 1
                    'maximalPrice' => 240,
                ]
            ],

            '
<<<<<<< HEAD
                #8 Testing price for fixed bundle product
                with percent sub items, fixed options and without any discounts
            ' => [
                'strategyModifiers' => self::getBundleConfiguration3(
=======
                #8 Testing price for fixed bundle product 
                with percent sub items, fixed options and without any discounts
            ' => [
                'strategy' => $this->getBundleConfiguration3(
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    LinkInterface::PRICE_TYPE_PERCENT,
                    self::CUSTOM_OPTION_PRICE_TYPE_FIXED
                ),
                'expectedResults' => [
                    // 110 + 110 * 0.2 + 100
                    'minimalPrice' => 232,

                    // 110 + 110 * 0.2 + 100
                    'maximalPrice' => 232,
                ]
            ],
        ];
    }

    /**
     * Fixed bundle product with one simple
     * @return array
     */
<<<<<<< HEAD
    private static function getProductWithOneSimple()
=======
    private function getProductWithOneSimple()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        $optionsData = [
            [
                'title' => 'Op1',
                'required' => true,
                'type' => 'checkbox',
                'links' => [
                    [
                        'sku' => 'simple1',
                        'price' => 10,
                        'qty' => 1,
                        'price_type' => LinkInterface::PRICE_TYPE_FIXED,
                    ],
                ]
            ],
        ];

        return [
            [
                'modifierName' => 'addSimpleProduct',
                'data' => [$optionsData]
            ],
        ];
    }

    /**
     * Fixed bundle product with three simples and different qty
     * @return array
     */
<<<<<<< HEAD
    private static function getProductWithDifferentQty()
=======
    private function getProductWithDifferentQty()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        $optionsData = [
            [
                'title' => 'Op1',
                'required' => true,
                'type' => 'checkbox',
                'links' => [
                    [
                        'sku' => 'simple1',
                        'price' => 10,
                        'qty' => 3,
                        'price_type' => LinkInterface::PRICE_TYPE_FIXED,
                    ],
                    [
                        'sku' => 'simple2',
                        'price' => 10,
                        'qty' => 2,
                        'price_type' => LinkInterface::PRICE_TYPE_FIXED,
                    ],
                    [
                        'sku' => 'simple3',
                        'price' => 10,
                        'qty' => 1,
                        'price_type' => LinkInterface::PRICE_TYPE_FIXED,
                    ],
                ]
            ]
        ];

        return [
            [
                'modifierName' => 'addSimpleProduct',
                'data' => [$optionsData]
            ],
        ];
    }

    /**
     * Fixed bundle product with three simples and different price
     * @return array
     */
<<<<<<< HEAD
    private static function getProductWithSamePrice()
=======
    private function getProductWithSamePrice()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        $optionsData = [
            [
                'title' => 'Op1',
                'required' => true,
                'type' => 'checkbox',
                'links' => [
                    [
                        'sku' => 'simple1',
                        'price' => 10,
                        'qty' => 1,
                        'price_type' => LinkInterface::PRICE_TYPE_FIXED,
                    ],
                    [
                        'sku' => 'simple2',
                        'price' => 10,
                        'qty' => 1,
                        'price_type' => LinkInterface::PRICE_TYPE_FIXED,
                    ],
                    [
                        'sku' => 'simple3',
                        'price' => 10,
                        'qty' => 1,
                        'price_type' => LinkInterface::PRICE_TYPE_FIXED,
                    ]
                ]
            ]
        ];

        return [
            [
                'modifierName' => 'addSimpleProduct',
                'data' => [$optionsData]
            ],
        ];
    }

    /**
     * Fixed bundle product with three simples
     * @return array
     */
<<<<<<< HEAD
    private static function getProductWithDifferentPrice()
=======
    private function getProductWithDifferentPrice()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        $optionsData = [
            [
                'title' => 'Op1',
                'required' => true,
                'type' => 'checkbox',
                'links' => [
                    [
                        'sku' => 'simple1',
                        'price' => 10,
                        'qty' => 1,
                        'price_type' => LinkInterface::PRICE_TYPE_FIXED,
                    ],
                    [
                        'sku' => 'simple2',
                        'price' => 20,
                        'qty' => 1,
                        'price_type' => LinkInterface::PRICE_TYPE_FIXED,
                    ],
                    [
                        'sku' => 'simple3',
                        'price' => 30,
                        'qty' => 1,
                        'price_type' => LinkInterface::PRICE_TYPE_FIXED,
                    ]
                ]
            ]
        ];

        return [
            [
                'modifierName' => 'addSimpleProduct',
                'data' => [$optionsData]
            ],
        ];
    }

    /**
     * Fixed bundle product with required option, custom option and without any discounts
     * @param string $selectionsPriceType
     * @param string $customOptionsPriceType
     * @return array
     */
<<<<<<< HEAD
    private static function getBundleConfiguration3($selectionsPriceType, $customOptionsPriceType)
=======
    private function getBundleConfiguration3($selectionsPriceType, $customOptionsPriceType)
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        $optionsData = [
            [
                'title' => 'Op1',
                'required' => true,
                'type' => 'checkbox',
                'links' => [
                    [
                        'sku' => 'simple1',
                        'qty' => 1,
                        'price' => 20,
                        'price_type' => $selectionsPriceType
                    ],
                ]
            ],
        ];

        $customOptionsData = [
            [
                'price_type' => $customOptionsPriceType,
                'title' => 'Test Field',
                'type' => 'field',
                'is_require' => 1,
                'price' => 100,
                'sku' => '1-text',
            ]
        ];

        return [
            [
                'modifierName' => 'addSimpleProduct',
                'data' => [$optionsData]
            ],
            [
                'modifierName' => 'addCustomOption',
                'data' => [$customOptionsData]
            ],
        ];
    }
}
