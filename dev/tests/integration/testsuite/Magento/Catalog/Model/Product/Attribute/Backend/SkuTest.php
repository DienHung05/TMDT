<?php
/**
<<<<<<< HEAD
 * Copyright 2013 Adobe
 * All Rights Reserved.
 */
namespace Magento\Catalog\Model\Product\Attribute\Backend;

use PHPUnit\Framework\Attributes\DataProvider;

=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Catalog\Model\Product\Attribute\Backend;

>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
/**
 * Test class for \Magento\Catalog\Model\Product\Attribute\Backend\Sku.
 * @magentoAppArea adminhtml
 */
class SkuTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @magentoDataFixture Magento/Catalog/_files/product_simple.php
     */
    public function testGenerateUniqueSkuExistingProduct()
    {
        $repository = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
            \Magento\Catalog\Model\ProductRepository::class
        );
        $product = $repository->get('simple');
        $product->setId(null);
        $this->assertEquals('simple', $product->getSku());
        $product->getResource()->getAttribute('sku')->getBackend()->beforeSave($product);
        $this->assertEquals('simple-1', $product->getSku());
    }

    /**
     * @param $product \Magento\Catalog\Model\Product
<<<<<<< HEAD
     */
    #[DataProvider('uniqueSkuDataProvider')]
=======
     * @dataProvider uniqueSkuDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testGenerateUniqueSkuNotExistingProduct($product)
    {
        $this->assertEquals('simple', $product->getSku());
        $product->getResource()->getAttribute('sku')->getBackend()->beforeSave($product);
        $this->assertEquals('simple', $product->getSku());
    }

    /**
     * @magentoDataFixture Magento/Catalog/_files/product_simple.php
     * @magentoAppArea adminhtml
     * @magentoDbIsolation enabled
     */
    public function testGenerateUniqueLongSku()
    {
        $repository = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
            \Magento\Catalog\Model\ProductRepository::class
        );
        $product = $repository->get('simple');
        $product->setSku('0123456789012345678901234567890123456789012345678901234567890123');
        $product->save();
        /** @var \Magento\Catalog\Model\Product\Copier $copier */
        $copier = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->get(
            \Magento\Catalog\Model\Product\Copier::class
        );
        $duplicate = $copier->copy($product);
        $this->assertEquals('0123456789012345678901234567890123456789012345678901234567890123', $product->getSku());
        $this->assertEquals('01234567890123456789012345678901234567890123456789012345678901-1', $duplicate->getSku());
    }

    /**
     * Returns simple product
     *
     * @return array
     */
<<<<<<< HEAD
    public static function uniqueSkuDataProvider()
    {
        $product = self::_getProduct();
=======
    public function uniqueSkuDataProvider()
    {
        $product = $this->_getProduct();
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        return [[$product]];
    }

    /**
     * Get product form data provider
     *
     * @return \Magento\Catalog\Model\Product
     */
<<<<<<< HEAD
    protected static function _getProduct()
=======
    protected function _getProduct()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        /** @var $product \Magento\Catalog\Model\Product */
        $product = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
            \Magento\Catalog\Model\Product::class
        );
        $product->setTypeId(
            \Magento\Catalog\Model\Product\Type::TYPE_SIMPLE
        )->setId(
            1
        )->setAttributeSetId(
            4
        )->setWebsiteIds(
            [1]
        )->setName(
            'Simple Product'
        )->setSku(
            'simple'
        )->setPrice(
            10
        )->setDescription(
            'Description with <b>html tag</b>'
        )->setVisibility(
            \Magento\Catalog\Model\Product\Visibility::VISIBILITY_BOTH
        )->setStatus(
            \Magento\Catalog\Model\Product\Attribute\Source\Status::STATUS_ENABLED
        )->setCategoryIds(
            [2]
        )->setStockData(
            ['use_config_manage_stock' => 1, 'qty' => 100, 'is_qty_decimal' => 0, 'is_in_stock' => 1]
        );
        return $product;
    }
}
