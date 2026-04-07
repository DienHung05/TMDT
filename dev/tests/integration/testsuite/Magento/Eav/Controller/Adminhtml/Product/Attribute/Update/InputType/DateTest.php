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

namespace Magento\Eav\Controller\Adminhtml\Product\Attribute\Update\InputType;

use Magento\Catalog\Controller\Adminhtml\Product\Attribute\Update\AbstractUpdateAttributeTest;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProviderExternal;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * Test cases related to update attribute with input type date.
 *
 * @magentoDbIsolation enabled
 * @magentoAppArea adminhtml
 */
class DateTest extends AbstractUpdateAttributeTest
{
    /**
     * Test update attribute.
     *
<<<<<<< HEAD
=======
     * @dataProvider \Magento\TestFramework\Eav\Model\Attribute\DataProvider\Date::getUpdateProvider
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @magentoDataFixture Magento/Catalog/_files/product_date_attribute.php
     *
     * @param array $postData
     * @param array $expectedData
     * @return void
     */
<<<<<<< HEAD

    #[DataProviderExternal(\Magento\TestFramework\Eav\Model\Attribute\DataProvider\Date::class, 'getUpdateProvider')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testUpdateAttribute(array $postData, array $expectedData): void
    {
        $this->updateAttributeUsingData('date_attribute', $postData);
        $this->assertUpdateAttributeProcess('date_attribute', $postData, $expectedData);
    }

    /**
     * Test update attribute with error.
     *
<<<<<<< HEAD
=======
     * @dataProvider \Magento\TestFramework\Eav\Model\Attribute\DataProvider\Date::getUpdateProviderWithErrorMessage
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @magentoDataFixture Magento/Catalog/_files/product_date_attribute.php
     *
     * @param array $postData
     * @param string $errorMessage
     * @return void
     */
<<<<<<< HEAD
    #[DataProviderExternal(\Magento\TestFramework\Eav\Model\Attribute\DataProvider\Date::class, 'getUpdateProviderWithErrorMessage')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testUpdateAttributeWithError(array $postData, string $errorMessage): void
    {
        $this->updateAttributeUsingData('date_attribute', $postData);
        $this->assertErrorSessionMessages($errorMessage);
    }

    /**
     * Test update attribute frontend labels on stores.
     *
<<<<<<< HEAD
=======
     * @dataProvider \Magento\TestFramework\Eav\Model\Attribute\DataProvider\Date::getUpdateFrontendLabelsProvider
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @magentoDataFixture Magento/Store/_files/second_website_with_two_stores.php
     * @magentoDataFixture Magento/Catalog/_files/product_date_attribute.php
     *
     * @param array $postData
     * @param array $expectedData
     * @return void
     */
<<<<<<< HEAD

    #[DataProviderExternal(\Magento\TestFramework\Eav\Model\Attribute\DataProvider\Date::class, 'getUpdateFrontendLabelsProvider')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testUpdateFrontendLabelOnStores(array $postData, array $expectedData): void
    {
        $this->processUpdateFrontendLabelOnStores('date_attribute', $postData, $expectedData);
    }
}
