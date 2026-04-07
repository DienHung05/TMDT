<?php
/**
<<<<<<< HEAD
 * Copyright 2018 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

namespace Magento\Framework\App\Filesystem;

use Magento\TestFramework\Helper\Bootstrap;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * Test class for the \Magento\Framework\App\Filesystem\DirectoryResolver verification.
 */
class DirectoryResolverTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Magento\Framework\ObjectManagerInterface
     */
    private $objectManager;

    /**
     * @var \Magento\Framework\App\Filesystem\DirectoryResolver
     */
    private $directoryResolver;

    /**
     * @var \Magento\Framework\Filesystem
     */
    private $filesystem;

    /**
     * @inheritdoc
     */
    protected function setUp(): void
    {
        $this->objectManager = Bootstrap::getObjectManager();
        $this->directoryResolver = $this->objectManager
            ->create(\Magento\Framework\App\Filesystem\DirectoryResolver::class);
        $this->filesystem = $this->objectManager->create(\Magento\Framework\Filesystem::class);
    }

    /**
     * @param string $path
     * @param string $directoryConfig
     * @param bool $expectation
<<<<<<< HEAD
=======
     * @dataProvider validatePathDataProvider
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @throws \Magento\Framework\Exception\FileSystemException
     * @magentoAppIsolation enabled
     * @return void
     */
<<<<<<< HEAD
    #[DataProvider('validatePathDataProvider')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testValidatePath($path, $directoryConfig, $expectation)
    {
        $directory = $this->filesystem
            ->getDirectoryWrite(\Magento\Framework\App\Filesystem\DirectoryList::MEDIA);
        $path = $directory->getAbsolutePath() .'/' .$path;
        $this->assertEquals($expectation, $this->directoryResolver->validatePath($path, $directoryConfig));
    }

    /**
     * @magentoAppIsolation enabled
     * @return void
     */
    public function testValidatePathWithException()
    {
        $this->expectException(\Magento\Framework\Exception\FileSystemException::class);

        $directory = $this->filesystem
            ->getDirectoryWrite(\Magento\Framework\App\Filesystem\DirectoryList::MEDIA);
        $path = $directory->getAbsolutePath();
        $this->directoryResolver->validatePath($path, 'wrong_dir');
    }

    /**
     * @param string $path
     * @param string $directoryConfig
     * @param bool $expectation
<<<<<<< HEAD
=======
     * @dataProvider validatePathDataProvider
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @throws \Magento\Framework\Exception\FileSystemException
     * @magentoAppIsolation enabled
     * @return void
     */
<<<<<<< HEAD
    #[DataProvider('validatePathDataProvider')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testValidatePathWithSymlink($path, $directoryConfig, $expectation)
    {
        $directory = $this->filesystem
            ->getDirectoryWrite(\Magento\Framework\App\Filesystem\DirectoryList::PUB);
        $driver = $directory->getDriver();

        $mediaPath = $directory->getAbsolutePath('media');
        $mediaMovedPath = $directory->getAbsolutePath('moved-media');

        try {
            $driver->rename($mediaPath, $mediaMovedPath);
            $driver->symlink($mediaMovedPath, $mediaPath);
            $this->testValidatePath($path, $directoryConfig, $expectation);
        } finally {
            // be defensive in case some operations failed
            if ($driver->isExists($mediaPath) && $driver->isExists($mediaMovedPath)) {
                $driver->deleteFile($mediaPath);
                $driver->rename($mediaMovedPath, $mediaPath);
            } elseif ($driver->isExists($mediaMovedPath)) {
                $driver->rename($mediaMovedPath, $mediaPath);
            }
        }
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function validatePathDataProvider()
=======
    public function validatePathDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            [
                '/',
                DirectoryList::MEDIA,
                true,
            ],
            [
                '/../../pub/',
                DirectoryList::MEDIA,
                false,
            ],
        ];
    }
}
