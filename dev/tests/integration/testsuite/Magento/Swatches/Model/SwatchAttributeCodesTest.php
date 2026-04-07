<?php
/**
<<<<<<< HEAD
 * Copyright 2017 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
namespace Magento\Swatches\Model;

class SwatchAttributeCodesTest extends \PHPUnit\Framework\TestCase
{
    /** @var  \Magento\Swatches\Model\SwatchAttributeCodes */
    private $swatchAttributeCodes;

    /**
     * @var \Magento\Framework\ObjectManagerInterface
     */
    private $objectManager;

    protected function setUp(): void
    {
        $this->objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();
        $this->swatchAttributeCodes = $this->objectManager->create(
            \Magento\Swatches\Model\SwatchAttributeCodes::class
        );
    }

    /**
     * @magentoDbIsolation enabled
     * @magentoDataFixture Magento/Swatches/_files/swatch_attribute.php
     */
    public function testGetCodes()
    {
        $attribute = $this->objectManager
            ->create(\Magento\Catalog\Model\ResourceModel\Eav\Attribute::class)
            ->load('color_swatch', 'attribute_code');
        $expected = [
            $attribute->getAttributeId() => $attribute->getAttributeCode()
        ];
        $swatchAttributeCodes = $this->swatchAttributeCodes->getCodes();

        $this->assertEquals($expected, $swatchAttributeCodes);
    }
}
