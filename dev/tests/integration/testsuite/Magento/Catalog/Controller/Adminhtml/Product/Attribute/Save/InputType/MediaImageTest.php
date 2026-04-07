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

namespace Magento\Catalog\Controller\Adminhtml\Product\Attribute\Save\InputType;

use Magento\Catalog\Controller\Adminhtml\Product\Attribute\Save\AbstractSaveAttributeTest;
<<<<<<< HEAD
use Magento\TestFramework\Catalog\Model\Product\Attribute\DataProvider\MediaImage;
use PHPUnit\Framework\Attributes\DataProviderExternal;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * Test cases related to create attribute with input type media image.
 *
 * @magentoDbIsolation enabled
 * @magentoAppArea adminhtml
 */
class MediaImageTest extends AbstractSaveAttributeTest
{
    /**
     * Test create attribute and compare attribute data and input data.
     *
<<<<<<< HEAD
=======
     * @dataProvider \Magento\TestFramework\Catalog\Model\Product\Attribute\DataProvider\MediaImage::getAttributeDataWithCheckArray
     *
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @param array $attributePostData
     * @param array $checkArray
     * @return void
     */
<<<<<<< HEAD
    #[DataProviderExternal(MediaImage::class, 'getAttributeDataWithCheckArray')]
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
     * @dataProvider \Magento\TestFramework\Catalog\Model\Product\Attribute\DataProvider\MediaImage::getAttributeDataWithErrorMessage
     *
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @param array $attributePostData
     * @param string $errorMessage
     * @return void
     */
<<<<<<< HEAD
    #[DataProviderExternal(MediaImage::class, 'getAttributeDataWithErrorMessage')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testCreateAttributeWithError(array $attributePostData, string $errorMessage): void
    {
        $this->createAttributeUsingDataWithErrorAndAssert($attributePostData, $errorMessage);
    }
}
