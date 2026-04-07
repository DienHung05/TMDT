<?php
/**
 * Test for \Magento\Framework\Filesystem\File\Read
 *
<<<<<<< HEAD
 * Copyright 2014 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
namespace Magento\Framework\Filesystem\File;

use Magento\TestFramework\Helper\Bootstrap;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

class ReadTest extends \PHPUnit\Framework\TestCase
{
    /**
     * Test instance of Read
     */
    public function testInstance()
    {
        $file = $this->getFileInstance('popup.csv');
        $this->assertTrue($file instanceof ReadInterface);
    }

    /**
     * Test for assertValid method
     * Expected exception for file that does not exist and file without access
     *
<<<<<<< HEAD
     * @param string $path
     */
    #[DataProvider('providerNotValidFiles')]
=======
     * @dataProvider providerNotValidFiles
     * @param string $path
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testAssertValid($path)
    {
        $this->expectException(\Magento\Framework\Exception\FileSystemException::class);

        $this->getFileInstance($path);
    }

    /**
     * Data provider for testAssertValid
     *
     * @return array
     */
<<<<<<< HEAD
    public static function providerNotValidFiles()
=======
    public function providerNotValidFiles()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [['invalid.csv']]; //File does not exist
    }

    /**
     * Test for read method
     *
<<<<<<< HEAD
=======
     * @dataProvider providerRead
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @param string $path
     * @param int $length
     * @param string $expectedResult
     */
<<<<<<< HEAD
    #[DataProvider('providerRead')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testRead($path, $length, $expectedResult)
    {
        $file = $this->getFileInstance($path);
        $result = $file->read($length);
        $this->assertEquals($result, $expectedResult);
    }

    /**
     * Data provider for testRead
     *
     * @return array
     */
<<<<<<< HEAD
    public static function providerRead()
=======
    public function providerRead()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [['popup.csv', 10, 'var myData'], ['popup.csv', 15, 'var myData = 5;']];
    }

    /**
     * Test readAll
     *
<<<<<<< HEAD
     * @param string $path
     * @param string $content
     */
    #[DataProvider('readAllProvider')]
=======
     * @dataProvider readAllProvider
     * @param string $path
     * @param string $content
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testReadAll($path, $content)
    {
        $file = $this->getFileInstance($path);
        $this->assertEquals($content, $file->readAll($path));
    }

    /**
     * Data provider for testReadFile
     *
     * @return array
     */
<<<<<<< HEAD
    public static function readAllProvider()
=======
    public function readAllProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            ['popup.csv', 'var myData = 5;'],
            ['data.csv', '"field1", "field2"' . "\n" . '"field3", "field4"' . "\n"]
        ];
    }

    /**
     * Test readLine
     *
<<<<<<< HEAD
=======
     * @dataProvider readLineProvider
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @param string $path
     * @param array $lines
     * @param int $length
     */
<<<<<<< HEAD
    #[DataProvider('readLineProvider')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testReadLine($path, $lines, $length)
    {
        $file = $this->getFileInstance($path);
        foreach ($lines as $line) {
            $this->assertEquals($line, $file->readLine($length, "\n"));
        }
    }

    /**
     * Data provider for testReadLine
     *
     * @return array
     */
<<<<<<< HEAD
    public static function readLineProvider()
=======
    public function readLineProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            ['popup.csv', ['var myData = 5;'], 999],
            ['data.csv', ['"field1", "field2"', '"field3", "field4"'], 999],
            ['popup.csv', ['var'], 3],
            ['data.csv', ['"f', 'ie', 'ld', '1"'], 2]
        ];
    }

    /**
     * Test for stat method
     *
<<<<<<< HEAD
     * @param string $path
     */
    #[DataProvider('statProvider')]
=======
     * @dataProvider statProvider
     * @param string $path
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testStat($path)
    {
        $file = $this->getFileInstance($path);
        $expectedInfo = [
            'dev',
            'ino',
            'mode',
            'nlink',
            'uid',
            'gid',
            'rdev',
            'size',
            'atime',
            'mtime',
            'ctime',
            'blksize',
            'blocks',
        ];
        $result = $file->stat();
        foreach ($expectedInfo as $key) {
            $this->assertArrayHasKey($key, $result);
        }
    }

    /**
     * Data provider for testStat
     *
     * @return array
     */
<<<<<<< HEAD
    public static function statProvider()
=======
    public function statProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [['popup.csv'], ['foo/file_three.txt']];
    }

    /**
     * Test for readCsv method
     *
<<<<<<< HEAD
=======
     * @dataProvider providerCsv
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @param string $path
     * @param int $length
     * @param string $delimiter
     * @param string $enclosure
     * @param string $escape
     * @param array $expectedRow1
     * @param array $expectedRow2
     */
<<<<<<< HEAD
    #[DataProvider('providerCsv')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testReadCsv($path, $length, $delimiter, $enclosure, $escape, $expectedRow1, $expectedRow2)
    {
        $file = $this->getFileInstance($path);
        $actualRow1 = $file->readCsv($length, $delimiter, $enclosure, $escape);
        $actualRow2 = $file->readCsv($length, $delimiter, $enclosure, $escape);
        $this->assertEquals($expectedRow1, $actualRow1);
        $this->assertEquals($expectedRow2, $actualRow2);
    }

    /**
     * Data provider for testReadCsv
     *
     * @return array
     */
<<<<<<< HEAD
    public static function providerCsv()
=======
    public function providerCsv()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [['data.csv', 0, ',', '"', '\\', ['field1', 'field2'], ['field3', 'field4']]];
    }

    /**
     * Test for tell method
     *
<<<<<<< HEAD
     * @param string $path
     * @param int $position
     */
    #[DataProvider('providerPosition')]
=======
     * @dataProvider providerPosition
     * @param string $path
     * @param int $position
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testTell($path, $position)
    {
        $file = $this->getFileInstance($path);
        $file->read($position);
        $this->assertEquals($position, $file->tell());
    }

    /**
     * Data provider for testTell
     *
     * @return array
     */
<<<<<<< HEAD
    public static function providerPosition()
=======
    public function providerPosition()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [['popup.csv', 5], ['popup.csv', 10]];
    }

    /**
     * Test for seek method
     *
<<<<<<< HEAD
=======
     * @dataProvider providerSeek
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @param string $path
     * @param int $position
     * @param int $whence
     * @param int $tell
     */
<<<<<<< HEAD
    #[DataProvider('providerSeek')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testSeek($path, $position, $whence, $tell)
    {
        $file = $this->getFileInstance($path);
        $file->seek($position, $whence);
        $this->assertEquals($tell, $file->tell());
    }

    /**
     * Data provider for testSeek
     *
     * @return array
     */
<<<<<<< HEAD
    public static function providerSeek()
=======
    public function providerSeek()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            ['popup.csv', 5, SEEK_SET, 5],
            ['popup.csv', 10, SEEK_CUR, 10],
            ['popup.csv', -10, SEEK_END, 5]
        ];
    }

    /**
     * Test for eof method
     *
<<<<<<< HEAD
     * @param string $path
     * @param int $position
     * @param bool $expected
     */
    #[DataProvider('providerEof')]
    public function testEofFalse($path, $position, $expected)
=======
     * @dataProvider providerEof
     * @param string $path
     * @param int $position
     */
    public function testEofFalse($path, $position)
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        $file = $this->getFileInstance($path);
        $file->seek($position);
        $this->assertFalse($file->eof());
    }

    /**
     * Data provider for testEofTrue
     *
     * @return array
     */
<<<<<<< HEAD
    public static function providerEof()
=======
    public function providerEof()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [['popup.csv', 5, false], ['popup.csv', 10, false]];
    }

    /**
     * Test for eof method
     */
    public function testEofTrue()
    {
        $file = $this->getFileInstance('popup.csv');
        $file->seek(0, SEEK_END);
        $file->read(1);
        $this->assertTrue($file->eof());
    }

    /**
     * Test for close method
     */
    public function testClose()
    {
        $file = $this->getFileInstance('popup.csv');
        $this->assertTrue($file->close());
    }

    /**
     * Get readable file instance
     * Get full path for files located in _files directory
     *
     * @param $path
     * @return Read
     */
    private function getFileInstance($path)
    {
        $fullPath = __DIR__ . '/../_files/' . $path;
        return Bootstrap::getObjectManager()->create(
            \Magento\Framework\Filesystem\File\Read::class,
            ['path' => $fullPath, 'driver' => new \Magento\Framework\Filesystem\Driver\File()]
        );
    }
}
