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
namespace Magento\TestFramework\Inspection;

use Magento\Framework\Component\ComponentRegistrar;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

class WordsFinderTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @param string $configFile
     * @param string $baseDir
<<<<<<< HEAD
     */
    #[DataProvider('constructorExceptionDataProvider')]
=======
     * @dataProvider constructorExceptionDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testConstructorException($configFile, $baseDir)
    {
        $this->expectException(\Magento\TestFramework\Inspection\Exception::class);

        new \Magento\TestFramework\Inspection\WordsFinder($configFile, $baseDir, new ComponentRegistrar());
    }

<<<<<<< HEAD
    public static function constructorExceptionDataProvider()
=======
    public function constructorExceptionDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        $fixturePath = __DIR__ . '/_files/';
        return [
            'non-existing config file' => [$fixturePath . 'non-existing.xml', $fixturePath],
            'non-existing base dir' => [$fixturePath . 'config.xml', $fixturePath . 'non-existing-dir'],
            'broken config' => [$fixturePath . 'broken_config.xml', $fixturePath],
            'empty words config' => [$fixturePath . 'empty_words_config.xml', $fixturePath],
            'empty whitelisted path' => [$fixturePath . 'empty_whitelisted_path.xml', $fixturePath]
        ];
    }

    /**
     * @param string|array $configFiles
     * @param string $file
     * @param array $expected
<<<<<<< HEAD
     */
    #[DataProvider('findWordsDataProvider')]
=======
     * @dataProvider findWordsDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testFindWords($configFiles, $file, $expected)
    {
        $wordsFinder = new \Magento\TestFramework\Inspection\WordsFinder(
            $configFiles,
            __DIR__ . '/_files/words_finder',
            new ComponentRegistrar()
        );
        $actual = $wordsFinder->findWords($file);
        $this->assertEquals($expected, $actual);
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function findWordsDataProvider()
=======
    public function findWordsDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        $mainConfig = __DIR__ . '/_files/config.xml';
        $additionalConfig = __DIR__ . '/_files/config_additional.xml';
        $basePath = __DIR__ . '/_files/words_finder/';
        return [
            'usual file' => [$mainConfig, $basePath . 'buffy.php', ['demon', 'vampire']],
            'whitelisted file' => [$mainConfig, $basePath . 'twilight/eclipse.php', []],
            'partially whitelisted file' => [$mainConfig, $basePath . 'twilight/newmoon.php', ['demon']],
            'filename with bad word' => [
                $mainConfig,
                $basePath . 'interview_with_the_vampire.php',
                ['vampire'],
            ],
            'binary file, having name with bad word' => [
                $mainConfig,
                $basePath . 'interview_with_the_vampire.zip',
                ['vampire'],
            ],
            'words in multiple configs' => [
                [$mainConfig, $additionalConfig],
                $basePath . 'buffy.php',
                ['demon', 'vampire', 'darkness'],
            ],
            'whitelisted paths in multiple configs' => [
                [$mainConfig, $additionalConfig],
                $basePath . 'twilight/newmoon.php',
                ['demon'],
            ],
            'config must be whitelisted automatically' => [
                $basePath . 'self_tested_config.xml',
                $basePath . 'self_tested_config.xml',
                [],
            ]
        ];
    }
}
