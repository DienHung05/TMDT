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

namespace Magento\Catalog\Block\Product\View\Attribute;

<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;

=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
/**
 * Class checks multi select attribute displaying on frontend
 *
 * @magentoDbIsolation disabled
 * @magentoDataFixture Magento/Catalog/_files/multiselect_attribute.php
 * @magentoDataFixture Magento/Catalog/_files/second_product_simple.php
 */
class MultiSelectAttributeTest extends AbstractAttributeTest
{
    /** @var string */
    private $attributeCode;

    /**
     * @return void
     */
    public function testAttributeView(): void
    {
        $attributeValue = $this->getAttribute()->getSource()->getOptionId('Option 2');
        $this->processAttributeView('simple2', $attributeValue, 'Option 2');
    }

    /**
     * @return void
     */
    public function testAttributeWithNonDefaultValueView(): void
    {
        $attributeValue = $this->getAttribute()->getSource()->getOptionId('Option 2');
        $this->processNonDefaultAttributeValueView('simple2', $attributeValue, 'Option 2');
    }

    /**
     * @return void
     */
    public function testAttributeWithDefaultValueView(): void
    {
        $this->markTestSkipped('Test is blocked by issue MC-29019');
        $this->processDefaultValueAttributeView('simple2', 'Option 1');
    }

    /**
<<<<<<< HEAD
=======
     * @dataProvider attributeWithTagsProvider
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @magentoAppArea frontend
     * @magentoDataFixture Magento/Catalog/_files/multiselect_attribute_with_html.php
     * @magentoDataFixture Magento/Catalog/_files/second_product_simple.php
     * @param bool $allowHtmlTags
     * @param string $attributeValue
     * @param string $expectedAttributeValue
     * @return void
     */
<<<<<<< HEAD
    #[DataProvider('attributeWithTagsProvider')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testAttributeWithHtmlTags(
        bool $allowHtmlTags,
        string $attributeValue,
        string $expectedAttributeValue
    ): void {
        $this->attributeCode = 'multiselect_attribute_with_html';
        $attributeValue = $this->getAttribute()->getSource()->getOptionId($attributeValue);
        $this->processAttributeHtmlOutput('simple2', $allowHtmlTags, $attributeValue, $expectedAttributeValue);
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function attributeWithTagsProvider(): array
    {
        return [
            'allow_html_tags' => [
                'allowHtmlTags' => true,
                'attributeValue' => '<h2>Option 2</h2>',
                'expectedAttributeValue' => '<h2>Option 2</h2>',
            ],
            'disallow_html_tags' => [
                'allowHtmlTags' => false,
                'attributeValue' => '<h2>Option 2</h2>',
                'expectedAttributeValue' => '&lt;h2&gt;Option 2&lt;/h2&gt;',
=======
    public function attributeWithTagsProvider(): array
    {
        return [
            'allow_html_tags' => [
                'allow_html_tags' => true,
                'attribute_value' => '<h2>Option 2</h2>',
                'expected_attribute_value' => '<h2>Option 2</h2>',
            ],
            'disallow_html_tags' => [
                'allow_html_tags' => false,
                'attribute_value' => '<h2>Option 2</h2>',
                'expected_attribute_value' => '&lt;h2&gt;Option 2&lt;/h2&gt;',
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    protected function getAttributeCode(): string
    {
        return $this->attributeCode ?? 'multiselect_attribute';
    }

    /**
     * @inheritdoc
     */
    protected function getDefaultAttributeValue(): string
    {
        return $this->getAttribute()->getSource()->getOptionId('Option 1');
    }
}
