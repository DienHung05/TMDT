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

namespace Magento\Downloadable\Model\File;

use Magento\Downloadable\Api\Data\File\ContentInterface;
use Magento\Downloadable\Api\Data\File\ContentInterfaceFactory;
use Magento\Downloadable\Model\Link;
use Magento\Downloadable\Model\Sample;
use Magento\Framework\Filesystem;
use Magento\Framework\Filesystem\Directory\WriteInterface;
use Magento\Framework\ObjectManagerInterface;
use Magento\MediaStorage\Helper\File\Storage;
use Magento\MediaStorage\Helper\File\Storage\Database;
use Magento\MediaStorage\Model\File\Validator\NotProtectedExtension;
use Magento\TestFramework\Helper\Bootstrap;
use PHPUnit\Framework\TestCase;

/**
 * Integration test for \Magento\Downloadable\Model\File\ContentUploader class
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class ContentUploaderTest extends TestCase
{
    /**
     * @var ContentInterface
     */
    private $fileContent;

    /**
     * @var string
     */
    private $filePath;

    /**
     * @var ContentUploader
     */
    private $model;

    /**
     * @var ObjectManagerInterface
     */
    private $objectManager;

    /**
     * @inheritdoc
     */
    protected function setUp(): void
    {
        $this->objectManager = Bootstrap::getObjectManager();
        $this->fileContent = $this->objectManager->create(ContentInterfaceFactory::class)->create();
        $fixtureDir = realpath(__DIR__ . '/../../_files');
        $this->filePath = $fixtureDir . DIRECTORY_SEPARATOR . 'test_image.jpg';
        $this->fileContent->setFileData(base64_encode(file_get_contents($this->filePath)));
        $this->fileContent->setName('test_image.jpg');

        $database = $this->getMockBuilder(Database::class)
            ->disableOriginalConstructor()
            ->getMock();
        $storage = $this->getMockBuilder(Storage::class)
            ->disableOriginalConstructor()
            ->getMock();
        $validator = $this->getMockBuilder(NotProtectedExtension::class)
            ->disableOriginalConstructor()
            ->getMock();
        $filesystem = $this->getMockBuilder(Filesystem::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['getDirectoryWrite'])
            ->getMock();
<<<<<<< HEAD
        $systemTmpDirectory = $this->createMock(WriteInterface::class);
=======
        $systemTmpDirectory = $this->getMockForAbstractClass(
            WriteInterface::class,
            [],
            '',
            false,
            true,
            true,
            ['writeFile']
        );
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $systemTmpDirectory->expects($this->once())->method('writeFile')->willReturn(1);
        $systemTmpDirectory->method('getAbsolutePath')->willReturn($this->filePath);

        $filesystem->method('getDirectoryWrite')->willReturn($systemTmpDirectory);
        $link = $this->getMockBuilder(Link::class)
            ->disableOriginalConstructor()
            ->getMock();
        $sampleConfig = $this->getMockBuilder(Sample::class)
            ->disableOriginalConstructor()
            ->getMock();
<<<<<<< HEAD
        $this->model = $this->getMockBuilder(ContentUploader::class)
            ->setConstructorArgs([$database, $storage, $validator, $filesystem, $link, $sampleConfig])
            ->onlyMethods(['save'])
            ->getMock();
=======
        $this->model = $this->getMockForAbstractClass(
            ContentUploader::class,
            [$database, $storage, $validator, $filesystem, $link, $sampleConfig],
            '',
            true,
            true,
            true,
            ['save']
        );
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }

    public function testUploadWithSuccessSave()
    {
        $data = ['path' => $this->filePath, 'file' => 'test_image.jpg'];
        $this->model->expects($this->once())->method('save')->willReturn($data);
        $result = $this->model->upload($this->fileContent, 'sample');
        $this->assertIsArray($result);
        $this->assertArrayHasKey('status', $result);
        $this->assertArrayHasKey('name', $result);
    }

    public function testUploadWithFalseSave()
    {
        $this->model->expects($this->once())->method('save')->willReturn(false);
        $this->assertFalse($this->model->upload($this->fileContent, 'sample'));
    }
}
