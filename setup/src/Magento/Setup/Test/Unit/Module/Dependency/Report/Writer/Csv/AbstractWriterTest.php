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

namespace Magento\Setup\Test\Unit\Module\Dependency\Report\Writer\Csv;

use Magento\Framework\File\Csv;
use Magento\Setup\Module\Dependency\Report\Data\ConfigInterface;
use Magento\Setup\Module\Dependency\Report\Writer\Csv\AbstractWriter;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

class AbstractWriterTest extends TestCase
{
    /**
     * @var AbstractWriter|MockObject
     */
    protected $writer;

    /**
     * @var Csv|MockObject
     */
    protected $csvMock;

    protected function setUp(): void
    {
        $this->csvMock = $this->createMock(Csv::class);

<<<<<<< HEAD
        $this->writer = $this->getMockBuilder(AbstractWriter::class)
            ->setConstructorArgs([$this->csvMock])
            ->onlyMethods(['prepareData'])
            ->getMock();
=======
        $this->writer = $this->getMockForAbstractClass(
            AbstractWriter::class,
            ['writer' => $this->csvMock]
        );
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }

    public function testWrite()
    {
        $options = ['report_filename' => 'some_filename'];
<<<<<<< HEAD
        $configMock = $this->createMock(ConfigInterface::class);
=======
        $configMock = $this->getMockForAbstractClass(ConfigInterface::class);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $preparedData = ['foo', 'baz', 'bar'];

        $this->writer->expects(
            $this->once()
        )->method(
            'prepareData'
        )->with(
            $configMock
        )->willReturn(
            $preparedData
        );
        $this->csvMock->expects($this->once())->method('saveData')->with($options['report_filename'], $preparedData);

        $this->writer->write($options, $configMock);
    }

    /**
     * @param array $options
<<<<<<< HEAD
     */
    #[DataProvider('dataProviderWrongOptionReportFilename')]
=======
     * @dataProvider dataProviderWrongOptionReportFilename
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testWriteWithWrongOptionReportFilename($options)
    {
        $this->expectException('InvalidArgumentException');
        $this->expectExceptionMessage('Writing error: Passed option "report_filename" is wrong.');
<<<<<<< HEAD
        $configMock = $this->createMock(ConfigInterface::class);
=======
        $configMock = $this->getMockForAbstractClass(ConfigInterface::class);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

        $this->writer->write($options, $configMock);
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function dataProviderWrongOptionReportFilename()
=======
    public function dataProviderWrongOptionReportFilename()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            [['report_filename' => '']],
            [['there_are_no_report_filename' => 'some_name']]
        ];
    }
}
