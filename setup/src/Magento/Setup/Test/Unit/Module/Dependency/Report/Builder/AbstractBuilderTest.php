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

namespace Magento\Setup\Test\Unit\Module\Dependency\Report\Builder;

use Magento\Setup\Module\Dependency\ParserInterface;
use Magento\Setup\Module\Dependency\Report\Builder\AbstractBuilder;
use Magento\Setup\Module\Dependency\Report\Data\ConfigInterface;
use Magento\Setup\Module\Dependency\Report\WriterInterface;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

class AbstractBuilderTest extends TestCase
{
    /**
     * @var ParserInterface|MockObject
     */
    protected $dependenciesParserMock;

    /**
     * @var WriterInterface|MockObject
     */
    protected $reportWriterMock;

    /**
     * @var AbstractBuilder|MockObject
     */
    protected $builder;

    protected function setUp(): void
    {
<<<<<<< HEAD
        $this->dependenciesParserMock = $this->createMock(ParserInterface::class);
        $this->reportWriterMock = $this->createMock(WriterInterface::class);

        $this->builder = $this->getMockBuilder(AbstractBuilder::class)
            ->setConstructorArgs([$this->dependenciesParserMock, $this->reportWriterMock])
            ->onlyMethods(['buildData'])
            ->getMock();
=======
        $this->dependenciesParserMock = $this->getMockForAbstractClass(ParserInterface::class);
        $this->reportWriterMock = $this->getMockForAbstractClass(WriterInterface::class);

        $this->builder = $this->getMockForAbstractClass(
            AbstractBuilder::class,
            ['dependenciesParser' => $this->dependenciesParserMock, 'reportWriter' => $this->reportWriterMock]
        );
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }

    /**
     * @param array $options
<<<<<<< HEAD
     */
    #[DataProvider('dataProviderWrongParseOptions')]
=======
     * @dataProvider dataProviderWrongParseOptions
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testBuildWithWrongParseOptions($options)
    {
        $this->expectException('InvalidArgumentException');
        $this->expectExceptionMessage('Passed option section "parse" is wrong.');
        $this->builder->build($options);
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function dataProviderWrongParseOptions()
=======
    public function dataProviderWrongParseOptions()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [[['write' => [1, 2]]], [['parse' => [], 'write' => [1, 2]]]];
    }

    /**
     * @param array $options
<<<<<<< HEAD
     */
    #[DataProvider('dataProviderWrongWriteOptions')]
=======
     * @dataProvider dataProviderWrongWriteOptions
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testBuildWithWrongWriteOptions($options)
    {
        $this->expectException('InvalidArgumentException');
        $this->expectExceptionMessage('Passed option section "write" is wrong.');
        $this->builder->build($options);
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function dataProviderWrongWriteOptions()
=======
    public function dataProviderWrongWriteOptions()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [[['parse' => [1, 2]]], [['parse' => [1, 2], 'write' => []]]];
    }

    public function testBuild()
    {
        $options = [
            'parse' => ['files_for_parse' => [1, 2, 3]],
            'write' => ['report_filename' => 'some_filename'],
        ];

        $parseResult = ['foo', 'bar', 'baz'];
<<<<<<< HEAD
        $configMock = $this->createMock(ConfigInterface::class);
=======
        $configMock = $this->getMockForAbstractClass(ConfigInterface::class);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

        $this->dependenciesParserMock->expects(
            $this->once()
        )->method(
            'parse'
        )->with(
            $options['parse']
        )->willReturn(
            $parseResult
        );
        $this->builder->expects(
            $this->once()
        )->method(
            'buildData'
        )->with(
            $parseResult
        )->willReturn(
            $configMock
        );
        $this->reportWriterMock->expects($this->once())->method('write')->with($options['write'], $configMock);

        $this->builder->build($options);
    }
}
