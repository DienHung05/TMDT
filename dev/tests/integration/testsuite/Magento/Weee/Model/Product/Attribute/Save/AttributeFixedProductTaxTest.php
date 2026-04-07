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

namespace Magento\Weee\Model\Product\Attribute\Save;

use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Eav\Model\Entity\Attribute\Exception;
use Magento\Framework\ObjectManagerInterface;
use Magento\TestFramework\Helper\Bootstrap;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
use PHPUnit\Framework\TestCase;

/**
 * @magentoDbIsolation enabled
 * @magentoDataFixture Magento/Weee/_files/fixed_product_attribute.php
 * @magentoDataFixture Magento/Catalog/_files/second_product_simple.php
 */
class AttributeFixedProductTaxTest extends TestCase
{
    /** @var ObjectManagerInterface */
    private $objectManager;

    /** @var ProductRepositoryInterface */
    private $productRepository;

    /** @var string */
    private $attributeCode;

    /**
     * @inheritdoc
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->objectManager = Bootstrap::getObjectManager();
        $this->productRepository = $this->objectManager->create(ProductRepositoryInterface::class);
        $this->attributeCode = 'fixed_product_attribute';
    }

    /**
<<<<<<< HEAD
=======
     * @dataProvider fPTProvider
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @param array $data
     * @param array $expectedData
     * @return void
     */
<<<<<<< HEAD
    #[DataProvider('fPTProvider')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testSaveProductWithFPTAttribute(array $data, array $expectedData): void
    {
        $product = $this->productRepository->get('simple2');
        $product->addData([$this->attributeCode => $data]);
        $product = $this->productRepository->save($product);
        $this->assertEquals($expectedData, $product->getData($this->attributeCode));
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function fPTProvider(): array
=======
    public function fPTProvider(): array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            [
                'data' => [
                    [
                        'region_id' => '0',
                        'country' => 'GB',
                        'val' => '',
                        'value' => '15',
                        'website_id' => '0',
                        'state' => '',
                    ],
                    [
                        'region_id' => '1',
                        'country' => 'US',
                        'val' => '',
                        'value' => '35',
                        'website_id' => '0',
                        'state' => '',
                    ],
                ],
<<<<<<< HEAD
                'expectedData' => [
=======
                'expected_data' => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    [
                        'website_id' => '0',
                        'country' => 'GB',
                        'state' => '0',
                        'value' => '15.0000',
                        'website_value' => 15.0,
                    ],
                    [
                        'website_id' => '0',
                        'country' => 'US',
                        'state' => '0',
                        'value' => '35.0000',
                        'website_value' => 35.0
                    ],
                ],
            ],
        ];
    }

    /**
     * @return void
     */
    public function testSaveProductWithFPTAttributeWithDuplicates(): void
    {
        $attributeValues = [
            [
                'region_id' => '0',
                'country' => 'GB',
                'val' => '',
                'value' => '15',
                'website_id' => '0',
                'state' => '',
            ],
            [
                'region_id' => '0',
                'country' => 'GB',
                'val' => '',
                'value' => '15',
                'website_id' => '0',
                'state' => '',
            ],
        ];
        $this->expectException(Exception::class);
        $message = 'Set unique country-state combinations within the same fixed product tax. '
            . 'Verify the combinations and try again.';
        $this->expectExceptionMessage((string)__($message));
        $product = $this->productRepository->get('simple2');
        $product->addData([$this->attributeCode => $attributeValues]);
        $this->productRepository->save($product);
    }
}
