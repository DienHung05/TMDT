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

namespace Magento\Catalog\Block\Product\View\Options;

<<<<<<< HEAD
use Magento\TestFramework\Catalog\Block\Product\View\Options\DateGroupDataProvider;
use Magento\TestFramework\Catalog\Block\Product\View\Options\FileGroupDataProvider;
use Magento\TestFramework\Catalog\Block\Product\View\Options\SelectGroupDataProvider;
use Magento\TestFramework\Catalog\Block\Product\View\Options\TextGroupDataProvider;
use PHPUnit\Framework\Attributes\DataProviderExternal;

=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
/**
 * Test cases related to check that simple product custom option renders as expected.
 *
 * @magentoAppArea frontend
 */
class RenderOptionsTest extends AbstractRenderCustomOptionsTest
{
    /**
<<<<<<< HEAD
     * Check that options from text group (field, area) render as expected.
     *
     * @magentoDataFixture Magento/Catalog/_files/product_without_options_with_stock_data.php
=======
     * Check that options from text group(field, area) render as expected.
     *
     * @magentoDataFixture Magento/Catalog/_files/product_without_options_with_stock_data.php
     * @dataProvider \Magento\TestFramework\Catalog\Block\Product\View\Options\TextGroupDataProvider::getData
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     *
     * @param array $optionData
     * @param array $checkArray
     * @return void
     */
<<<<<<< HEAD
    #[DataProviderExternal(TextGroupDataProvider::class, 'getData')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testRenderCustomOptionsFromTextGroup(array $optionData, array $checkArray): void
    {
        $this->assertTextOptionRenderingOnProduct('simple', $optionData, $checkArray);
    }

    /**
<<<<<<< HEAD
     * Check that options from file group (file) render as expected.
     *
     * @magentoDataFixture Magento/Catalog/_files/product_without_options_with_stock_data.php
=======
     * Check that options from file group(file) render as expected.
     *
     * @magentoDataFixture Magento/Catalog/_files/product_without_options_with_stock_data.php
     * @dataProvider \Magento\TestFramework\Catalog\Block\Product\View\Options\FileGroupDataProvider::getData
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     *
     * @param array $optionData
     * @param array $checkArray
     * @return void
     */
<<<<<<< HEAD
    #[DataProviderExternal(FileGroupDataProvider::class, 'getData')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testRenderCustomOptionsFromFileGroup(array $optionData, array $checkArray): void
    {
        $this->assertFileOptionRenderingOnProduct('simple', $optionData, $checkArray);
    }

    /**
<<<<<<< HEAD
     * Check that options from select group (drop-down, radio buttons, checkbox, multiple select)
     * render as expected.
     *
     * @magentoDataFixture Magento/Catalog/_files/product_without_options_with_stock_data.php
=======
     * Check that options from select group(drop-down, radio buttons, checkbox, multiple select) render as expected.
     *
     * @magentoDataFixture Magento/Catalog/_files/product_without_options_with_stock_data.php
     * @dataProvider \Magento\TestFramework\Catalog\Block\Product\View\Options\SelectGroupDataProvider::getData
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     *
     * @param array $optionData
     * @param array $optionValueData
     * @param array $checkArray
     * @return void
     */
<<<<<<< HEAD
    #[DataProviderExternal(SelectGroupDataProvider::class, 'getData')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testRenderCustomOptionsFromSelectGroup(
        array $optionData,
        array $optionValueData,
        array $checkArray
    ): void {
        $this->assertSelectOptionRenderingOnProduct('simple', $optionData, $optionValueData, $checkArray);
    }

    /**
<<<<<<< HEAD
     * Check that options from date group (date, date & time, time) render as expected.
     *
     * @magentoDataFixture Magento/Catalog/_files/product_without_options_with_stock_data.php
=======
     * Check that options from date group(date, date & time, time) render as expected.
     *
     * @magentoDataFixture Magento/Catalog/_files/product_without_options_with_stock_data.php
     * @dataProvider \Magento\TestFramework\Catalog\Block\Product\View\Options\DateGroupDataProvider::getData
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     *
     * @param array $optionData
     * @param array $checkArray
     * @return void
     */
<<<<<<< HEAD
    #[DataProviderExternal(DateGroupDataProvider::class, 'getData')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testRenderCustomOptionsFromDateGroup(array $optionData, array $checkArray): void
    {
        $this->assertDateOptionRenderingOnProduct('simple', $optionData, $checkArray);
    }

    /**
     * @inheritdoc
     */
    protected function getHandlesList(): array
    {
        return [
            'default',
            'catalog_product_view',
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
