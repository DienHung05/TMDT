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

namespace Magento\Framework\Composer;

use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\TestFramework\Helper\Bootstrap;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * Tests Magento\Framework\ComposerInformation
 */
class ComposerInformationTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Magento\Framework\ObjectManagerInterface
     */
    private $objectManager;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Magento\Framework\App\Filesystem\DirectoryList
     */
    private $directoryList;

    /**
     * @var ComposerJsonFinder
     */
    private $composerJsonFinder;

    /**
     * @var ComposerFactory
     */
    private $composerFactory;

    /**
     * @inheritDoc
     */
    protected function setUp(): void
    {
        $this->objectManager = Bootstrap::getObjectManager();
    }

    /**
     * Setup DirectoryList, Filesystem, and ComposerJsonFinder to use a specified directory for reading composer files
     *
     * @param $composerDir string Directory under _files that contains composer files
     */
    private function setupDirectory($composerDir)
    {
        $directories = [
            DirectoryList::CONFIG => [DirectoryList::PATH => __DIR__ . '/_files/'],
            DirectoryList::ROOT => [DirectoryList::PATH => __DIR__ . '/_files/' . $composerDir],
            DirectoryList::COMPOSER_HOME => [DirectoryList::PATH => __DIR__ . '/_files/' . $composerDir],
        ];

        $this->directoryList = $this->objectManager->create(
            \Magento\Framework\App\Filesystem\DirectoryList::class,
            ['root' => __DIR__ . '/_files/' . $composerDir, 'config' => $directories]
        );

        $this->composerJsonFinder = new ComposerJsonFinder($this->directoryList);
        $this->composerFactory = new ComposerFactory($this->directoryList, $this->composerJsonFinder);
    }

    /**
     * @param $composerDir string Directory under _files that contains composer files
<<<<<<< HEAD
     */
    #[DataProvider('getRequiredPhpVersionDataProvider')]
=======
     *
     * @dataProvider getRequiredPhpVersionDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testGetRequiredPhpVersion($composerDir)
    {
        $this->setupDirectory($composerDir);

        /** @var \Magento\Framework\Composer\ComposerInformation $composerInfo */
        $composerInfo = $this->objectManager->create(
            \Magento\Framework\Composer\ComposerInformation::class,
            ['composerFactory' => $this->composerFactory]
        );

<<<<<<< HEAD
        $this->assertEquals("~8.1.0", $composerInfo->getRequiredPhpVersion());
=======
        $this->assertEquals("~7.1.3||~7.2.0", $composerInfo->getRequiredPhpVersion());
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }

    /**
     * @param $composerDir string Directory under _files that contains composer files
<<<<<<< HEAD
     */
    #[DataProvider('getRequiredPhpVersionDataProvider')]
=======
     *
     * @dataProvider getRequiredPhpVersionDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testGetRequiredExtensions($composerDir)
    {
        $this->setupDirectory($composerDir);
        $expectedExtensions = ['ctype', 'gd', 'spl', 'dom', 'simplexml', 'hash', 'curl', 'iconv', 'intl'];

        /** @var \Magento\Framework\Composer\ComposerInformation $composerInfo */
        $composerInfo = $this->objectManager->create(
            \Magento\Framework\Composer\ComposerInformation::class,
            ['composerFactory' => $this->composerFactory]
        );

        $actualRequiredExtensions = $composerInfo->getRequiredExtensions();
        foreach ($expectedExtensions as $expectedExtension) {
            $this->assertContains($expectedExtension, $actualRequiredExtensions);
        }
    }

    /**
     * @param $composerDir string Directory under _files that contains composer files
<<<<<<< HEAD
     */
    #[DataProvider('getRequiredPhpVersionDataProvider')]
=======
     *
     * @dataProvider getRequiredPhpVersionDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testGetSuggestedPackages($composerDir)
    {
        $this->setupDirectory($composerDir);
        $composerInfo = $this->objectManager->create(
            \Magento\Framework\Composer\ComposerInformation::class,
            ['composerFactory' => $this->composerFactory]
        );
        $actualSuggestedExtensions = $composerInfo->getSuggestedPackages();
        $this->assertArrayHasKey('psr/log', $actualSuggestedExtensions);
    }

    /**
     * @param $composerDir string Directory under _files that contains composer files
<<<<<<< HEAD
     */
    #[DataProvider('getRequiredPhpVersionDataProvider')]
=======
     *
     * @dataProvider getRequiredPhpVersionDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testGetRootRequiredPackagesAndTypes($composerDir)
    {
        $this->setupDirectory($composerDir);

        /** @var \Magento\Framework\Composer\ComposerInformation $composerInfo */
        $composerInfo = $this->objectManager->create(
            \Magento\Framework\Composer\ComposerInformation::class,
            ['composerFactory' => $this->composerFactory]
        );

        $requiredPackagesAndTypes = $composerInfo->getRootRequiredPackageTypesByName();

        $this->assertArrayHasKey('composer/composer', $requiredPackagesAndTypes);
        $this->assertEquals('library', $requiredPackagesAndTypes['composer/composer']);
    }

    /**
     * Data provider that returns directories containing different types of composer files.
     *
     * @return array
     */
<<<<<<< HEAD
    public static function getRequiredPhpVersionDataProvider()
=======
    public function getRequiredPhpVersionDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            'Skeleton Composer' => ['testSkeleton'],
            'Composer.json from git clone' => ['testFromClone'],
            'Composer.json from git create project' => ['testFromCreateProject'],
        ];
    }

    public function testIsPackageInComposerJson()
    {
        $this->setupDirectory('testSkeleton');

        /** @var \Magento\Framework\Composer\ComposerInformation $composerInfo */
        $composerInfo = $this->objectManager->create(
            \Magento\Framework\Composer\ComposerInformation::class,
            ['composerFactory' => $this->composerFactory]
        );

        $packageName = 'magento/sample-module-minimal';
        $this->assertTrue($composerInfo->isPackageInComposerJson($packageName));
        $packageName = 'magento/wrong-module-name';
        $this->assertFalse($composerInfo->isPackageInComposerJson($packageName));
    }

    /**
     * @param $composerDir string Directory under _files that contains composer files
<<<<<<< HEAD
     */
    #[DataProvider('getRequiredPhpVersionDataProvider')]
=======
     *
     * @dataProvider getRequiredPhpVersionDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testGetRootRepositories($composerDir)
    {
        $this->setupDirectory($composerDir);

        /** @var \Magento\Framework\Composer\ComposerInformation $composerInfo */
        $composerInfo = $this->objectManager->create(
            \Magento\Framework\Composer\ComposerInformation::class,
            ['composerFactory' => $this->composerFactory]
        );
        if ($composerDir === 'testFromCreateProject') {
            $this->assertEquals(['https://repo.magento.com/'], $composerInfo->getRootRepositories());
        } else {
            $this->assertEquals([], $composerInfo->getRootRepositories());
        }
    }

    /**
     * @param $composerDir string Directory under _files that contains composer files
<<<<<<< HEAD
     */
    #[DataProvider('getRequiredPhpVersionDataProvider')]
=======
     *
     * @dataProvider getRequiredPhpVersionDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testIsMagentoRoot($composerDir)
    {
        $this->setupDirectory($composerDir);

        /** @var \Magento\Framework\Composer\ComposerInformation $composerInfo */
        $composerInfo = $this->objectManager->create(
            \Magento\Framework\Composer\ComposerInformation::class,
            ['composerFactory' => $this->composerFactory]
        );
        if ($composerDir === 'testFromClone') {
            $this->assertTrue($composerInfo->isMagentoRoot());
        } else {
            $this->assertFalse($composerInfo->isMagentoRoot());
        }
    }
}
