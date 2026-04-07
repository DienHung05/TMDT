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

namespace Magento\Setup\Test\Unit\Module\I18n\Parser;

use Magento\Setup\Module\I18n\Parser\AbstractParser;
use Magento\Setup\Module\I18n\Parser\AdapterInterface;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

class AbstractParserTest extends TestCase
{
    /**
     * @var AbstractParser|MockObject
     */
    protected $_parserMock;

    protected function setUp(): void
    {
<<<<<<< HEAD
        $this->_parserMock = $this->getMockBuilder(AbstractParser::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['_parseByTypeOptions'])
            ->getMock();
=======
        $this->_parserMock = $this->getMockForAbstractClass(
            AbstractParser::class,
            [],
            '',
            false
        );
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }

    /**
     * @param array $options
     * @param string $message
<<<<<<< HEAD
     */
    #[DataProvider('dataProviderForValidateOptions')]
=======
     * @dataProvider dataProviderForValidateOptions
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testValidateOptions($options, $message)
    {
        $this->expectException('InvalidArgumentException');
        $this->expectExceptionMessage($message);

        $this->_parserMock->addAdapter(
            'php',
<<<<<<< HEAD
            $this->createMock(AdapterInterface::class)
=======
            $this->getMockForAbstractClass(AdapterInterface::class)
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        );
        $this->_parserMock->parse($options);
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function dataProviderForValidateOptions()
=======
    public function dataProviderForValidateOptions()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            [[['paths' => []]], 'Missed "type" in parser options.'],
            [[['type' => '', 'paths' => []]], 'Missed "type" in parser options.'],
            [
                [['type' => 'wrong_type', 'paths' => []]],
                'Adapter is not set for type "wrong_type".'
            ],
            [[['type' => 'php']], '"paths" in parser options must be array.'],
            [[['type' => 'php', 'paths' => '']], '"paths" in parser options must be array.']
        ];
    }

    public function getPhrases()
    {
        $this->assertIsArray($this->_parserMock->getPhrases());
    }
}
