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

namespace Magento\Catalog\Block\Adminhtml\Product\Helper\Form\Gallery;

use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Catalog\Block\Adminhtml\Product\Helper\Form\Gallery;
use Magento\Catalog\Model\Product;
use Magento\Catalog\Model\Product\Gallery\UpdateHandler;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\Registry;
use Magento\Store\Api\StoreRepositoryInterface;
use Magento\Store\Model\Store;
use Magento\TestFramework\Helper\Bootstrap;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * @magentoAppArea adminhtml
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class ContentTest extends \PHPUnit\Framework\TestCase
{
    /**
     * Test subject.
     *
     * @var Content
     */
    private $block;

    /**
     * @var Registry
     */
    private $registry;

    /**
     * @var DataPersistorInterface
     */
    private $dataPersistor;

    /**
     * @var StoreRepositoryInterface
     */
    private $storeRepository;

    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;

    /**
     * @inheritdoc
     */
    protected function setUp(): void
    {
        $gallery = Bootstrap::getObjectManager()->get(Gallery::class);
        $layout = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->get(
            \Magento\Framework\View\LayoutInterface::class
        );
        $this->block = $layout->createBlock(
            Content::class,
            'block'
        );
        $this->block->setElement($gallery);
        $this->registry = Bootstrap::getObjectManager()->get(Registry::class);
        $this->dataPersistor = Bootstrap::getObjectManager()->get(DataPersistorInterface::class);
        $this->storeRepository = Bootstrap::getObjectManager()->create(StoreRepositoryInterface::class);
        $this->productRepository = Bootstrap::getObjectManager()->get(ProductRepositoryInterface::class);
    }

    public function testGetUploader()
    {
        $this->assertInstanceOf(\Magento\Backend\Block\Media\Uploader::class, $this->block->getUploader());
    }

    /**
     * Test get images json using registry or data persistor.
     *
<<<<<<< HEAD
=======
     * @dataProvider getImagesAndImageTypesDataProvider
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @magentoDataFixture Magento/Catalog/_files/product_with_image.php
     * @magentoAppIsolation enabled
     * @param bool $isProductNew
     * @return void
     */
<<<<<<< HEAD
    #[DataProvider('getImagesAndImageTypesDataProvider')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testGetImagesJson(bool $isProductNew)
    {
        $this->prepareProduct($isProductNew);
        $imagesJson = $this->block->getImagesJson();
        $images = json_decode($imagesJson);
        $image = array_shift($images);
        $this->assertMatchesRegularExpression('~/m/a/magento_image~', $image->file);
        $this->assertSame('image', $image->media_type);
        $this->assertSame('Image Alt Text', $image->label);
        $this->assertSame('Image Alt Text', $image->label_default);
        $this->assertMatchesRegularExpression('~/media/catalog/product/m/a/magento_image~', $image->url);
    }

    /**
     * Test get image types json using registry or data persistor.
     *
<<<<<<< HEAD
=======
     * @dataProvider getImagesAndImageTypesDataProvider
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @magentoDataFixture Magento/Catalog/_files/product_with_image.php
     * @magentoAppIsolation enabled
     * @param bool $isProductNew
     * @return void
     */
<<<<<<< HEAD
    #[DataProvider('getImagesAndImageTypesDataProvider')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testGetImageTypes(bool $isProductNew)
    {
        $this->prepareProduct($isProductNew);
        $imageTypes = $this->block->getImageTypes();
        foreach ($imageTypes as $type => $image) {
            $this->assertSame($type, $image['code']);
            $type !== 'swatch_image'
                ? $this->assertMatchesRegularExpression('/\/m\/a\/magento_image/', $image['value'])
                : $this->assertNull($image['value']);
            $this->assertSame('[STORE VIEW]', $image['scope']->getText());
            $this->assertSame(sprintf('product[%s]', $type), $image['name']);
        }
    }

    /**
     * Provide test data for testGetImagesJson() and tesGetImageTypes().
     *
     * @return array
     */
<<<<<<< HEAD
    public static function getImagesAndImageTypesDataProvider()
=======
    public function getImagesAndImageTypesDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            [
                'isProductNew' => true,
            ],
            [
                'isProductNew' => false,
            ],
        ];
    }

    /**
     * Tests images positions in store view
     *
     * @magentoDataFixture Magento/Catalog/_files/product_with_image.php
     * @magentoDataFixture Magento/Store/_files/second_store.php
<<<<<<< HEAD
=======
     * @dataProvider imagesPositionStoreViewDataProvider
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @param string $addFromStore
     * @param array $newImages
     * @param string $viewFromStore
     * @param array $expectedImages
     * @return void
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
<<<<<<< HEAD
    #[DataProvider('imagesPositionStoreViewDataProvider')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testImagesPositionStoreView(
        string $addFromStore,
        array $newImages,
        string $viewFromStore,
        array $expectedImages
    ): void {
        $storeId = (int)$this->storeRepository->get($addFromStore)->getId();
        $product = $this->getProduct($storeId);
        $images = $product->getData('media_gallery')['images'];
        $images = array_merge($images, $newImages);
        $product->setData('media_gallery', ['images' => $images]);
        $updateHandler = Bootstrap::getObjectManager()->create(UpdateHandler::class);
        $updateHandler->execute($product);
        $storeId = (int)$this->storeRepository->get($viewFromStore)->getId();
        $product = $this->getProduct($storeId);
        $this->registry->register('current_product', $product);
        $actualImages = array_map(
            function ($item) {
                return [
                    'file' => $item['file'],
                    'label' => $item['label'],
                    'position' => $item['position'],
                ];
            },
            json_decode($this->block->getImagesJson(), true)
        );
        $this->assertEquals($expectedImages, array_values($actualImages));
    }

    /**
     * @return array[]
     */
<<<<<<< HEAD
    public static function imagesPositionStoreViewDataProvider(): array
=======
    public function imagesPositionStoreViewDataProvider(): array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            [
                'fixture_second_store',
                [
                    [
                        'file' => '/m/a/magento_small_image.jpg',
                        'position' => 2,
                        'label' => 'New Image Alt Text',
                        'disabled' => 0,
                        'media_type' => 'image'
                    ]
                ],
                'default',
                [
                    [
                        'file' => '/m/a/magento_image.jpg',
                        'label' => 'Image Alt Text',
                        'position' => 1,
                    ],
                    [
                        'file' => '/m/a/magento_small_image.jpg',
                        'label' => null,
                        'position' => 2,
                    ],
                ]
            ],
            [
                'fixture_second_store',
                [
                    [
                        'file' => '/m/a/magento_small_image.jpg',
                        'position' => 2,
                        'label' => 'New Image Alt Text',
                        'disabled' => 0,
                        'media_type' => 'image'
                    ]
                ],
                'fixture_second_store',
                [
                    [
                        'file' => '/m/a/magento_image.jpg',
                        'label' => 'Image Alt Text',
                        'position' => 1,
                    ],
                    [
                        'file' => '/m/a/magento_small_image.jpg',
                        'label' => 'New Image Alt Text',
                        'position' => 2,
                    ],
                ]
            ]
        ];
    }

    /**
     * Returns product for testing.
     *
     * @param int $storeId
     * @param string $sku
     * @return ProductInterface
     */
    private function getProduct(int $storeId = Store::DEFAULT_STORE_ID, string $sku = 'simple'): ProductInterface
    {
        return $this->productRepository->get($sku, false, $storeId, true);
    }

    /**
     * Prepare product, and set it to registry and data persistor.
     *
     * @param bool $isProductNew
     * @return void
     */
    private function prepareProduct(bool $isProductNew)
    {
        $product = Bootstrap::getObjectManager()->get(ProductRepositoryInterface::class)->get('simple');
        if ($isProductNew) {
            $newProduct = Bootstrap::getObjectManager()->create(Product::class);
            $this->registry->register('current_product', $newProduct);
            $productData['product'] = $product->getData();
            $dataPersistor = Bootstrap::getObjectManager()->get(DataPersistorInterface::class);
            $dataPersistor->set('catalog_product', $productData);
        } else {
            $this->registry->register('current_product', $product);
        }
    }
}
