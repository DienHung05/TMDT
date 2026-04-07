<?php
/**
<<<<<<< HEAD
 * Copyright 2019 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

namespace Magento\Catalog\Block\Product\View\Attribute;

use Magento\Directory\Model\PriceCurrency;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * Class checks price attribute displaying on frontend
 *
 * @magentoDbIsolation enabled
 * @magentoDataFixture Magento/Catalog/_files/product_decimal_attribute.php
 * @magentoDataFixture Magento/Catalog/_files/second_product_simple.php
 */
class PriceAttributeTest extends AbstractAttributeTest
{
    /** @var PriceCurrency */
    private $priceCurrency;

    /**
     * @inheritdoc
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->priceCurrency = $this->objectManager->create(PriceCurrency::class);
    }

    /**
<<<<<<< HEAD
     * @param string $price
     * @return void
     */
    #[DataProvider('pricesDataProvider')]
=======
     * @dataProvider pricesDataProvider
     * @param string $price
     * @return void
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testAttributeView(string $price): void
    {
        $this->processAttributeView('simple2', $price, $this->priceCurrency->convertAndFormat($price));
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function pricesDataProvider(): array
=======
    public function pricesDataProvider(): array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            'zero_price' => [
                'price' => '0',
            ],
            'positive_price' => [
                'price' => '150',
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    protected function getAttributeCode(): string
    {
        return 'decimal_attribute';
    }

    /**
     * @inheritdoc
     */
    protected function getDefaultAttributeValue(): string
    {
        return '';
    }
}
