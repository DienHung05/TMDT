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

namespace Magento\ConfigurableProduct\Block\Product\View\CustomOptions;

use Magento\Catalog\Block\Product\View\Options\AbstractRenderCustomOptionsTest;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProviderExternal;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * Test cases related to check that configurable product custom option renders as expected.
 *
 * @magentoAppArea frontend
 */
class RenderOptionsTest extends AbstractRenderCustomOptionsTest
{
    /**
     * Check that options from text group(field, area) render on configurable product as expected.
     *
     * @magentoDataFixture Magento/ConfigurableProduct/_files/configurable_product_with_two_child_products.php
<<<<<<< HEAD
=======
     * @dataProvider \Magento\TestFramework\ConfigurableProduct\Block\CustomOptions\TextGroupDataProvider::getData
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     *
     * @param array $optionData
     * @param array $checkArray
     * @return void
     */
<<<<<<< HEAD
    #[DataProviderExternal(\Magento\TestFramework\ConfigurableProduct\Block\CustomOptions\TextGroupDataProvider::class, 'getData')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testRenderCustomOptionsFromTextGroup(array $optionData, array $checkArray): void
    {
        $this->assertTextOptionRenderingOnProduct('Configurable product', $optionData, $checkArray);
    }

    /**
     * Check that options from file group(file) render on configurable product as expected.
     *
     * @magentoDataFixture Magento/ConfigurableProduct/_files/configurable_product_with_two_child_products.php
<<<<<<< HEAD
=======
     * @dataProvider \Magento\TestFramework\ConfigurableProduct\Block\CustomOptions\FileGroupDataProvider::getData
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     *
     * @param array $optionData
     * @param array $checkArray
     * @return void
     */
<<<<<<< HEAD
    #[DataProviderExternal(\Magento\TestFramework\ConfigurableProduct\Block\CustomOptions\FileGroupDataProvider::class, 'getData')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testRenderCustomOptionsFromFileGroup(array $optionData, array $checkArray): void
    {
        $this->assertFileOptionRenderingOnProduct('Configurable product', $optionData, $checkArray);
    }

    /**
     * Check that options from select group(drop-down, radio buttons, checkbox, multiple select) render
     * on configurable product as expected.
     *
     * @magentoDataFixture Magento/ConfigurableProduct/_files/configurable_product_with_two_child_products.php
<<<<<<< HEAD
=======
     * @dataProvider \Magento\TestFramework\ConfigurableProduct\Block\CustomOptions\SelectGroupDataProvider::getData
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     *
     * @param array $optionData
     * @param array $optionValueData
     * @param array $checkArray
     * @return void
     */
<<<<<<< HEAD
    #[DataProviderExternal(\Magento\TestFramework\ConfigurableProduct\Block\CustomOptions\SelectGroupDataProvider::class, 'getData')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testRenderCustomOptionsFromSelectGroup(
        array $optionData,
        array $optionValueData,
        array $checkArray
    ): void {
        $this->assertSelectOptionRenderingOnProduct('Configurable product', $optionData, $optionValueData, $checkArray);
    }

    /**
     * Check that options from date group(date, date & time, time) render on configurable product as expected.
     *
     * @magentoDataFixture Magento/ConfigurableProduct/_files/configurable_product_with_two_child_products.php
<<<<<<< HEAD
=======
     * @dataProvider \Magento\TestFramework\ConfigurableProduct\Block\CustomOptions\DateGroupDataProvider::getData
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     *
     * @param array $optionData
     * @param array $checkArray
     * @return void
     */
<<<<<<< HEAD
    #[DataProviderExternal(\Magento\TestFramework\ConfigurableProduct\Block\CustomOptions\DateGroupDataProvider::class, 'getData')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testRenderCustomOptionsFromDateGroup(array $optionData, array $checkArray): void
    {
        $this->assertDateOptionRenderingOnProduct('Configurable product', $optionData, $checkArray);
    }

    /**
     * @inheritdoc
     */
    protected function getHandlesList(): array
    {
        return [
            'default',
            'catalog_product_view',
            'catalog_product_view_type_configurable',
        ];
    }

    /**
     * @inheritdoc
     */
    protected function getMaxCharactersCssClass(): string
    {
        return 'class="character-counter';
    }

    /**
     * @inheritdoc
     */
    protected function getOptionsBlockName(): string
    {
        return 'product.info.options';
    }
}
