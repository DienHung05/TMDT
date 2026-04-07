<?php
/**
<<<<<<< HEAD
 * Copyright 2020 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types = 1);

namespace Magento\ImportExport\Model\Export\Adapter;

use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\Filesystem;
use Magento\ImportExport\Model\Import;
use Magento\Framework\ObjectManagerInterface;
use Magento\TestFramework\Helper\Bootstrap;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
use PHPUnit\Framework\TestCase;

/**
 * Test for Export adapter csv
 */
class CsvTest extends TestCase
{
    /**
     * @var string Destination file name
     */
<<<<<<< HEAD
    private static $destination = 'destinationFile';
=======
    private $destination = 'destinationFile';
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

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
    }

    /**
     * Test to destruct export adapter
     *
<<<<<<< HEAD
=======
     * @dataProvider destructDataProvider
     *
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @param string $destination
     * @param bool $shouldBeDeleted
     * @return void
     */
<<<<<<< HEAD
    #[DataProvider('destructDataProvider')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testDestruct(string $destination, bool $shouldBeDeleted): void
    {
        $csv = $this->objectManager->create(Csv::class, [
            'destination' => $destination,
            'destinationDirectoryCode' => DirectoryList::VAR_DIR
        ]);
        /** @var Filesystem $fileSystem */
        $fileSystem = $this->objectManager->get(Filesystem::class);
        $directoryHandle = $fileSystem->getDirectoryRead(DirectoryList::VAR_DIR);
        /** Assert that the destination file is present after construct */
        $this->assertFileExists(
            $directoryHandle->getAbsolutePath($destination),
            'The destination file was\'t created after construct'
        );
        unset($csv);

        if ($shouldBeDeleted) {
            $this->assertFileDoesNotExist($directoryHandle->getAbsolutePath($destination));
        } else {
            $this->assertFileExists($directoryHandle->getAbsolutePath($destination));
        }
    }

    /**
     * DataProvider for testDestruct
     *
     * @return array
     */
<<<<<<< HEAD
    public static function destructDataProvider(): array
    {
        return [
            'temporary file' => [self::$destination, true],
            'import history file' => [Import::IMPORT_HISTORY_DIR . self::$destination, false],
=======
    public function destructDataProvider(): array
    {
        return [
            'temporary file' => [$this->destination, true],
            'import history file' => [Import::IMPORT_HISTORY_DIR . $this->destination, false],
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        ];
    }
}
