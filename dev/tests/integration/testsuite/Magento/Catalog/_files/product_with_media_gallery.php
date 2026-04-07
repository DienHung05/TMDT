<?php
/**
<<<<<<< HEAD
 * Copyright 2021 Adobe
 * All Rights Reserved.
 */
declare(strict_types=1);

use Magento\Catalog\Api\Data\ProductAttributeMediaGalleryEntryInterfaceFactory;
use Magento\Catalog\Api\ProductAttributeMediaGalleryManagementInterface;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\Api\Data\ImageContentInterfaceFactory;
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Catalog\Model\Product;
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
use Magento\TestFramework\Helper\Bootstrap;
use Magento\TestFramework\Workaround\Override\Fixture\Resolver;

Resolver::getInstance()->requireDataFixture('Magento/Catalog/_files/product_image.php');
Resolver::getInstance()->requireDataFixture('Magento/Catalog/_files/product_simple_with_media.php');

$objectManager = Bootstrap::getObjectManager();
$productRepository = $objectManager->create(ProductRepositoryInterface::class);
$product = $productRepository->get('simple_product_with_media');

<<<<<<< HEAD
/** @var ProductAttributeMediaGalleryEntryInterfaceFactory $mediaGalleryEntryFactory */
$mediaGalleryEntryFactory = $objectManager->get(ProductAttributeMediaGalleryEntryInterfaceFactory::class);

/** @var ImageContentInterfaceFactory $imageContentFactory */
$imageContentFactory = $objectManager->get(ImageContentInterfaceFactory::class);
$imageContent = $imageContentFactory->create();
$testImagePath = __DIR__ . '/magento_image.jpg';
$imageContent->setBase64EncodedData(base64_encode(file_get_contents($testImagePath)));
$imageContent->setType("image/jpeg");
$imageContent->setName("magento_image.jpg");

$image = $mediaGalleryEntryFactory->create();
$image->setDisabled(false);
$image->setFile('/m/a/magento_image.jpg');
$image->setLabel('Image Alt Text');
$image->setMediaType('image');
$image->setPosition(1);
$image->setContent($imageContent);

/** @var ProductAttributeMediaGalleryManagementInterface $mediaGalleryManagement */
$mediaGalleryManagement = $objectManager->get(ProductAttributeMediaGalleryManagementInterface::class);
$mediaGalleryManagement->create('simple_product_with_media', $image);
=======
/** @var $product Product */
$product->setStoreId(0)
    ->setImage('/m/a/magento_image.jpg')
    ->setSmallImage('/m/a/magento_image.jpg')
    ->setThumbnail('/m/a/magento_image.jpg')
    ->setData('media_gallery', ['images' => [
        [
            'file' => '/m/a/magento_image.jpg',
            'position' => 1,
            'label' => 'Image Alt Text',
            'disabled' => 0,
            'media_type' => 'image'
        ],
    ]])
    ->setCanSaveCustomOptions(true)
    ->save();
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
