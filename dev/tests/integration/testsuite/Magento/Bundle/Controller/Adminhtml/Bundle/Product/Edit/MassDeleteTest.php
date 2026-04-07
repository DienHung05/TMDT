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

namespace Magento\Bundle\Controller\Adminhtml\Bundle\Product\Edit;

use Magento\Catalog\Controller\Adminhtml\Product\MassDeleteTest as CatalogMassDeleteTest;

/**
 * Test for mass bundle product deleting.
 *
 * @see \Magento\Bundle\Controller\Adminhtml\Bundle\Product\Edit\MassDelete
 * @magentoAppArea adminhtml
 * @magentoDbIsolation enabled
 */
class MassDeleteTest extends CatalogMassDeleteTest
{
    /**
     * @magentoDataFixture Magento/Bundle/_files/bundle_product_checkbox_required_option.php
     *
     * @return void
     */
    public function testDeleteBundleProductViaMassAction(): void
    {
        $product = $this->productRepository->get('bundle-product-checkbox-required-option');
        $this->dispatchMassDeleteAction([$product->getId()]);
        $this->assertSuccessfulDeleteProducts(1);
    }
}
