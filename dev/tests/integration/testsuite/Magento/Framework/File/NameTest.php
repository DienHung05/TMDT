<?php
/**
<<<<<<< HEAD
 * Copyright 2021 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

namespace Magento\Framework\File;

use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\TestFramework\Helper\Bootstrap;
use Magento\Framework\Filesystem;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * Test for \Magento\Framework\File\Name
 */
class NameTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var Name
     */
    private $nameModel;

    /**
     * @var Filesystem
     */
    private $fileSystem;

    /**
     * @inheritdoc
     */
    protected function setUp(): void
    {
        $objectManager = Bootstrap::getObjectManager();
        $this->fileSystem = $objectManager->get(\Magento\Framework\Filesystem::class);
        $this->nameModel = $objectManager->get(Name::class);
    }

    /**
     * @param string $destinationFile
     * @param string $expectedFileName
     * @return void
     *
     * @throws \Magento\Framework\Exception\FileSystemException
     *
     * @magentoDataFixture Magento/Framework/File/_files/framework_file_name.php
<<<<<<< HEAD
     */
    #[DataProvider('getNewFileNameDataProvider')]
=======
     * @dataProvider getNewFileNameDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testGetNewFileName($directory, $destinationFile, $expectedFileName)
    {
        $directory = $this->fileSystem->getDirectoryWrite($directory);
        $path = $directory->getAbsolutePath('image/' . $destinationFile);
        $name = $this->nameModel->getNewFileName($path);
        $this->assertEquals($expectedFileName, $name);
    }

    /**
     * Data provider for testGetNewFileName
     * @return array
     */
<<<<<<< HEAD
    public static function getNewFileNameDataProvider()
=======
    public function getNewFileNameDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            [DirectoryList::VAR_DIR, 'image.jpg', 'image.jpg'],
            [DirectoryList::VAR_DIR, 'image_one.jpg', 'image_one_1.jpg'],
            [DirectoryList::MEDIA, 'image.jpg', 'image.jpg'],
            [DirectoryList::MEDIA, 'image_one.jpg', 'image_one_1.jpg'],
            [DirectoryList::MEDIA, 'image_two.jpg', 'image_two_2.jpg']
        ];
    }
}
