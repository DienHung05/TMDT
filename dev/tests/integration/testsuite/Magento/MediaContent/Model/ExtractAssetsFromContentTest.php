<?php
/**
<<<<<<< HEAD
 * Copyright 2020 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 *
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

namespace Magento\MediaContent\Model;

use Magento\MediaContentApi\Api\ExtractAssetsFromContentInterface;
use Magento\TestFramework\Helper\Bootstrap;
use PHPUnit\Framework\TestCase;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * Test for ExtractAssetsFromContent
 */
class ExtractAssetsFromContentTest extends TestCase
{
    /**
     * @var ExtractAssetsFromContentInterface
     */
    private $extractAssetsFromContent;

    /**
     * @inheritdoc
     */
    protected function setUp(): void
    {
        $this->extractAssetsFromContent = Bootstrap::getObjectManager()
            ->get(ExtractAssetsFromContentInterface::class);
    }

    /**
     * Assing assets to content, retrieve the data, then unassign assets from content
     *
     * @magentoDataFixture Magento/MediaGallery/_files/media_asset.php
<<<<<<< HEAD
     * @param string $content
     * @param array $assetIds
     */
    #[DataProvider('contentProvider')]
=======
     *
     * @dataProvider contentProvider
     * @param string $content
     * @param array $assetIds
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testExecute(string $content, array $assetIds): void
    {
        $assets = $this->extractAssetsFromContent->execute($content);

        $extractedAssetIds = [];
        foreach ($assets as $asset) {
            $extractedAssetIds[] = $asset->getId();
        }

        sort($assetIds);
        sort($extractedAssetIds);

        $this->assertEquals($assetIds, $extractedAssetIds);
    }

    /**
     * Data provider for testExecute
     *
     * @return array
     */
<<<<<<< HEAD
    public static function contentProvider()
=======
    public function contentProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            'Empty Content' => [
                '',
                []
            ],
            'No paths in content' => [
                'content without paths',
                []
            ],
            'Relevant paths in content' => [
                'content {{media url="testDirectory/path.jpg"}} content',
                [
                    2020
                ]
            ],
<<<<<<< HEAD
            'Relevant paths in content without quotes' => [
                'content {{media url=testDirectory/path.jpg}} content',
                [
                    2020
                ]
            ],
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            'Relevant wysiwyg paths in content' => [
                'content <img src="https://domain.com/media/testDirectory/path.jpg"}} content',
                [
                    2020
                ]
            ],
            'Relevant path content with pub' => [
                '/pub/media/testDirectory/path.jpg',
                [
                    2020
                ]
            ],
            'Relevant path content' => [
                '/media/testDirectory/path.jpg',
                [
                    2020
                ]
            ],
            'Irrelevant paths in content' => [
                'content {{media url="media/non-existing-path.png"}} content',
                []
            ],
        ];
    }
}
