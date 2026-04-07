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

namespace Magento\Weee\Controller\Adminhtml\Product\Attribute\Update\InputType;

use Magento\Catalog\Controller\Adminhtml\Product\Attribute\Update\AbstractUpdateAttributeTest;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * Test cases related to update attribute with input type fixed product tax.
 *
 * @magentoDbIsolation enabled
 * @magentoAppArea adminhtml
 */
class FixedProductTaxTest extends AbstractUpdateAttributeTest
{
    /**
     * Test update attribute.
     *
<<<<<<< HEAD
=======
     * @dataProvider \Magento\TestFramework\Weee\Model\Attribute\DataProvider\FixedProductTax::getUpdateProvider
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @magentoDataFixture Magento/Weee/_files/fixed_product_attribute.php
     *
     * @param array $postData
     * @param array $expectedData
     * @return void
     */
<<<<<<< HEAD
    #[DataProvider('getUpdateProvider')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testUpdateAttribute(array $postData, array $expectedData): void
    {
        $this->updateAttributeUsingData('fixed_product_attribute', $postData);
        $this->assertUpdateAttributeProcess('fixed_product_attribute', $postData, $expectedData);
    }

    /**
     * Test update attribute with error.
     *
<<<<<<< HEAD
=======
     * @dataProvider \Magento\TestFramework\Weee\Model\Attribute\DataProvider\FixedProductTax::getUpdateProviderWithErrorMessage
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @magentoDataFixture Magento/Weee/_files/fixed_product_attribute.php
     *
     * @param array $postData
     * @param string $errorMessage
     * @return void
     */
<<<<<<< HEAD
    #[DataProvider('getUpdateProviderWithErrorMessage')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testUpdateAttributeWithError(array $postData, string $errorMessage): void
    {
        $this->updateAttributeUsingData('fixed_product_attribute', $postData);
        $this->assertErrorSessionMessages($errorMessage);
    }

    /**
     * Test update attribute frontend labels on stores.
     *
<<<<<<< HEAD
=======
     * @dataProvider \Magento\TestFramework\Weee\Model\Attribute\DataProvider\FixedProductTax::getUpdateFrontendLabelsProvider
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @magentoDataFixture Magento/Store/_files/second_website_with_two_stores.php
     * @magentoDataFixture Magento/Weee/_files/fixed_product_attribute.php
     *
     * @param array $postData
     * @param array $expectedData
     * @return void
     */
<<<<<<< HEAD
    #[DataProvider('getUpdateFrontendLabelsProvider')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testUpdateFrontendLabelOnStores(array $postData, array $expectedData): void
    {
        $this->processUpdateFrontendLabelOnStores('fixed_product_attribute', $postData, $expectedData);
    }
<<<<<<< HEAD

    /**
     * @return array
     */
    public static function getUpdateProvider(): array
    {
        return \Magento\TestFramework\Weee\Model\Attribute\DataProvider\FixedProductTax::getUpdateProvider();
    }

    /**
     * @return array
     */
    public static function getUpdateProviderWithErrorMessage(): array
    {
        return \Magento\TestFramework\Weee\Model\Attribute\DataProvider\FixedProductTax::getUpdateProviderWithErrorMessage();
    }

    /**
     * @return array
     */
    public static function getUpdateFrontendLabelsProvider(): array
    {
        return \Magento\TestFramework\Weee\Model\Attribute\DataProvider\FixedProductTax::getUpdateFrontendLabelsProvider();
    }
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
}
