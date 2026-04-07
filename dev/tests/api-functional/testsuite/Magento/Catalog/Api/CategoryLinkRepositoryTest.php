<?php
/**
<<<<<<< HEAD
 * Copyright 2015 Adobe
 * All Rights Reserved.
 */
namespace Magento\Catalog\Api;

use PHPUnit\Framework\Attributes\DataProvider;
=======
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Catalog\Api;

>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
use Magento\TestFramework\Helper\Bootstrap;
use Magento\TestFramework\TestCase\WebapiAbstract;

class CategoryLinkRepositoryTest extends WebapiAbstract
{
<<<<<<< HEAD
    public const SERVICE_WRITE_NAME = 'catalogCategoryLinkRepositoryV1';
    public const SERVICE_VERSION = 'V1';
    public const RESOURCE_PATH_SUFFIX = '/V1/categories';
    public const RESOURCE_PATH_PREFIX = 'products';

    /**
     * @var int
     */
    private static $categoryId = 333;

    /**
=======
    const SERVICE_WRITE_NAME = 'catalogCategoryLinkRepositoryV1';
    const SERVICE_VERSION = 'V1';
    const RESOURCE_PATH_SUFFIX = '/V1/categories';
    const RESOURCE_PATH_PREFIX = 'products';

    private $categoryId = 333;

    /**
     * @dataProvider saveDataProvider
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @magentoApiDataFixture Magento/Catalog/_files/products_in_category.php
     * @param int $productId
     * @param string[] $productLink
     * @param int $productPosition
     */
<<<<<<< HEAD
    #[DataProvider('saveDataProvider')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testSave($productLink, $productId, $productPosition = 0)
    {
        $serviceInfo = [
            'rest' => [
                'resourcePath' => self::RESOURCE_PATH_SUFFIX
<<<<<<< HEAD
                    . '/' . self::$categoryId . '/' . self::RESOURCE_PATH_PREFIX,
=======
                    . '/' . $this->categoryId . '/' . self::RESOURCE_PATH_PREFIX,
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                'httpMethod' => \Magento\Framework\Webapi\Rest\Request::HTTP_METHOD_POST,
            ],
            'soap' => [
                'service' => self::SERVICE_WRITE_NAME,
                'serviceVersion' => self::SERVICE_VERSION,
                'operation' => self::SERVICE_WRITE_NAME . 'Save',
            ],
        ];
        $result = $this->_webApiCall($serviceInfo, ['productLink' => $productLink]);
        $this->assertTrue($result);
<<<<<<< HEAD
        $this->assertTrue($this->isProductInCategory(self::$categoryId, $productId, $productPosition));
    }

    public static function saveDataProvider()
    {
        return [
            [
                ['sku' => 'simple_with_cross', 'position' => 7, 'category_id' => self::$categoryId],
=======
        $this->assertTrue($this->isProductInCategory($this->categoryId, $productId, $productPosition));
    }

    public function saveDataProvider()
    {
        return [
            [
                ['sku' => 'simple_with_cross', 'position' => 7, 'category_id' => $this->categoryId],
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                334,
                7,
            ],
            [
<<<<<<< HEAD
                ['sku' => 'simple_with_cross', 'category_id' => self::$categoryId],
=======
                ['sku' => 'simple_with_cross', 'category_id' => $this->categoryId],
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                334,
                0
            ],
        ];
    }

    /**
<<<<<<< HEAD
=======
     * @dataProvider updateProductProvider
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @magentoApiDataFixture Magento/Catalog/_files/products_in_category.php
     * @param int $productId
     * @param string[] $productLink
     * @param int $productPosition
     */
<<<<<<< HEAD
    #[DataProvider('updateProductProvider')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testUpdateProduct($productLink, $productId, $productPosition = 0)
    {
        $serviceInfo = [
            'rest' => [
                'resourcePath' => self::RESOURCE_PATH_SUFFIX
<<<<<<< HEAD
                    . '/' . self::$categoryId . '/' . self::RESOURCE_PATH_PREFIX,
=======
                    . '/' . $this->categoryId . '/' . self::RESOURCE_PATH_PREFIX,
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                'httpMethod' => \Magento\Framework\Webapi\Rest\Request::HTTP_METHOD_PUT,
            ],
            'soap' => [
                'service' => self::SERVICE_WRITE_NAME,
                'serviceVersion' => self::SERVICE_VERSION,
                'operation' => self::SERVICE_WRITE_NAME . 'Save',
            ],
        ];
        $result = $this->_webApiCall($serviceInfo, ['productLink' => $productLink]);
        $this->assertTrue($result);
<<<<<<< HEAD
        $this->assertFalse($this->isProductInCategory(self::$categoryId, $productId, $productPosition));
    }

    public static function updateProductProvider()
    {
        return [
            [
                ['sku' => 'simple_with_cross', 'position' => 7, 'categoryId' => self::$categoryId],
=======
        $this->assertFalse($this->isProductInCategory($this->categoryId, $productId, $productPosition));
    }

    public function updateProductProvider()
    {
        return [
            [
                ['sku' => 'simple_with_cross', 'position' => 7, 'categoryId' => $this->categoryId],
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                333,
                4,
            ],
            [
<<<<<<< HEAD
                ['sku' => 'simple_with_cross', 'categoryId' => self::$categoryId],
=======
                ['sku' => 'simple_with_cross', 'categoryId' => $this->categoryId],
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                333,
                0
            ],
        ];
    }

    /**
     * @magentoApiDataFixture Magento/Catalog/_files/products_in_category.php
     */
    public function testDelete()
    {
        $serviceInfo = [
            'rest' => [
<<<<<<< HEAD
                'resourcePath' => self::RESOURCE_PATH_SUFFIX . '/' . self::$categoryId .
=======
                'resourcePath' => self::RESOURCE_PATH_SUFFIX . '/' . $this->categoryId .
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    '/' . self::RESOURCE_PATH_PREFIX . '/simple',
                'httpMethod' => \Magento\Framework\Webapi\Rest\Request::HTTP_METHOD_DELETE,
            ],
            'soap' => [
                'service' => self::SERVICE_WRITE_NAME,
                'serviceVersion' => self::SERVICE_VERSION,
                'operation' => self::SERVICE_WRITE_NAME . 'DeleteByIds',
            ],
        ];
        $result = $this->_webApiCall(
            $serviceInfo,
<<<<<<< HEAD
            ['sku' => 'simple', 'categoryId' => self::$categoryId]
        );
        $this->assertTrue($result);
        $this->assertFalse($this->isProductInCategory(self::$categoryId, 333, 10));
=======
            ['sku' => 'simple', 'categoryId' => $this->categoryId]
        );
        $this->assertTrue($result);
        $this->assertFalse($this->isProductInCategory($this->categoryId, 333, 10));
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }

    /**
     * @param int $categoryId
     * @param int $productId
     * @param int $productPosition
     * @return bool
     */
    private function isProductInCategory($categoryId, $productId, $productPosition)
    {
        /** @var \Magento\Catalog\Api\CategoryRepositoryInterface $categoryLoader */
        $categoryLoader = Bootstrap::getObjectManager()
            ->create(\Magento\Catalog\Api\CategoryRepositoryInterface::class);
        $category = $categoryLoader->get($categoryId);
        $productsPosition = $category->getProductsPosition();

        if (isset($productsPosition[$productId]) && $productsPosition[$productId] == $productPosition) {
            return true;
        } else {
            return false;
        }
    }
}
