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

namespace Magento\Eav\Controller\Adminhtml\Product\Attribute\Save\InputType;

use Magento\Catalog\Controller\Adminhtml\Product\Attribute\Save\AbstractSaveAttributeTest;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProviderExternal;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * Test cases related to create attribute with input type dropdown.
 *
 * @magentoDbIsolation enabled
 * @magentoAppArea adminhtml
 */
class DropDownTest extends AbstractSaveAttributeTest
{
    /**
     * Test create attribute and compare attribute data and input data.
     *
<<<<<<< HEAD
=======
     * @dataProvider \Magento\TestFramework\Eav\Model\Attribute\DataProvider\DropDown::getAttributeDataWithCheckArray
     *
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @param array $attributePostData
     * @param array $checkArray
     * @return void
     */
<<<<<<< HEAD
    #[DataProviderExternal(\Magento\TestFramework\Eav\Model\Attribute\DataProvider\DropDown::class, 'getAttributeDataWithCheckArray')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testCreateAttribute(array $attributePostData, array $checkArray): void
    {
        $this->createAttributeUsingDataAndAssert($attributePostData, $checkArray);
    }

    /**
     * Test create attribute with error.
     *
<<<<<<< HEAD
=======
     * @dataProvider \Magento\TestFramework\Eav\Model\Attribute\DataProvider\DropDown::getAttributeDataWithErrorMessage
     *
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @param array $attributePostData
     * @param string $errorMessage
     * @return void
     */
<<<<<<< HEAD
    #[DataProviderExternal(\Magento\TestFramework\Eav\Model\Attribute\DataProvider\DropDown::class, 'getAttributeDataWithErrorMessage')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testCreateAttributeWithError(array $attributePostData, string $errorMessage): void
    {
        $this->createAttributeUsingDataWithErrorAndAssert($attributePostData, $errorMessage);
    }
}
