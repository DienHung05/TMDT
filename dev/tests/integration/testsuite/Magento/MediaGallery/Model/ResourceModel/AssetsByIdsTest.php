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

use Magento\MediaGalleryApi\Api\GetAssetsByIdsInterface;
use Magento\TestFramework\Helper\Bootstrap;
use PHPUnit\Framework\TestCase;

/**
 * Test for GetAssetsByIdsInterface
 */
class AssetsByIdsTest extends TestCase
{
    private const FIXTURE_ASSET_ID = 2020;
    private const FIXTURE_ASSET_PATH = 'testDirectory/path.jpg';

    /**
     * @var GetAssetsByIdsInterface
     */
    private $getAssetsByIds;

    /**
     * @inheritdoc
     */
    protected function setUp(): void
    {
        $this->getAssetsByIds = Bootstrap::getObjectManager()->get(GetAssetsByIdsInterface::class);
    }

    /**
     * Testing assets keywords save and get
     *
     * @throws \Magento\Framework\Exception\LocalizedException
     *
     * @magentoDataFixture Magento/MediaGallery/_files/media_asset.php
     */
    public function testExecute(): void
    {
        $assets = $this->getAssetsByIds->execute([self::FIXTURE_ASSET_ID]);
        $this->assertCount(1, $assets);
        $this->assertEquals($assets[0]->getPath(), self::FIXTURE_ASSET_PATH);
    }
}
