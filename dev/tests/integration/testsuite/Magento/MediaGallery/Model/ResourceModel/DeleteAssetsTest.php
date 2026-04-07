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
declare(strict_types=1);

namespace Magento\MediaGallery\Model\ResourceModel;

use Magento\MediaGalleryApi\Api\GetAssetsByPathsInterface;
use Magento\MediaGalleryApi\Api\DeleteAssetsByPathsInterface;
use Magento\TestFramework\Helper\Bootstrap;
use PHPUnit\Framework\TestCase;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * Testing delete assets operation
 */
class DeleteAssetsTest extends TestCase
{
    private const FIXTURE_ASSET_PATH = 'testDirectory/path.jpg';
    /**
     * @var GetAssetsByPathsInterface
     */
    private $getAssetsByPath;

    /**
     * @var DeleteAssetsByPathsInterface
     */
    private $deleteAssetsByPaths;

    /**
     * @inheritdoc
     */
    protected function setUp(): void
    {
        $this->getAssetsByPath = Bootstrap::getObjectManager()->get(GetAssetsByPathsInterface::class);
        $this->deleteAssetsByPaths = Bootstrap::getObjectManager()->get(DeleteAssetsByPathsInterface::class);
    }

    /**
     * Test deletion of assets by path
     *
     * @magentoDataFixture Magento/MediaGallery/_files/media_asset.php
     *
     * @param array $paths
     * @throws \Magento\Framework\Exception\CouldNotSaveException
     * @throws \Magento\Framework\Exception\LocalizedException
<<<<<<< HEAD
     */
    #[DataProvider('matchingPathsProvider')]
=======
     *
     * @dataProvider matchingPathsProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testAssetsAreDeleted(array $paths): void
    {
        $this->deleteAssetsByPaths->execute($paths);
        $this->assertEmpty($this->getAssetsByPath->execute([self::FIXTURE_ASSET_PATH]));
    }

    /**
     * Test scenarios where delete operation should not delete an asset
     *
     * @magentoDataFixture Magento/MediaGallery/_files/media_asset.php
     *
     * @param array $paths
     * @throws \Magento\Framework\Exception\CouldNotSaveException
     * @throws \Magento\Framework\Exception\LocalizedException
<<<<<<< HEAD
     */
    #[DataProvider('notMatchingPathsProvider')]
=======
     *
     * @dataProvider notMatchingPathsProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testAssetsAreNotDeleted(array $paths): void
    {
        $this->deleteAssetsByPaths->execute($paths);
        $this->assertNotEmpty($this->getAssetsByPath->execute([self::FIXTURE_ASSET_PATH]));
    }

    /**
     * Data provider of paths matching existing asset
     *
     * @return array
     */
<<<<<<< HEAD
    public static function matchingPathsProvider(): array
=======
    public function matchingPathsProvider(): array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            [['testDirectory/path.jpg']],
            [['testDirectory/']],
            [['testDirectory']]
        ];
    }

    /**
     * Data provider of paths not matching existing asset
     *
     * @return array
     */
<<<<<<< HEAD
    public static function notMatchingPathsProvider(): array
=======
    public function notMatchingPathsProvider(): array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            [['testDirectory/path.png']],
            [['anotherDirectory/path.jpg']],
            [['path.jpg']]
        ];
    }
}
