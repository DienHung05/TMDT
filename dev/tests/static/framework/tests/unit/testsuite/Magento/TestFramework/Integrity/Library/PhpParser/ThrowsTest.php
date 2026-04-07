<?php
/**
<<<<<<< HEAD
 * Copyright 2021 Adobe
 * All Rights Reserved.
 */
namespace Magento\TestFramework\Integrity\Library\PhpParser;

use PHPUnit\Framework\Attributes\DataProvider;
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\TestFramework\Integrity\Library\PhpParser;

>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
use PHPUnit\Framework\TestCase;

/**
 * Check throws parsing
 */
class ThrowsTest extends TestCase
{
    /**
     * @var Throws
     */
    protected $throws;

    /**
     * @var \Magento\TestFramework\Integrity\Library\PhpParser\Tokens|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $tokens;

    /**
     * @inheritdoc
     */
    protected function setUp(): void
    {
        $this->tokens = $this->getMockBuilder(
            \Magento\TestFramework\Integrity\Library\PhpParser\Tokens::class
        )->disableOriginalConstructor()->getMock();
    }

    /**
     * Test get throws dependencies
<<<<<<< HEAD
     */
    #[DataProvider('tokensDataProvider')]
=======
     *
     * @dataProvider tokensDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testGetDependencies(array $tokens)
    {
        $this->tokens->method('getTokenCodeByKey')
            ->willReturnCallback(
                function ($k) use ($tokens) {
                    return $tokens[$k][0];
                }
            );

        $this->tokens->method('getTokenValueByKey')
            ->willReturnCallback(
                function ($k) use ($tokens) {
                    return $tokens[$k][1];
                }
            );

        $throws = new Throws($this->tokens);
        foreach ($tokens as $k => $token) {
            $throws->parse($token, $k);
        }

        $uses = $this->getMockBuilder(
            \Magento\TestFramework\Integrity\Library\PhpParser\Uses::class
        )->disableOriginalConstructor()->getMock();

        $this->assertEquals(['\Exception'], $throws->getDependencies($uses));
    }

    /**
     * different tokens data for php 7 and php 8
     *
     * @return array
     */
<<<<<<< HEAD
    public static function tokensDataProvider(): array
=======
    public function tokensDataProvider(): array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            'PHP 7' => [
                [
                    0 => [T_THROW, 'throw'],
                    1 => [T_WHITESPACE, ' '],
                    2 => [T_NEW, 'new'],
                    3 => [T_WHITESPACE, ' '],
                    4 => [T_NS_SEPARATOR, '\\'],
                    5 => [T_STRING, 'Exception'],
                    6 => '(',
                ]
            ],
            'PHP 8' => [
                [
                    0 => [T_THROW, 'throw'],
                    1 => [T_WHITESPACE, ' '],
                    2 => [T_NEW, 'new'],
                    3 => [T_WHITESPACE, ' '],
                    4 => [T_NAME_FULLY_QUALIFIED, '\\Exception'],
                    6 => '(',
                ]
            ]
        ];
    }
}
