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

namespace Magento\MsrpGroupedProduct\Pricing;

use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\TestFramework\Helper\Bootstrap;
use PHPUnit\Framework\TestCase;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * Test group product minimum advertised price model
 */
class MsrpPriceCalculatorTest extends TestCase
{
    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;
    /**
     * @var MsrpPriceCalculator
     */
    private $model;

    /**
     * @inheritDoc
     */
    protected function setUp(): void
    {
        parent::setUp();
        $objectManager = Bootstrap::getObjectManager();
        $this->productRepository = $objectManager->get(ProductRepositoryInterface::class);
        $this->model = $objectManager->get(MsrpPriceCalculator::class);
    }

    /**
     * Test grouped product minimum advertised price
     *
     * @magentoAppIsolation enabled
     * @magentoDataFixture Magento/GroupedProduct/_files/product_grouped.php
<<<<<<< HEAD
=======
     * @dataProvider getMsrpPriceValueDataProvider
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @param float|null $simpleProductPriceMsrp
     * @param float|null $virtualProductMsrp
     * @param float|null $expectedMsrp
     */
<<<<<<< HEAD
    #[DataProvider('getMsrpPriceValueDataProvider')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testGetMsrpPriceValue(
        ?float $simpleProductPriceMsrp,
        ?float $virtualProductMsrp,
        ?float $expectedMsrp
    ): void {
        $this->setProductMinimumAdvertisedPrice('simple', $simpleProductPriceMsrp);
        $this->setProductMinimumAdvertisedPrice('virtual-product', $virtualProductMsrp);
        $groupedProduct = $this->getProduct('grouped-product');
        $this->assertEquals($expectedMsrp, $this->model->getMsrpPriceValue($groupedProduct));
    }

    /**
     * Set product minimum advertised price by sku
     *
     * @param string $sku
     * @param float|null $msrp
     */
    private function setProductMinimumAdvertisedPrice(string $sku, ?float $msrp): void
    {
        $product = $this->getProduct($sku);
        $product->setMsrp($msrp);
        $this->productRepository->save($product);
    }

    /**
     * Get product by sku
     *
     * @param string $sku
     * @return ProductInterface
     */
    private function getProduct(string $sku): ProductInterface
    {
        return $this->productRepository->get($sku, false, null, true);
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function getMsrpPriceValueDataProvider(): array
=======
    public function getMsrpPriceValueDataProvider(): array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            [
                12.0,
                8.0,
                8.0
            ],
            [
                12.0,
                null,
                12.0
            ],
            [
                null,
                null,
                0.0
            ]
        ];
    }
}
