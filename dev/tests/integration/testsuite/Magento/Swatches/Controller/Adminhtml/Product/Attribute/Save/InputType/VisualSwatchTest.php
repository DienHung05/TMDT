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

namespace Magento\Swatches\Controller\Adminhtml\Product\Attribute\Save\InputType;

use Magento\Catalog\Controller\Adminhtml\Product\Attribute\Save\AbstractSaveAttributeTest;
use Magento\Eav\Api\Data\AttributeInterface;
use Magento\Eav\Model\Entity\Attribute\Source\Table;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProviderExternal;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * Test cases related to create attribute with input type visual swatch.
 *
 * @magentoDbIsolation enabled
 * @magentoAppArea adminhtml
 */
class VisualSwatchTest extends AbstractSaveAttributeTest
{
    /**
     * Test create attribute and compare attribute data and input data.
     *
<<<<<<< HEAD
=======
     * @dataProvider \Magento\TestFramework\Swatches\Model\Attribute\DataProvider\VisualSwatch::getAttributeDataWithCheckArray
     *
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @param array $attributePostData
     * @param array $checkArray
     * @return void
     */
<<<<<<< HEAD
    #[DataProviderExternal(\Magento\TestFramework\Swatches\Model\Attribute\DataProvider\VisualSwatch::class, 'getAttributeDataWithCheckArray')]
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
     * @dataProvider \Magento\TestFramework\Swatches\Model\Attribute\DataProvider\VisualSwatch::getAttributeDataWithErrorMessage
     *
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @param array $attributePostData
     * @param string $errorMessage
     * @return void
     */
<<<<<<< HEAD
    #[DataProviderExternal(\Magento\TestFramework\Swatches\Model\Attribute\DataProvider\VisualSwatch::class, 'getAttributeDataWithErrorMessage')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testCreateAttributeWithError(array $attributePostData, string $errorMessage): void
    {
        $this->createAttributeUsingDataWithErrorAndAssert($attributePostData, $errorMessage);
    }

    /**
     * @inheritdoc
     */
    protected function assertAttributeOptions(AttributeInterface $attribute, array $optionsData): void
    {
        /** @var Table $attributeSource */
        $attributeSource = $attribute->getSource();
        $swatchOptions = $attributeSource->getAllOptions(true, true);
        foreach ($optionsData as $optionData) {
            $optionVisualValueArr = $optionData['optionvisual']['value'];
            $optionVisualValue = reset($optionVisualValueArr)[0];
            $optionFounded = false;
            foreach ($swatchOptions as $attributeOption) {
                if ($attributeOption['label'] === $optionVisualValue) {
                    $optionFounded = true;
                    break;
                }
            }
            $this->assertTrue($optionFounded);
        }
    }
}
