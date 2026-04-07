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
declare(strict_types=1);

namespace Magento\Catalog\Model\Product\Gallery;

use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Catalog\Model\Product;
use Magento\Catalog\Model\ResourceModel\Product as ProductResource;
use Magento\Catalog\Model\ResourceModel\Product\Gallery;
use Magento\Framework\ObjectManagerInterface;
use Magento\TestFramework\Helper\Bootstrap;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * Provides tests for media gallery images creation during product save.
 *
 * @magentoDataFixture Magento/Catalog/_files/product_simple.php
 * @magentoDataFixture Magento/Catalog/_files/product_image.php
 * @magentoDbIsolation enabled
 */
class CreateHandlerTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var string
     */
<<<<<<< HEAD
    private static $fileName = '/m/a/magento_image.jpg';
=======
    private $fileName = '/m/a/magento_image.jpg';
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

    /**
     * @var string
     */
    private $fileLabel = 'Magento image';

    /**
     * @var ObjectManagerInterface
     */
    private $objectManager;

    /**
     * @var CreateHandler
     */
    private $createHandler;

    /**
     * @var Gallery
     */
    private $galleryResource;

    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;

    /**
     * @var ProductResource
     */
    private $productResource;

    /**
     * @inheritdoc
     */
    protected function setUp(): void
    {
        $this->objectManager = Bootstrap::getObjectManager();
        $this->createHandler = $this->objectManager->create(CreateHandler::class);
        $this->galleryResource = $this->objectManager->create(Gallery::class);
        $this->productRepository = $this->objectManager->create(ProductRepositoryInterface::class);
        $this->productResource = Bootstrap::getObjectManager()->get(ProductResource::class);
    }

    /**
     * Tests gallery processing on product duplication.
     *
     * @covers \Magento\Catalog\Model\Product\Gallery\CreateHandler::execute
     *
     * @return void
     */
    public function testExecuteWithImageDuplicate(): void
    {
        $data = [
<<<<<<< HEAD
            'media_gallery' => ['images' => ['image' => ['file' => self::$fileName, 'label' => $this->fileLabel]]],
            'image' => self::$fileName,
=======
            'media_gallery' => ['images' => ['image' => ['file' => $this->fileName, 'label' => $this->fileLabel]]],
            'image' => $this->fileName,
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        ];
        $product = $this->initProduct($data);
        $this->createHandler->execute($product);
        $this->assertStringStartsWith('/m/a/magento_image', $product->getData('media_gallery/images/image/new_file'));
        $this->assertEquals($this->fileLabel, $product->getData('image_label'));

        $product->setIsDuplicate(true);
        $product->setData(
            'media_gallery',
<<<<<<< HEAD
            ['images' => ['image' => ['value_id' => '100', 'file' => self::$fileName, 'label' => $this->fileLabel]]]
=======
            ['images' => ['image' => ['value_id' => '100', 'file' => $this->fileName, 'label' => $this->fileLabel]]]
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        );
        $this->createHandler->execute($product);
        $this->assertStringStartsWith('/m/a/magento_image', $product->getData('media_gallery/duplicate/100'));
        $this->assertEquals($this->fileLabel, $product->getData('image_label'));
    }

    /**
     * Check sanity of posted image file name.
     *
     * @param string $imageFileName
<<<<<<< HEAD
     * @return void
     */
    #[DataProvider('illegalFilenameDataProvider')]
=======
     * @dataProvider illegalFilenameDataProvider
     * @return void
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testExecuteWithIllegalFilename(string $imageFileName): void
    {
        $this->expectException(\Magento\Framework\Exception\ValidatorException::class);
        $this->expectExceptionMessageMatches('".+ is not a valid file path"');

        $data = [
            'media_gallery' => ['images' => ['image' => ['file' => $imageFileName, 'label' => 'New image']]],
        ];
        $product = $this->initProduct($data);
        $product->setData('image', $imageFileName);
        $this->createHandler->execute($product);
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function illegalFilenameDataProvider(): array
=======
    public function illegalFilenameDataProvider(): array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            ['../../../../../.htaccess'],
            ['/../../../.././.htaccess.tmp'],
        ];
    }

    /**
     * Tests gallery processing with different image roles.
     *
<<<<<<< HEAD
=======
     * @dataProvider executeDataProvider
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @param string $image
     * @param string $smallImage
     * @param string $swatchImage
     * @param string $thumbnail
     * @return void
     */
<<<<<<< HEAD
    #[DataProvider('executeDataProvider')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testExecuteWithImageRoles(
        string $image,
        string $smallImage,
        string $swatchImage,
        string $thumbnail
    ): void {
        $data = [
<<<<<<< HEAD
            'media_gallery' => ['images' => ['image' => ['file' => self::$fileName, 'label' => '']]],
=======
            'media_gallery' => ['images' => ['image' => ['file' => $this->fileName, 'label' => '']]],
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            'image' => $image,
            'small_image' => $smallImage,
            'swatch_image' => $swatchImage,
            'thumbnail' => $thumbnail,
        ];
        $product = $this->initProduct($data);
        $this->createHandler->execute($product);
        $this->assertMediaImageRoleAttributes($product, $image, $smallImage, $swatchImage, $thumbnail);
    }

    /**
     * Tests gallery processing without images.
     *
<<<<<<< HEAD
=======
     * @dataProvider executeDataProvider
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @param string $image
     * @param string $smallImage
     * @param string $swatchImage
     * @param string $thumbnail
     * @return void
     */
<<<<<<< HEAD
    #[DataProvider('executeDataProvider')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testExecuteWithoutImages(
        string $image,
        string $smallImage,
        string $swatchImage,
        string $thumbnail
    ): void {
        $data = [
<<<<<<< HEAD
            'media_gallery' => ['images' => ['image' => ['file' => self::$fileName, 'label' => '']]],
=======
            'media_gallery' => ['images' => ['image' => ['file' => $this->fileName, 'label' => '']]],
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            'image' => $image,
            'small_image' => $smallImage,
            'swatch_image' => $swatchImage,
            'thumbnail' => $thumbnail,
        ];
        $product = $this->initProduct($data);
        $this->createHandler->execute($product);
        $product->unsetData('image');
        $product->unsetData('small_image');
        $product->unsetData('swatch_image');
        $product->unsetData('thumbnail');
        $this->createHandler->execute($product);
        $this->assertMediaImageRoleAttributes($product, $image, $smallImage, $swatchImage, $thumbnail);
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function executeDataProvider(): array
    {
        return [
            [
                'image' => self::$fileName,
                'smallImage' => self::$fileName,
                'swatchImage' => self::$fileName,
                'thumbnail' => self::$fileName,
            ],
            [
                'image' => 'no_selection',
                'smallImage' => 'no_selection',
                'swatchImage' => 'no_selection',
=======
    public function executeDataProvider(): array
    {
        return [
            [
                'image' => $this->fileName,
                'small_image' => $this->fileName,
                'swatch_image' => $this->fileName,
                'thumbnail' => $this->fileName,
            ],
            [
                'image' => 'no_selection',
                'small_image' => 'no_selection',
                'swatch_image' => 'no_selection',
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                'thumbnail' => 'no_selection',
            ],
        ];
    }

    /**
     * Tests gallery processing with variations of additional gallery image fields.
     *
<<<<<<< HEAD
=======
     * @dataProvider additionalGalleryFieldsProvider
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @param string $mediaField
     * @param string $value
     * @param string|null $expectedValue
     * @return void
     */
<<<<<<< HEAD
    #[DataProvider('additionalGalleryFieldsProvider')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testExecuteWithAdditionalGalleryFields(
        string $mediaField,
        string $value,
        ?string $expectedValue
    ): void {
        $data = [
<<<<<<< HEAD
            'media_gallery' => ['images' => ['image' => ['file' => self::$fileName, $mediaField => $value]]],
=======
            'media_gallery' => ['images' => ['image' => ['file' => $this->fileName, $mediaField => $value]]],
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        ];
        $product = $this->initProduct($data);
        $this->createHandler->execute($product);
        $galleryAttributeId = $this->productResource->getAttribute('media_gallery')->getAttributeId();
        $productImages = $this->galleryResource->loadProductGalleryByAttributeId($product, $galleryAttributeId);
        $image = reset($productImages);
        $this->assertEquals($image[$mediaField], $expectedValue);
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function additionalGalleryFieldsProvider(): array
=======
    public function additionalGalleryFieldsProvider(): array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            ['label', '', null],
            ['label', 'Some label', 'Some label'],
            ['disabled', '0', '0'],
            ['disabled', '1', '1'],
            ['position', '1', '1'],
            ['position', '2', '2'],
        ];
    }

    /**
     * @magentoDataFixture Magento/Catalog/_files/product_image_attribute.php
     * @magentoDataFixture Magento/Catalog/_files/product_simple.php
     * @magentoDataFixture Magento/Catalog/_files/product_image.php
     * @return void
     */
    public function testExecuteWithCustomMediaAttribute(): void
    {
        $data = [
<<<<<<< HEAD
            'media_gallery' => ['images' => ['image' => ['file' => self::$fileName, 'label' => '']]],
=======
            'media_gallery' => ['images' => ['image' => ['file' => $this->fileName, 'label' => '']]],
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            'image' => 'no_selection',
            'small_image' => 'no_selection',
            'swatch_image' => 'no_selection',
            'thumbnail' => 'no_selection',
<<<<<<< HEAD
            'image_attribute' => self::$fileName
=======
            'image_attribute' => $this->fileName
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        ];
        $product = $this->initProduct($data);
        $this->createHandler->execute($product);
        $mediaAttributeValue = $this->productResource->getAttributeRawValue(
            $product->getId(),
            ['image_attribute'],
            $product->getStoreId()
        );
<<<<<<< HEAD
        $this->assertEquals(self::$fileName, $mediaAttributeValue);
=======
        $this->assertEquals($this->fileName, $mediaAttributeValue);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }

    /**
     * Returns product for testing.
     *
     * @param array $data
     * @return Product
     */
    private function initProduct(array $data): Product
    {
        $product = $this->productRepository->getById(1);
        $product->addData($data);

        return $product;
    }

    /**
     * Asserts product attributes related to gallery images.
     *
     * @param Product $product
     * @param string $image
     * @param string $smallImage
     * @param string $swatchImage
     * @param string $thumbnail
     * @return void
     */
    private function assertMediaImageRoleAttributes(
        Product $product,
        string $image,
        string $smallImage,
        string $swatchImage,
        string $thumbnail
    ): void {
        $productsImageData = $this->productResource->getAttributeRawValue(
            $product->getId(),
            ['image', 'small_image', 'thumbnail', 'swatch_image'],
            $product->getStoreId()
        );
        $this->assertStringStartsWith(
            '/m/a/magento_image',
            $product->getData('media_gallery/images/image/new_file')
        );
        $this->assertEquals($image, $productsImageData['image']);
        $this->assertEquals($smallImage, $productsImageData['small_image']);
        $this->assertEquals($swatchImage, $productsImageData['swatch_image']);
        $this->assertEquals($thumbnail, $productsImageData['thumbnail']);
    }
}
