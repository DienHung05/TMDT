<?php
/**
 * Test case for \Magento\Framework\Profiler\Driver\Standard\Output\Csvfile
 *
<<<<<<< HEAD
 * Copyright 2014 Adobe
 * All Rights Reserved.
 */
namespace Magento\Framework\Profiler\Driver\Standard\Output;

use PHPUnit\Framework\Attributes\DataProvider;

=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Framework\Profiler\Driver\Standard\Output;

>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
class CsvfileTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Magento\Framework\Profiler\Driver\Standard\Output\Csvfile
     */
    protected $_output;

    /**
     * @var string
     */
    protected $_outputFile;

    protected function setUp(): void
    {
        $this->_outputFile = tempnam(sys_get_temp_dir(), __CLASS__);
    }

    /**
     * Test display method
     *
<<<<<<< HEAD
=======
     * @dataProvider displayDataProvider
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @param string $statFile
     * @param string $expectedFile
     * @param string $delimiter
     * @param string $enclosure
     */
<<<<<<< HEAD
    #[DataProvider('displayDataProvider')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testDisplay($statFile, $expectedFile, $delimiter = ',', $enclosure = '"')
    {
        $this->_output = new \Magento\Framework\Profiler\Driver\Standard\Output\Csvfile(
            ['filePath' => $this->_outputFile, 'delimiter' => $delimiter, 'enclosure' => $enclosure]
        );
        $stat = include $statFile;
        $this->_output->display($stat);
        $this->assertFileEquals($expectedFile, $this->_outputFile);
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function displayDataProvider()
    {
        return [
            'Default delimiter & enclosure' => [
                __DIR__ . '/_files/timers.php',
                __DIR__ . '/_files/output_default.csv',
            ],
            'Custom delimiter & enclosure' => [
                __DIR__ . '/_files/timers.php',
                __DIR__ . '/_files/output_custom.csv',
=======
    public function displayDataProvider()
    {
        return [
            'Default delimiter & enclosure' => [
                'statFile' => __DIR__ . '/_files/timers.php',
                'expectedHtmlFile' => __DIR__ . '/_files/output_default.csv',
            ],
            'Custom delimiter & enclosure' => [
                'statFile' => __DIR__ . '/_files/timers.php',
                'expectedHtmlFile' => __DIR__ . '/_files/output_custom.csv',
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                '.',
                '`',
            ]
        ];
    }
}
