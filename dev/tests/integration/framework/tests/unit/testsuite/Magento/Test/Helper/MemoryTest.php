<?php
/**
<<<<<<< HEAD
 * Copyright 2013 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

namespace Magento\Test\Helper;

<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;

=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
class MemoryTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \PHPUnit\Framework\MockObject\MockObject
     */
    private $_shell;

    protected function setUp(): void
    {
        $this->_shell = $this->createPartialMock(\Magento\Framework\Shell::class, ['execute']);
    }

    public function testGetRealMemoryUsageUnix()
    {
        $object = new \Magento\TestFramework\Helper\Memory($this->_shell);
        $this->_shell->expects(
            $this->once()
        )->method(
            'execute'
        )->with(
            $this->stringStartsWith('ps ')
        )->willReturn(
            '26321'
        );
        $this->assertEquals(26952704, $object->getRealMemoryUsage());
    }

    public function testGetRealMemoryUsageWin()
    {
        $this->_shell
            ->method('execute')
<<<<<<< HEAD
            ->willReturnCallback(
                function ($arg1) {
                    if (strpos($arg1, 'ps ') === 0) {
                        throw new \Magento\Framework\Exception\LocalizedException(__('command not found'));
                    } elseif (strpos($arg1, 'tasklist.exe ') === 0) {
                        return '"php.exe","12345","N/A","0","26,321 K"';
                    }
                }
=======
            ->withConsecutive([$this->stringStartsWith('ps ')], [$this->stringStartsWith('tasklist.exe ')])
            ->willReturnOnConsecutiveCalls(
                $this->throwException(new \Magento\Framework\Exception\LocalizedException(__('command not found'))),
                '"php.exe","12345","N/A","0","26,321 K"'
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            );

        $object = new \Magento\TestFramework\Helper\Memory($this->_shell);
        $this->assertEquals(26952704, $object->getRealMemoryUsage());
    }

    /**
     * @param string $number
     * @param string $expected
<<<<<<< HEAD
     */
    #[DataProvider('convertToBytesDataProvider')]
=======
     * @dataProvider convertToBytesDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testConvertToBytes($number, $expected)
    {
        $this->assertEquals($expected, \Magento\TestFramework\Helper\Memory::convertToBytes($number));
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function convertToBytesDataProvider()
=======
    public function convertToBytesDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            'B' => ['1B', '1'],
            'KB' => ['3K', '3072'],
            'MB' => ['2M', '2097152'],
            'GB' => ['1G', '1073741824'],
            'regular spaces' => ['1 234 K', '1263616'],
            'no-break spaces' => ["1\xA0234\xA0K", '1263616'],
            'tab' => ["1\x09234\x09K", '1263616'],
            'coma' => ['1,234K', '1263616'],
            'dot' => ['1.234 K', '1263616']
        ];
    }

    /**
     * @param string $number
<<<<<<< HEAD
     */
    #[DataProvider('convertToBytesBadFormatDataProvider')]
=======
     * @dataProvider convertToBytesBadFormatDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testConvertToBytesBadFormat($number)
    {
        $this->expectException(\InvalidArgumentException::class);

        \Magento\TestFramework\Helper\Memory::convertToBytes($number);
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function convertToBytesBadFormatDataProvider()
=======
    public function convertToBytesBadFormatDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            'more than one unit of measure' => ['1234KB'],
            'unknown unit of measure' => ['1234Z'],
            'non-integer value' => ['1,234.56 K']
        ];
    }

    /**
     * @param string $number
     * @param string $expected
<<<<<<< HEAD
     */
    #[DataProvider('convertToBytes64DataProvider')]
=======
     * @dataProvider convertToBytes64DataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testConvertToBytes64($number, $expected)
    {
        if (PHP_INT_SIZE <= 4) {
            $this->markTestSkipped('A 64-bit system is required to perform this test.');
        }
        $this->assertEquals($expected, \Magento\TestFramework\Helper\Memory::convertToBytes($number));
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function convertToBytes64DataProvider()
=======
    public function convertToBytes64DataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            ['2T', '2199023255552'],
            ['1P', '1125899906842624'],
            ['2E', '2305843009213693952']
        ];
    }

    /**
     */
    public function testConvertToBytesInvalidArgument()
    {
        $this->expectException(\InvalidArgumentException::class);

        \Magento\TestFramework\Helper\Memory::convertToBytes('3Z');
    }

    /**
     */
    public function testConvertToBytesOutOfBounds()
    {
        $this->expectException(\OutOfBoundsException::class);

        if (PHP_INT_SIZE > 4) {
            $this->markTestSkipped('A 32-bit system is required to perform this test.');
        }
        \Magento\TestFramework\Helper\Memory::convertToBytes('2P');
    }
}
