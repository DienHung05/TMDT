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

namespace Magento\Bundle\Controller\Adminhtml\Product;

use Magento\Bundle\Model\Product\Price;
use Magento\Catalog\Model\Product\Type\AbstractType;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * Class checks dynamic bundle product save behavior
 *
 * @magentoAppArea adminhtml
 */
class DynamicBundleProductTest extends AbstractBundleProductSaveTest
{
    /**
     * @magentoDataFixture Magento/Catalog/_files/second_product_simple.php
     *
<<<<<<< HEAD
     * @param array $post
     * @return void
     */
    #[DataProvider('bundleProductDataProvider')]
=======
     * @dataProvider bundleProductDataProvider
     *
     * @param array $post
     * @return void
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testBundleProductSave(array $post): void
    {
        $post = $this->prepareRequestData($post);
        $this->dispatch('backend/catalog/product/save');
        $this->assertBundleOptions($post['bundle_options']);
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function bundleProductDataProvider(): array
=======
    public function bundleProductDataProvider(): array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            'with_dropdown_option' => [
                'post' => [
                    'bundle_options' => [
                        'bundle_options' => [
                            [
                                'type' => 'select',
                                'bundle_selections' => [
                                    [
                                        'name' => 'Simple Product2',
                                        'sku' => 'simple2',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            'with_radio_buttons_option' => [
                'post' => [
                    'bundle_options' => [
                        'bundle_options' => [
                            [
                                'type' => 'radio',
                                'bundle_selections' => [
                                    [
                                        'name' => 'Simple Product2',
                                        'sku' => 'simple2',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            'with_checkbox_option' => [
                'post' => [
                    'bundle_options' => [
                        'bundle_options' => [
                            [
                                'type' => 'checkbox',
                                'bundle_selections' => [
                                    [
                                        'name' => 'Simple Product2',
                                        'sku' => 'simple2',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            'with_multiselect_option' => [
                'post' => [
                    'bundle_options' => [
                        'bundle_options' => [
                            [
                                'type' => 'multi',
                                'bundle_selections' => [
                                    [
                                        'name' => 'Simple Product2',
                                        'sku' => 'simple2',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    /**
     * @magentoDataFixture Magento/Catalog/_files/second_product_simple.php
     * @magentoDataFixture Magento/Catalog/_files/product_simple_duplicated.php
     *
<<<<<<< HEAD
     * @param array $post
     * @return void
     */
    #[DataProvider('multiOptionsDataProvider')]
=======
     * @dataProvider multiOptionsDataProvider
     *
     * @param array $post
     * @return void
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testBundleProductSaveMultiOptions(array $post): void
    {
        $post = $this->prepareRequestData($post);
        $this->dispatch('backend/catalog/product/save');
        $this->assertBundleOptions($post['bundle_options']);
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function multiOptionsDataProvider(): array
=======
    public function multiOptionsDataProvider(): array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            'with_two_options_few_selections' => [
                'post' => [
                    'bundle_options' => [
                        'bundle_options' => [
                            [
                                'type' => 'select',
                                'bundle_selections' => [
                                    [
                                        'name' => 'Simple Product2',
                                        'sku' => 'simple2',
                                    ],
                                    [
                                        'name' => 'Simple Product',
                                        'sku' => 'simple-1',
                                    ],
                                ],
                            ],
                            [
                                'type' => 'checkbox',
                                'bundle_selections' => [
                                    [
                                        'name' => 'Simple Product',
                                        'sku' => 'simple-1',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    /**
     * @magentoDataFixture Magento/Catalog/_files/second_product_simple.php
     *
<<<<<<< HEAD
     * @param array $post
     * @return void
     */
    #[DataProvider('emptyOptionTitleDataProvider')]
=======
     * @dataProvider emptyOptionTitleDataProvider
     *
     * @param array $post
     * @return void
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testProductSaveMissedOptionTitle(array $post): void
    {
        $this->productToDelete = null;
        $post =  $this->prepareRequestData($post);
        $this->dispatch('backend/catalog/product/save');
        $this->assertSessionMessages($this->equalTo(["The option couldn't be saved."]));
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function emptyOptionTitleDataProvider(): array
=======
    public function emptyOptionTitleDataProvider(): array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            'empty_option_title' => [
                'post' => [
                    'bundle_options' => [
                        'bundle_options' => [
                            [
                                'title' => '',
                                'type' => 'multi',
                                'bundle_selections' => [
                                    [
                                        'name' => 'Simple Product2',
                                        'sku' => 'simple2',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    /**
     * @magentoDataFixture Magento/Bundle/_files/bundle_product_checkbox_options.php
     * @magentoDataFixture Magento/Catalog/_files/second_product_simple.php
     *
<<<<<<< HEAD
     * @param array $post
     * @return void
     */
    #[DataProvider('updateProductDataProvider')]
=======
     * @dataProvider updateProductDataProvider
     *
     * @param array $post
     * @return void
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testUpdateProduct(array $post): void
    {
        $id = $this->productRepository->get('bundle-product-checkbox-options')->getId();
        $post =  $this->prepareRequestData($post, (int)$id);
        $this->dispatch('backend/catalog/product/save');
        $this->assertBundleOptions($post['bundle_options']);
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function updateProductDataProvider(): array
=======
    public function updateProductDataProvider(): array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            'update_existing_product' => [
                'post' => [
                    'bundle_options' => [
                        'bundle_options' => [
                            [
                                'type' => 'multi',
                                'bundle_selections' => [
                                    [
                                        'name' => 'Simple Product2',
                                        'sku' => 'simple2',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    protected function getStaticProductData(): array
    {
        return [
            'sku' => 'bundle-test-product',
            'name' => 'test-bundle',
            'price' => '',
            'sku_type' => '0',
            'price_type' => Price::PRICE_TYPE_DYNAMIC,
            'weight_type' => '0',
            'shipment_type' => AbstractType::SHIPMENT_TOGETHER,
            'attribute_set_id' => $this->getDefaultAttributeSetId(),
        ];
    }
}
