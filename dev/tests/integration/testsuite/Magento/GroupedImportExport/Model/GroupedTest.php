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
namespace Magento\GroupedImportExport\Model;

use Magento\CatalogImportExport\Model\AbstractProductExportImportTestCase;

class GroupedTest extends AbstractProductExportImportTestCase
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
            'grouped-product' => [
                [
                    'Magento/GroupedProduct/_files/product_grouped.php'
                ],
                [
                    'grouped-product',
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    protected function assertEqualsSpecificAttributes(
        \Magento\Catalog\Model\Product $expectedProduct,
        \Magento\Catalog\Model\Product $actualProduct
    ): void {
        $expectedAssociatedProducts = $expectedProduct->getTypeInstance()->getAssociatedProducts($expectedProduct);
        $actualAssociatedProducts = $actualProduct->getTypeInstance()->getAssociatedProducts($actualProduct);

        $expectedAssociatedProductSkus = [];
        $actualAssociatedProductSkus = [];
        $i = 0;
        foreach ($expectedAssociatedProducts as $associatedProduct) {
            $expectedAssociatedProductSkus[] = $associatedProduct->getSku();
            $actualAssociatedProductSkus[] = $actualAssociatedProducts[$i]->getSku();
            $i++;
        }

        $this->assertEquals($expectedAssociatedProductSkus, $actualAssociatedProductSkus);
    }
}
