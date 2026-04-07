<?php
/**
<<<<<<< HEAD
 * Copyright 2016 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
namespace Magento\BundleImportExport\Model;

use Magento\CatalogImportExport\Model\AbstractProductExportImportTestCase;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

class BundleTest extends AbstractProductExportImportTestCase
{
    /**
     * @return array
     */
<<<<<<< HEAD
    public static function exportImportDataProvider(): array
=======
    public function exportImportDataProvider(): array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            // @todo uncomment after MAGETWO-49677 resolved
            /*
            'bundle-product' => [
                [
                    'Magento/Bundle/_files/product.php'
                ],
                [
                    'bundle-product',
                ]
            ],
            */
            'bundle-product-multi-options' => [
                [
                    'Magento/Bundle/_files/product_with_multiple_options.php'
                ],
                [
                    'bundle-product',
                ]
            ],
            // @todo uncomment after MAGETWO-49677 resolved
            /*
            'bundle-product-tier-pricing' => [
                [
                    'Magento/Bundle/_files/product_with_tier_pricing.php'
                ],
                [
                    'bundle-product',
                ]
            ]
            */
        ];
    }

    /**
<<<<<<< HEAD
     * Run import/export tests.
     *
     * @magentoAppArea adminhtml
     * @magentoDbIsolation disabled
     * @magentoAppIsolation enabled
     *
     * @param array $fixtures
     * @param string[] $skus
     * @param string[] $skippedAttributes
     * @return void
     */
    #[DataProvider('exportImportDataProvider')]
    public function testImportExport(array $fixtures, array $skus, array $skippedAttributes = []): void
    {
        $rollbacks = [];
        foreach ($fixtures as $fixture) {
            $rollbacks[] = str_replace('.php', '_rollback.php', $fixture);
        }
        $this->fixtures = $fixtures;
        $this->executeFixtures($fixtures);
        $this->modifyData($skus);
        $skippedAttributes = array_merge(self::$skippedAttributes, $skippedAttributes);
        $csvFile = $this->executeExportTest($skus, $skippedAttributes);
        $this->executeImportReplaceTest($skus, $skippedAttributes, false, $csvFile);
        $this->executeImportDeleteTest($skus, $csvFile);
        $this->executeFixtures($rollbacks);
    }

    /**
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @inheritdoc
     */
    protected function assertEqualsSpecificAttributes(
        \Magento\Catalog\Model\Product $expectedProduct,
        \Magento\Catalog\Model\Product $actualProduct
    ): void {
        $expectedBundleProductOptions = $expectedProduct->getExtensionAttributes()->getBundleProductOptions();
        $actualBundleProductOptions = $actualProduct->getExtensionAttributes()->getBundleProductOptions();

        $this->assertEquals(count($expectedBundleProductOptions), count($actualBundleProductOptions));

        $expectedBundleProductOptionsToCompare = [];
        foreach ($expectedBundleProductOptions as $expectedBundleProductOption) {
            $expectedBundleProductOptionsToCompare[$expectedBundleProductOption->getTitle()]['type']
                = $expectedBundleProductOption->getType();
            foreach ($expectedBundleProductOption->getProductLinks() as $productLink) {
                $expectedBundleProductOptionsToCompare[$expectedBundleProductOption->getTitle()]['product_links'][]
                    = $productLink->getSku();
            }
        }

        $actualBundleProductOptionsToCompare = [];
        foreach ($actualBundleProductOptions as $actualBundleProductOption) {
            $actualBundleProductOptionsToCompare[$actualBundleProductOption->getTitle()]['type']
                = $actualBundleProductOption->getType();
            foreach ($actualBundleProductOption->getProductLinks() as $productLink) {
                $actualBundleProductOptionsToCompare[$actualBundleProductOption->getTitle()]['product_links'][]
                    = $productLink->getSku();
            }
        }

        $this->assertEquals(count($expectedBundleProductOptions), count($actualBundleProductOptions));

        foreach ($expectedBundleProductOptionsToCompare as $key => $expectedBundleProductOption) {
            $this->assertEquals(
                $expectedBundleProductOption['type'],
                $actualBundleProductOptionsToCompare[$key]['type']
            );

            $expectedProductLinks = $expectedBundleProductOption['product_links'];
            $actualProductLinks = $actualBundleProductOptionsToCompare[$key]['product_links'];

            sort($expectedProductLinks);
            sort($actualProductLinks);

            $this->assertEquals($expectedProductLinks, $actualProductLinks);
        }
    }
}
