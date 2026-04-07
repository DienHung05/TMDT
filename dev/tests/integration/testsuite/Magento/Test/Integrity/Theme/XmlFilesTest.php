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
namespace Magento\Test\Integrity\Theme;

use Magento\Framework\Component\ComponentRegistrar;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

class XmlFilesTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Magento\Framework\Config\ValidationStateInterface
     */
    protected $validationStateMock;

    protected function setUp(): void
    {
        $this->validationStateMock = $this->createMock(\Magento\Framework\Config\ValidationStateInterface::class);
        $this->validationStateMock->method('isValidationRequired')
            ->willReturn(true);
    }

    /**
     * @param string $file
<<<<<<< HEAD
     */
    #[DataProvider('viewConfigFileDataProvider')]
=======
     * @dataProvider viewConfigFileDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testViewConfigFile($file)
    {
        $domConfig = new \Magento\Framework\Config\Dom(
            file_get_contents($file),
            $this->validationStateMock
        );
        $errors = [];
        $urnResolver = new \Magento\Framework\Config\Dom\UrnResolver();
        $result = $domConfig->validate(
            $urnResolver->getRealPath('urn:magento:framework:Config/etc/view.xsd'),
            $errors
        );
        $this->assertTrue($result, "Invalid XML-file: {$file}\n" . join("\n", $errors));
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function viewConfigFileDataProvider()
=======
    public function viewConfigFileDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        $result = [];
        /** @var \Magento\Framework\Component\DirSearch $componentDirSearch */
        $componentDirSearch = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()
            ->get(\Magento\Framework\Component\DirSearch::class);
        $files = $componentDirSearch->collectFiles(ComponentRegistrar::THEME, 'etc/view.xml');
        foreach ($files as $file) {
            $result[substr($file, strlen(BP))] = [$file];
        }
        return $result;
    }

    /**
     * @param string $themeDir
<<<<<<< HEAD
     */
    #[DataProvider('themeConfigFileExistsDataProvider')]
=======
     * @dataProvider themeConfigFileExistsDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testThemeConfigFileExists($themeDir)
    {
        $this->assertFileExists($themeDir . '/theme.xml');
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function themeConfigFileExistsDataProvider()
=======
    public function themeConfigFileExistsDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        $result = [];
        /** @var \Magento\Framework\Component\ComponentRegistrar $componentRegistrar */
        $componentRegistrar = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()
            ->get(\Magento\Framework\Component\ComponentRegistrar::class);
        foreach ($componentRegistrar->getPaths(ComponentRegistrar::THEME) as $themeDir) {
            $result[substr($themeDir, strlen(BP))] = [$themeDir];
        }
        return $result;
    }

    /**
     * @param string $file
<<<<<<< HEAD
     */
    #[DataProvider('themeConfigFileDataProvider')]
=======
     * @dataProvider themeConfigFileDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testThemeConfigFileSchema($file)
    {
        $domConfig = new \Magento\Framework\Config\Dom(file_get_contents($file), $this->validationStateMock);
        $errors = [];
        $result = $domConfig->validate('urn:magento:framework:Config/etc/theme.xsd', $errors);
        $this->assertTrue($result, "Invalid XML-file: {$file}\n" . join("\n", $errors));
    }

    /**
     * Configuration should declare a single package/theme that corresponds to the file system directories
     *
     * @param string $file
<<<<<<< HEAD
     */
    #[DataProvider('themeConfigFileDataProvider')]
=======
     * @dataProvider themeConfigFileDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testThemeConfigFileHasSingleTheme($file)
    {
        /** @var $configXml \SimpleXMLElement */
        $configXml = simplexml_load_file($file);
        $actualThemes = $configXml->xpath('/theme');
        $this->assertCount(1, $actualThemes, 'Single theme declaration is expected.');
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function themeConfigFileDataProvider()
=======
    public function themeConfigFileDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        $result = [];
        /** @var \Magento\Framework\Component\DirSearch $componentDirSearch */
        $componentDirSearch = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()
            ->get(\Magento\Framework\Component\DirSearch::class);
        $files = $componentDirSearch->collectFiles(ComponentRegistrar::THEME, 'theme.xml');
        foreach ($files as $file) {
            $result[substr($file, strlen(BP))] = [$file];
        }
        return $result;
    }
}
