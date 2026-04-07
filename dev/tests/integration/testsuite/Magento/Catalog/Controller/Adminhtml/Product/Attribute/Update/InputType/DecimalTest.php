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

namespace Magento\Catalog\Controller\Adminhtml\Product\Attribute\Update\InputType;

use Magento\Catalog\Controller\Adminhtml\Product\Attribute\Update\AbstractUpdateAttributeTest;
<<<<<<< HEAD
use Magento\TestFramework\Catalog\Model\Product\Attribute\DataProvider\Decimal;
use PHPUnit\Framework\Attributes\DataProviderExternal;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * Test cases related to update attribute with input type price.
 *
 * @magentoDbIsolation enabled
 * @magentoAppArea adminhtml
 */
class DecimalTest extends AbstractUpdateAttributeTest
{
    /**
     * Test update attribute.
     *
<<<<<<< HEAD
=======
     * @dataProvider \Magento\TestFramework\Catalog\Model\Product\Attribute\DataProvider\Decimal::getUpdateProvider
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @magentoDataFixture Magento/Catalog/_files/product_decimal_attribute.php
     *
     * @param array $postData
     * @param array $expectedData
     * @return void
     */
<<<<<<< HEAD
    #[DataProviderExternal(Decimal::class, 'getUpdateProvider')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testUpdateAttribute(array $postData, array $expectedData): void
    {
        $this->updateAttributeUsingData('decimal_attribute', $postData);
        $this->assertUpdateAttributeProcess('decimal_attribute', $postData, $expectedData);
    }

    /**
     * Test update attribute with error.
     *
<<<<<<< HEAD
=======
     * @dataProvider \Magento\TestFramework\Catalog\Model\Product\Attribute\DataProvider\Decimal::getUpdateProviderWithErrorMessage
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @magentoDataFixture Magento/Catalog/_files/product_decimal_attribute.php
     *
     * @param array $postData
     * @param string $errorMessage
     * @return void
     */
<<<<<<< HEAD
    #[DataProviderExternal(Decimal::class, 'getUpdateProviderWithErrorMessage')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testUpdateAttributeWithError(array $postData, string $errorMessage): void
    {
        $this->updateAttributeUsingData('decimal_attribute', $postData);
        $this->assertErrorSessionMessages($errorMessage);
    }

    /**
     * Test update attribute frontend labels on stores.
     *
<<<<<<< HEAD
=======
     * @dataProvider \Magento\TestFramework\Catalog\Model\Product\Attribute\DataProvider\Decimal::getUpdateFrontendLabelsProvider
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @magentoDataFixture Magento/Store/_files/second_website_with_two_stores.php
     * @magentoDataFixture Magento/Catalog/_files/product_decimal_attribute.php
     *
     * @param array $postData
     * @param array $expectedData
     * @return void
     */
<<<<<<< HEAD
    #[DataProviderExternal(Decimal::class, 'getUpdateFrontendLabelsProvider')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testUpdateFrontendLabelOnStores(array $postData, array $expectedData): void
    {
        $this->processUpdateFrontendLabelOnStores('decimal_attribute', $postData, $expectedData);
    }
}
