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

namespace Magento\Swatches\Controller\Adminhtml\Product\Attribute\Update\InputType;

use Magento\Swatches\Controller\Adminhtml\Product\Attribute\Update\AbstractUpdateSwatchAttributeTest;
use Magento\Swatches\Model\Swatch;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProviderExternal;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * Test cases related to update attribute with input type visual swatch.
 *
 * @magentoDbIsolation enabled
 * @magentoAppArea adminhtml
 */
class VisualSwatchTest extends AbstractUpdateSwatchAttributeTest
{
    /**
     * Test update attribute.
     *
<<<<<<< HEAD
=======
     * @dataProvider \Magento\TestFramework\Swatches\Model\Attribute\DataProvider\VisualSwatch::getUpdateProvider
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @magentoDataFixture Magento/Swatches/_files/product_visual_swatch_attribute.php
     *
     * @param array $postData
     * @param array $expectedData
     * @return void
     */
<<<<<<< HEAD
    #[DataProviderExternal(\Magento\TestFramework\Swatches\Model\Attribute\DataProvider\VisualSwatch::class, 'getUpdateProvider')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testUpdateAttribute(array $postData, array $expectedData): void
    {
        $this->updateAttributeUsingData('visual_swatch_attribute', $postData);
        $this->assertUpdateAttributeProcess('visual_swatch_attribute', $postData, $expectedData);
    }

    /**
     * Test update attribute with error.
     *
<<<<<<< HEAD
=======
     * @dataProvider \Magento\TestFramework\Swatches\Model\Attribute\DataProvider\VisualSwatch::getUpdateProviderWithErrorMessage
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @magentoDataFixture Magento/Swatches/_files/product_visual_swatch_attribute.php
     *
     * @param array $postData
     * @param string $errorMessage
     * @return void
     */
<<<<<<< HEAD
    #[DataProviderExternal(\Magento\TestFramework\Swatches\Model\Attribute\DataProvider\VisualSwatch::class, 'getUpdateProviderWithErrorMessage')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testUpdateAttributeWithError(array $postData, string $errorMessage): void
    {
        $this->updateAttributeUsingData('visual_swatch_attribute', $postData);
        $this->assertErrorSessionMessages($errorMessage);
    }

    /**
     * Test update attribute frontend labels on stores.
     *
<<<<<<< HEAD
=======
     * @dataProvider \Magento\TestFramework\Swatches\Model\Attribute\DataProvider\VisualSwatch::getUpdateFrontendLabelsProvider
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @magentoDataFixture Magento/Store/_files/second_website_with_two_stores.php
     * @magentoDataFixture Magento/Swatches/_files/product_visual_swatch_attribute.php
     *
     * @param array $postData
     * @param array $expectedData
     * @return void
     */
<<<<<<< HEAD
    #[DataProviderExternal(\Magento\TestFramework\Swatches\Model\Attribute\DataProvider\VisualSwatch::class, 'getUpdateFrontendLabelsProvider')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testUpdateFrontendLabelOnStores(array $postData, array $expectedData): void
    {
        $this->processUpdateFrontendLabelOnStores('visual_swatch_attribute', $postData, $expectedData);
    }

    /**
     * Test update attribute options on stores.
     *
<<<<<<< HEAD
=======
     * @dataProvider \Magento\TestFramework\Swatches\Model\Attribute\DataProvider\VisualSwatch::getUpdateOptionsProvider
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @magentoDataFixture Magento/Store/_files/second_website_with_two_stores.php
     * @magentoDataFixture Magento/Swatches/_files/product_visual_swatch_attribute.php
     *
     * @param array $postData
     * @return void
     */
<<<<<<< HEAD
    #[DataProviderExternal(\Magento\TestFramework\Swatches\Model\Attribute\DataProvider\VisualSwatch::class, 'getUpdateOptionsProvider')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testUpdateOptionsOnStores(array $postData): void
    {
        $this->processUpdateOptionsOnStores('visual_swatch_attribute', $postData);
    }

    /**
     * @inheritdoc
     */
    protected function getSwatchType(): string
    {
        return Swatch::SWATCH_INPUT_TYPE_VISUAL;
    }
}
