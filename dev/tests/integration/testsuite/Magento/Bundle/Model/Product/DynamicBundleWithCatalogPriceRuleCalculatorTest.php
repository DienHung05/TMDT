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

namespace Magento\Bundle\Model\Product;

<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;

=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
/**
 * @codingStandardsIgnoreStart
 * @magentoDataFixtureBeforeTransaction Magento/Bundle/_files/PriceCalculator/dynamic_bundle_product_with_catalog_rule.php
 * @codingStandardsIgnoreEnd
 * @magentoDbIsolation enabled
 * @magentoAppArea frontend
 */
class DynamicBundleWithCatalogPriceRuleCalculatorTest extends BundlePriceAbstract
{
    /**
     * @param array $strategyModifiers
     * @param array $expectedResults
<<<<<<< HEAD
     * @magentoAppIsolation enabled
     */
    #[DataProvider('getTestCases')]
=======
     * @dataProvider getTestCases
     * @magentoAppIsolation enabled
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testPriceForDynamicBundle(array $strategyModifiers, array $expectedResults)
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
            '#1 Testing price for dynamic bundle with one required option' => [
                'strategyModifiers' => self::getBundleProductConfiguration1(),
=======
    public function getTestCases()
    {
        return [
            '#1 Testing price for dynamic bundle with one required option' => [
                'strategy' => $this->getBundleProductConfiguration1(),
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                'expectedResults' => [
                    // 10 * 0.9
                    'minimalPrice' => 9,

                    // 10 * 0.9
                    'maximalPrice' => 9
                ]
            ],

            '#3 Testing price for dynamic bundle with one non required option' => [
<<<<<<< HEAD
                'strategyModifiers' => self::getBundleProductConfiguration3(),
=======
                'strategy' => $this->getBundleProductConfiguration3(),
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                'expectedResults' => [
                    // 0.9 * 2 * 10
                    'minimalPrice' => 18,

                    // 0.9 * 2 * 10
                    'maximalPrice' => 18
                ]
            ],

            '#4 Testing price for dynamic bundle with one required checkbox type option and 2 simples' => [
<<<<<<< HEAD
                'strategyModifiers' => self::getBundleProductConfiguration4(),
=======
                'strategy' => $this->getBundleProductConfiguration4(),
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                'expectedResults' => [
                    // 0.9 * 1 * 10
                    'minimalPrice' => 9,

                    // 0.9 * 1 * 10 + 3 * 0.9 * 20
                    'maximalPrice' => 63
                ]
            ],

            '#5 Testing price for dynamic bundle with one required multi type option and 2 simples' => [
<<<<<<< HEAD
                'strategyModifiers' => self::getBundleProductConfiguration5(),
=======
                'strategy' => $this->getBundleProductConfiguration5(),
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                'expectedResults' => [
                    // 0.9 * 1 * 10
                    'minimalPrice' => 9,

                    // 0.9 * 1 * 10 + 3 * 0.9 * 20
                    'maximalPrice' => 63
                ]
            ],

            '#6 Testing price for dynamic bundle with one required radio type option and 2 simples' => [
<<<<<<< HEAD
                'strategyModifiers' => self::getBundleProductConfiguration6(),
=======
                'strategy' => $this->getBundleProductConfiguration6(),
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                'expectedResults' => [
                    // 0.9 * 1 * 10
                    'minimalPrice' => 9,

                    // 0.9 * 3 * 20
                    'maximalPrice' => 54
                ]
            ],

            '#7 Testing price for dynamic bundle with two required options' => [
<<<<<<< HEAD
                'strategyModifiers' => self::getBundleProductConfiguration7(),
=======
                'strategy' => $this->getBundleProductConfiguration7(),
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                'expectedResults' => [
                    // 0.9 * 1 * 10 + 0.9 * 1 * 10
                    'minimalPrice' => 18,

                    // 3 * 0.9 * 20 + 1 * 0.9 * 10 + 3 * 0.9 * 20
                    'maximalPrice' => 117
                ]
            ],

            '#8 Testing price for dynamic bundle with one required option and one non required' => [
<<<<<<< HEAD
                'strategyModifiers' => self::getBundleProductConfiguration8(),
=======
                'strategy' => $this->getBundleProductConfiguration8(),
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                'expectedResults' => [
                    // 1 * 0.9 * 10
                    'minimalPrice' => 9,

                    // 3 * 0.9 * 20 + 1 * 0.9 * 10 + 3 * 0.9 * 20
                    'maximalPrice' => 117
                ]
            ],

            '#9 Testing price for dynamic bundle with two non required options' => [
<<<<<<< HEAD
                'strategyModifiers' => self::getBundleProductConfiguration9(),
=======
                'strategy' => $this->getBundleProductConfiguration9(),
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                'expectedResults' => [
                    // 0.9 * 1 * 10
                    'minimalPrice' => 9,

                    // 3 * 0.9 * 20 + 1 * 0.9 * 10 + 3 * 0.9 * 20
                    'maximalPrice' => 117
                ]
            ],
        ];
    }

    /**
     * Dynamic bundle with one required option
     * @return array
     */
<<<<<<< HEAD
    private static function getBundleProductConfiguration1()
=======
    private function getBundleProductConfiguration1()
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
     * Dynamic bundle with one non required option
     * @return array
     */
<<<<<<< HEAD
    private static function getBundleProductConfiguration3()
=======
    private function getBundleProductConfiguration3()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        $optionsData = [
            [
                'title' => 'Op1',
                'type' => 'checkbox',
                'required' => false,
                'links' => [
                    [
                        'sku' => 'simple1',
                        'qty' => 2,
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
     * Dynamic bundle with one required checkbox type option and 2 simples
     * @return array
     */
<<<<<<< HEAD
    private static function getBundleProductConfiguration4()
=======
    private function getBundleProductConfiguration4()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        $optionsData = [
            [
                'title' => 'Op1',
                'type' => 'checkbox',
                'required' => true,
                'links' => [
                    [
                        'sku' => 'simple1',
                        'qty' => 1,
                    ],
                    [
                        'sku' => 'simple2',
                        'qty' => 3,
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
     * Dynamic bundle with one required multi type option and 2 simples
     * @return array
     */
<<<<<<< HEAD
    private static function getBundleProductConfiguration5()
=======
    private function getBundleProductConfiguration5()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        $optionsData = [
            [
                'title' => 'Op1',
                'required' => true,
                'type' => 'multi',
                'links' => [
                    [
                        'sku' => 'simple1',
                        'qty' => 1,
                    ],
                    [
                        'sku' => 'simple2',
                        'qty' => 3,
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
     * Dynamic bundle with one required radio type option and 2 simples
     * @return array
     */
<<<<<<< HEAD
    private static function getBundleProductConfiguration6()
=======
    private function getBundleProductConfiguration6()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        $optionsData = [
            [
                'title' => 'Op1',
                'required' => true,
                'type' => 'radio',
                'links' => [
                    [
                        'sku' => 'simple1',
                        'qty' => 1,
                    ],
                    [
                        'sku' => 'simple2',
                        'qty' => 3,
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
     * Dynamic bundle with two required options
     * @return array
     */
<<<<<<< HEAD
    private static function getBundleProductConfiguration7()
=======
    private function getBundleProductConfiguration7()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        $optionsData = [
            [
                'title' => 'Op1',
                'required' => true,
                'type' => 'radio',
                'links' => [
                    [
                        'sku' => 'simple1',
                        'qty' => 1,
                    ],
                    [
                        'sku' => 'simple2',
                        'qty' => 3,
                    ],
                ]
            ],
            [
                'title' => 'Op2',
                'required' => true,
                'type' => 'checkbox',
                'links' => [
                    [
                        'sku' => 'simple1',
                        'qty' => 1,
                    ],
                    [
                        'sku' => 'simple2',
                        'qty' => 3,
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
     * Dynamic bundle with one required option and one non required
     * @return array
     */
<<<<<<< HEAD
    private static function getBundleProductConfiguration8()
=======
    private function getBundleProductConfiguration8()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        $optionsData = [
            [
                'title' => 'Op1',
                'required' => false,
                'type' => 'radio',
                'links' => [
                    [
                        'sku' => 'simple1',
                        'qty' => 1,
                    ],
                    [
                        'sku' => 'simple2',
                        'qty' => 3,
                    ],
                ]
            ],
            [
                'title' => 'Op2',
                'required' => true,
                'type' => 'checkbox',
                'links' => [
                    [
                        'sku' => 'simple1',
                        'qty' => 1,
                    ],
                    [
                        'sku' => 'simple2',
                        'qty' => 3,
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
     * Dynamic bundle with two non required options
     * @return array
     */
<<<<<<< HEAD
    private static function getBundleProductConfiguration9()
=======
    private function getBundleProductConfiguration9()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        $optionsData = [
            [
                'title' => 'Op1',
                'required' => false,
                'type' => 'radio',
                'links' => [
                    [
                        'sku' => 'simple1',
                        'qty' => 1,
                    ],
                    [
                        'sku' => 'simple2',
                        'qty' => 3,
                    ],
                ]
            ],
            [
                'title' => 'Op2',
                'required' => false,
                'type' => 'checkbox',
                'links' => [
                    [
                        'sku' => 'simple1',
                        'qty' => 1,
                    ],
                    [
                        'sku' => 'simple2',
                        'qty' => 3,
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
}
