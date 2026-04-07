<?php
/**
<<<<<<< HEAD
 * Copyright 2019 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

namespace Magento\Swatches\Block\Product\Renderer\Configurable\Listing;

use Magento\Swatches\Block\Product\Renderer\Configurable\ProductPageViewTest;
use Magento\Swatches\Block\Product\Renderer\Listing\Configurable;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * Test class to check configurable product with swatch attributes view behaviour on category page
 *
 * @magentoDbIsolation enabled
 * @magentoAppIsolation enabled
 */
class CategoryPageViewTest extends ProductPageViewTest
{
    /**
     * @inheritdoc
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->block = $this->layout->createBlock(Configurable::class);
        $this->template = 'Magento_Swatches::product/listing/renderer.phtml';
    }

    /**
     * @magentoDataFixture Magento/Swatches/_files/configurable_product_visual_swatch_attribute.php
     *
<<<<<<< HEAD
=======
     * @dataProvider expectedVisualSwatchDataProvider
     *
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @param array $expectedConfig
     * @param array $expectedSwatchConfig
     * @return void
     */
<<<<<<< HEAD
    #[DataProvider('expectedVisualSwatchDataProvider')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testCategoryPageVisualSwatchAttributeView(array $expectedConfig, array $expectedSwatchConfig): void
    {
        $this->checkProductViewCategoryPage($expectedConfig, $expectedSwatchConfig, ['visual_swatch_attribute']);
    }

    /**
     * @magentoDataFixture Magento/Swatches/_files/configurable_product_text_swatch_attribute.php
     *
<<<<<<< HEAD
=======
     * @dataProvider expectedTextSwatchDataProvider
     *
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @param array $expectedConfig
     * @param array $expectedSwatchConfig
     * @return void
     */
<<<<<<< HEAD
    #[DataProvider('expectedTextSwatchDataProvider')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testCategoryPageTextSwatchAttributeView(array $expectedConfig, array $expectedSwatchConfig): void
    {
        $this->checkProductViewCategoryPage($expectedConfig, $expectedSwatchConfig, ['text_swatch_attribute']);
    }

    /**
     * @magentoDataFixture Magento/Swatches/_files/configurable_product_two_attributes.php
     *
<<<<<<< HEAD
=======
     * @dataProvider expectedTwoAttributesProvider
     *
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @param array $expectedConfig
     * @param array $expectedSwatchConfig
     * @return void
     */
<<<<<<< HEAD
    #[DataProvider('expectedTwoAttributesProvider')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testCategoryPageTwoAttributesView(array $expectedConfig, array $expectedSwatchConfig): void
    {
        $this->checkProductViewCategoryPage(
            $expectedConfig,
            $expectedSwatchConfig,
            ['visual_swatch_attribute', 'text_swatch_attribute']
        );
    }

    /**
     * Check configurable product view on category view page
     *
     * @param array $expectedConfig
     * @param array $expectedSwatchConfig
     * @param array $attributes
     * @return void
     */
    private function checkProductViewCategoryPage(
        array $expectedConfig,
        array $expectedSwatchConfig,
        array $attributes
    ): void {
        $this->setAttributeUsedInProductListing($attributes);
        $this->checkProductView($expectedConfig, $expectedSwatchConfig);
    }

    /**
     * Set used in product listing attributes value to true
     *
     * @param array $attributeCodes
     * @return void
     */
    private function setAttributeUsedInProductListing(array $attributeCodes): void
    {
        foreach ($attributeCodes as $attributeCode) {
            $attribute = $this->productAttributeRepository->get($attributeCode);
            $attribute->setUsedInProductListing('1');
            $this->productAttributeRepository->save($attribute);
        }
    }
}
