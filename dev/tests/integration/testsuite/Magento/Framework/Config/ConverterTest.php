<?php declare(strict_types=1);
/**
<<<<<<< HEAD
 * Copyright 2017 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

namespace Magento\Framework\Config;

<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;

=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
/**
 * Tests Magento\Framework\Config\Convert
 */
class ConverterTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var Converter
     */
    private $converter;

    /**
     * Tests config value "false" is not interpreted as true.
     *
     * @param string $sourceString
     * @param array $expected
<<<<<<< HEAD
     */
    #[DataProvider('parseVarElementDataProvider')]
=======
     * @dataProvider parseVarElementDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testParseVarElement($sourceString, $expected)
    {
        $document = new \DOMDocument();
        $document->loadXML($sourceString);
        $actual = $this->converter->convert($document);

        self::assertEquals(
            $expected,
            $actual
        );
    }

    /**
     * Data provider for testParseVarElement.
     *
     * @return array
     */
<<<<<<< HEAD
    public static function parseVarElementDataProvider()
    {
        $sourceString = <<<'XML'
<?xml version="1.0"?>
<view xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
xsi:noNamespaceSchemaLocation="urn:magento:framework:Config/etc/view.xsd">
    <vars module="Magento_Test">
        <var name="str">some string</var>
        <var name="int-1">1</var>
        <var name="int-0">0</var>
        <var name="bool-true">true</var>
        <var name="bool-false">false</var>
=======
    public function parseVarElementDataProvider()
    {
        $sourceString = <<<'XML'
<?xml version="1.0"?>
<view xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" 
xsi:noNamespaceSchemaLocation="urn:magento:framework:Config/etc/view.xsd">
    <vars module="Magento_Test">    
        <var name="str">some string</var>  
        <var name="int-1">1</var>        
        <var name="int-0">0</var>        
        <var name="bool-true">true</var> 
        <var name="bool-false">false</var> 
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    </vars>
 </view>
XML;
        $expectedResult = [
            'vars' => [
                'Magento_Test' => [
                    'str' => 'some string',
                    'int-1' => '1',
                    'int-0' => '0',
                    'bool-true' => true,
                    'bool-false' => false
                ]
            ]
        ];

        return [
            [
                $sourceString,
                $expectedResult
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    protected function setUp(): void
    {
        $this->converter = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()
              ->create(\Magento\Framework\Config\Converter::class);
    }
}
