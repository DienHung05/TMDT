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
use Magento\Setup\Module\I18n\Parser\Adapter\Php\Tokenizer;
use Magento\Setup\Module\I18n\Parser\Adapter\Php\Tokenizer\PhraseCollector;
use Magento\Setup\Module\I18n\Parser\Adapter\Php\Tokenizer\Token;
use PHPUnit\Framework\MockObject\MockObject;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
use PHPUnit\Framework\TestCase;

/**
 * @covers \Magento\Setup\Module\I18n\Parser\Adapter\Php\Tokenizer\PhraseCollector
 */
class PhraseCollectorTest extends TestCase
{
    /**
     * @var PhraseCollector
     */
    protected $phraseCollector;

    /**
     * @var ObjectManager
     */
    protected $objectManager;

    /**
     * @var Tokenizer|MockObject
     */
    protected $tokenizerMock;

    protected function setUp(): void
    {
        $this->objectManager = new ObjectManager($this);
        $this->tokenizerMock = $this->getMockBuilder(Tokenizer::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->phraseCollector = $this->objectManager->getObject(
            PhraseCollector::class,
            [
                'tokenizer' => $this->tokenizerMock
            ]
        );
    }

    /**
     * @covers \Magento\Setup\Module\I18n\Parser\Adapter\Php\Tokenizer\PhraseCollector::parse
     *
     * @param string $file
     * @param array $isEndOfLoopReturnValues
     * @param array $getNextRealTokenReturnValues
     * @param array $getFunctionArgumentsTokensReturnValues
     * @param array $isMatchingClassReturnValues
     * @param array $result
<<<<<<< HEAD
     */
    #[DataProvider('parseDataProvider')]
=======
     * @dataProvider testParseDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testParse(
        $file,
        array $isEndOfLoopReturnValues,
        array $getNextRealTokenReturnValues,
        array $getFunctionArgumentsTokensReturnValues,
        array $isMatchingClassReturnValues,
        array $result
    ) {
<<<<<<< HEAD
        $nextRealToken = [];
        foreach ($getNextRealTokenReturnValues as $key => $token) {
            if (is_callable($token)) {
                $nextRealToken[$key] = $token($this);
            } else {
                $nextRealToken[$key] = $token;
            }
        }

        foreach ($getFunctionArgumentsTokensReturnValues as &$returnToken) {
            if (is_callable($returnToken[0][0])) {
                $returnToken[0][0] = $returnToken[0][0]($this);
            }
        }

=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $matchingClass = 'Phrase';

        $this->tokenizerMock->expects($this->once())
            ->method('parse')
            ->with($file);
<<<<<<< HEAD
        $isEndOfLoopCallCount = 0;
        $this->tokenizerMock->expects($this->atLeastOnce())
            ->method('isEndOfLoop')
            ->willReturnCallback(function() use (&$isEndOfLoopCallCount, $isEndOfLoopReturnValues) {
                return $isEndOfLoopReturnValues[$isEndOfLoopCallCount++] ?? false;
            });
        $getNextRealTokenCallCount = 0;
        $this->tokenizerMock->expects($this->any())
            ->method('getNextRealToken')
            ->willReturnCallback(function() use (&$getNextRealTokenCallCount, $nextRealToken) {
                return $nextRealToken[$getNextRealTokenCallCount++] ?? null;
            });
        $getFunctionArgumentsTokensCallCount = 0;
        $this->tokenizerMock->expects($this->any())
            ->method('getFunctionArgumentsTokens')
            ->willReturnCallback(function() use (&$getFunctionArgumentsTokensCallCount, $getFunctionArgumentsTokensReturnValues) {
                return $getFunctionArgumentsTokensReturnValues[$getFunctionArgumentsTokensCallCount++] ?? [];
            });
        $isMatchingClassCallCount = 0;
        $this->tokenizerMock->expects($this->any())
            ->method('isMatchingClass')
            ->with($matchingClass)
            ->willReturnCallback(function() use (&$isMatchingClassCallCount, $isMatchingClassReturnValues) {
                return $isMatchingClassReturnValues[$isMatchingClassCallCount++] ?? false;
            });
=======
        $this->tokenizerMock->expects($this->atLeastOnce())
            ->method('isEndOfLoop')
            ->will(call_user_func_array(
                [$this, 'onConsecutiveCalls'],
                $isEndOfLoopReturnValues
            ));
        $this->tokenizerMock->expects($this->any())
            ->method('getNextRealToken')
            ->will(call_user_func_array(
                [$this, 'onConsecutiveCalls'],
                $getNextRealTokenReturnValues
            ));
        $this->tokenizerMock->expects($this->any())
            ->method('getFunctionArgumentsTokens')
            ->will(call_user_func_array(
                [$this, 'onConsecutiveCalls'],
                $getFunctionArgumentsTokensReturnValues
            ));
        $this->tokenizerMock->expects($this->any())
            ->method('isMatchingClass')
            ->with($matchingClass)
            ->will(call_user_func_array(
                [$this, 'onConsecutiveCalls'],
                $isMatchingClassReturnValues
            ));
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

        $this->phraseCollector->setIncludeObjects();
        $this->phraseCollector->parse($file);
        $this->assertEquals($result, $this->phraseCollector->getPhrases());
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function parseDataProvider()
=======
    public function testParseDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        $file = 'path/to/file.php';
        $line = 110;
        return [
            /* Test simulates parsing of the following code:
             *
             * $phrase1 = new \Magento\Framework\Phrase('Testing');
             * $phrase2 = __('More testing');
             */
            'two phrases' => [
                'file' => $file,
                'isEndOfLoopReturnValues' => [
                    false, //before $phrase1
                    false, //at $phrase1
                    false, //at =
                    false, //at new
                    false, //at ;
                    false, //at $phrase2
                    false, //at =
                    false, //at __
                    false, //at ;
                    true //after ;
                ],
                'getNextRealTokenReturnValues' => [
<<<<<<< HEAD
                    static fn (self $testCase) => $testCase->createToken(false, false, false, false, '$phrase1'),
                    static fn (self $testCase) => $testCase->createToken(false, false, false, false, '='),
                    static fn (self $testCase) => $testCase->createToken(false, false, true, false, 'new', $line),
                    static fn (self $testCase) => $testCase->createToken(false, false, false, false, ';'),
                    static fn (self $testCase) => $testCase->createToken(false, false, false, false, '$phrase2'),
                    static fn (self $testCase) => $testCase->createToken(false, false, false, false, '='),
                    static fn (self $testCase) => $testCase->createToken(true, false, false, false, '__', $line),
                    static fn (self $testCase) => $testCase->createToken(false, true, false, false, '('),
                    static fn (self $testCase) => $testCase->createToken(false, false, false, false, ';'),
                    false
                ],
                'getFunctionArgumentsTokensReturnValues' => [
                    [[static fn (self $testCase) => $testCase->createToken(
                        false,
                        false,
                        false,
                        true,
                        '\'Testing\''
                    )]], // 'Testing')
                    [[static fn (self $testCase) => $testCase->createToken(
                        false,
                        false,
                        false,
                        true,
                        '\'More testing\''
                    )]] // 'More testing')
=======
                    $this->createToken(false, false, false, false, '$phrase1'),
                    $this->createToken(false, false, false, false, '='),
                    $this->createToken(false, false, true, false, 'new', $line),
                    $this->createToken(false, false, false, false, ';'),
                    $this->createToken(false, false, false, false, '$phrase2'),
                    $this->createToken(false, false, false, false, '='),
                    $this->createToken(true, false, false, false, '__', $line),
                    $this->createToken(false, true, false, false, '('),
                    $this->createToken(false, false, false, false, ';'),
                    false
                ],
                'getFunctionArgumentsTokensReturnValues' => [
                    [[$this->createToken(false, false, false, true, '\'Testing\'')]], // 'Testing')
                    [[$this->createToken(false, false, false, true, '\'More testing\'')]] // 'More testing')
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                ],
                'isMatchingClassReturnValues' => [
                    true // \Magento\Framework\Phrase(
                ],
                'result' => [
                    [
                        'phrase' => '\'Testing\'',
                        'arguments' => 0,
                        'file' => $file,
                        'line' => $line
                    ],
                    [
                        'phrase' => '\'More testing\'',
                        'arguments' => 0,
                        'file' => $file,
                        'line' => $line
                    ]
                ]
            ]
        ];
    }

    /**
     * @param bool $isEqualFunctionReturnValue
     * @param bool $isOpenBraceReturnValue
     * @param bool $isNewReturnValue
     * @param bool $isConstantEncapsedString
     * @param string $value
     * @param int|null $line
     * @return Token|MockObject
     */
    protected function createToken(
        $isEqualFunctionReturnValue,
        $isOpenBraceReturnValue,
        $isNewReturnValue,
        $isConstantEncapsedString,
        $value,
        $line = null
    ) {
        $token = $this->getMockBuilder(Token::class)
            ->disableOriginalConstructor()
            ->getMock();
        $token->expects($this->any())
            ->method('isEqualFunction')
            ->with('__')
            ->willReturn($isEqualFunctionReturnValue);
        $token->expects($this->any())
            ->method('isOpenBrace')
            ->willReturn($isOpenBraceReturnValue);
        $token->expects($this->any())
            ->method('isNew')
            ->willReturn($isNewReturnValue);
        $token->expects($this->any())
            ->method('isConstantEncapsedString')
            ->willReturn($isConstantEncapsedString);
        $token->expects($this->any())
            ->method('getValue')
            ->willReturn($value);
        $token->expects($this->any())
            ->method('getLine')
            ->willReturn($line);
        return $token;
    }

    public function testCollectPhrases()
    {
        $firstPart = "'first part'";
        $firstPartToken = new Token(\T_CONSTANT_ENCAPSED_STRING, $firstPart);
        $concatenationToken = new Token('.', '.');
        $secondPart = "' second part'";
        $secondPartToken = new Token(\T_CONSTANT_ENCAPSED_STRING, $secondPart);
        $phraseTokens = [$firstPartToken, $concatenationToken, $secondPartToken];
        $phraseString = "'first part' . ' second part'";

        $reflectionMethod = new \ReflectionMethod(
            PhraseCollector::class,
            '_collectPhrase'
        );

<<<<<<< HEAD
=======
        $reflectionMethod->setAccessible(true);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $this->assertSame($phraseString, $reflectionMethod->invoke($this->phraseCollector, $phraseTokens));
    }
}
