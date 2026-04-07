<?php
/**
<<<<<<< HEAD
 * Copyright 2015 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

namespace Magento\Setup\Test\Unit\Module\I18n\Parser\Adapter\Php\Tokenizer;

use Magento\Framework\TestFramework\Unit\Helper\ObjectManager;
use Magento\Setup\Module\I18n\Parser\Adapter\Php\Tokenizer\Token;
use PHPUnit\Framework\TestCase;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * @covers \Magento\Setup\Module\I18n\Parser\Adapter\Php\Tokenizer\Token
 */
class TokenTest extends TestCase
{
    /**
     * @var ObjectManager
     */
    protected $objectManager;

    protected function setUp(): void
    {
        $this->objectManager = new ObjectManager($this);
    }

    /**
     * @covers \Magento\Setup\Module\I18n\Parser\Adapter\Php\Tokenizer\Token::isNew
     *
     * @param int $name
     * @param string $value
     * @param bool $result
<<<<<<< HEAD
     */
    #[DataProvider('isNewDataProvider')]
=======
     * @dataProvider testIsNewDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testIsNew($name, $value, $result)
    {
        $token = $this->createToken($name, $value);
        $this->assertEquals($result, $token->isNew());
    }

    /**
     * @covers \Magento\Setup\Module\I18n\Parser\Adapter\Php\Tokenizer\Token::isNamespaceSeparator
     *
     * @param int $name
     * @param string $value
     * @param bool $result
<<<<<<< HEAD
     */
    #[DataProvider('isNamespaceSeparatorDataProvider')]
=======
     * @dataProvider testIsNamespaceSeparatorDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testIsNamespaceSeparator($name, $value, $result)
    {
        $token = $this->createToken($name, $value);
        $this->assertEquals($result, $token->isNamespaceSeparator());
    }

    /**
     * @covers \Magento\Setup\Module\I18n\Parser\Adapter\Php\Tokenizer\Token::isIdentifier
     *
     * @param int $name
     * @param string $value
     * @param bool $result
<<<<<<< HEAD
     */
    #[DataProvider('isIdentifierDataProvider')]
=======
     * @dataProvider testIsIdentifierDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testIsIdentifier($name, $value, $result)
    {
        $token = $this->createToken($name, $value);
        $this->assertEquals($result, $token->isIdentifier());
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function isNewDataProvider()
=======
    public function testIsNewDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            'new' => ['name' => T_NEW, 'value' => 'new', 'result' => true],
            'namespace' => ['name' => T_NS_SEPARATOR, 'value' => '\\', 'result' => false],
            'identifier' => ['name' => T_STRING, 'value' => '__', 'result' => false]
        ];
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function isNamespaceSeparatorDataProvider()
=======
    public function testIsNamespaceSeparatorDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            'new' => ['name' => T_NEW, 'value' => 'new', 'result' => false],
            'namespace' => ['name' => T_NS_SEPARATOR, 'value' => '\\', 'result' => true],
            'identifier' => ['name' => T_STRING, 'value' => '__', 'result' => false]
        ];
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function isIdentifierDataProvider()
=======
    public function testIsIdentifierDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            'new' => ['name' => T_NEW, 'value' => 'new', 'result' => false],
            'namespace' => ['name' => T_NS_SEPARATOR, 'value' => '\\', 'result' => false],
            'identifier' => ['name' => T_STRING, 'value' => '__', 'result' => true]
        ];
    }

    /**
     * @param int $name
     * @param string $value
     * @return Token
     */
    protected function createToken($name, $value)
    {
        $line = 110;
        return $this->objectManager->getObject(
            Token::class,
            [
                'name' => $name,
                'value' => $value,
                'line' => $line
            ]
        );
    }

    public function testIsConcatenateOperatorTrue()
    {
        $token = new Token('.', '.');
        $this->assertTrue($token->isConcatenateOperator());
    }

    public function testIsConcatenateOperatorFalse()
    {
        $token = new Token(',', ',');
        $this->assertFalse($token->isConcatenateOperator());
    }
}
