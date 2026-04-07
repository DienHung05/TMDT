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

namespace Magento\Catalog\Model\Product\Option\Type;

use Magento\Catalog\Model\Product\Option;
use Magento\Framework\ObjectManagerInterface;
use Magento\TestFramework\Helper\Bootstrap;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
use PHPUnit\Framework\TestCase;

/**
 * Test for customizable product option with "Text" type
 */
class TextTest extends TestCase
{
<<<<<<< HEAD
    public const STUB_OPTION_DATA = ['id' => 11, 'type' => 'area'];
=======
    const STUB_OPTION_DATA = ['id' => 11, 'type' => 'area'];
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

    /**
     * @var Text
     */
    protected $optionText;

    /**
     * @var ObjectManagerInterface
     */
    private $objectManager;

    /**
     * {@inheritDoc}
     */
    protected function setUp(): void
    {
        $this->objectManager = Bootstrap::getObjectManager();
        $this->optionText = $this->objectManager->create(Text::class);
    }

    /**
     * Check if newline symbols are normalized in option value
     *
<<<<<<< HEAD
=======
     * @dataProvider optionValueDataProvider
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @param array $productOptionData
     * @param string $optionValue
     * @param string $expectedOptionValue
     */
<<<<<<< HEAD
    #[DataProvider('optionValueDataProvider')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testNormalizeNewlineSymbols(
        array $productOptionData,
        string $optionValue,
        string $expectedOptionValue
    ) {
        $productOption = $this->objectManager->create(
            Option::class,
            ['data' => $productOptionData]
        );

        $this->optionText->setOption($productOption);
        $this->optionText->setUserValue($optionValue);
        $this->optionText->validateUserValue([]);

        $this->assertSame($expectedOptionValue, $this->optionText->getUserValue());
    }

    /**
     * Data provider for testNormalizeNewlineSymbols
     *
     * @return array
     */
<<<<<<< HEAD
    public static function optionValueDataProvider()
=======
    public function optionValueDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            [self::STUB_OPTION_DATA, 'string string', 'string string'],
            [self::STUB_OPTION_DATA, "string \r\n string", "string \n string"],
            [self::STUB_OPTION_DATA, "string \n\r string", "string \n string"],
            [self::STUB_OPTION_DATA, "string \r string", "string \n string"]
        ];
    }
}
