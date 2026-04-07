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

namespace Magento\Customer\Block\Adminhtml\Edit\Tab\View\Grid\Renderer;

/**
 * Class checks item block rendering with simple product and simple product with options.
 *
 * @see \Magento\Customer\Block\Adminhtml\Edit\Tab\View\Grid\Renderer\Item
 */
<<<<<<< HEAD
class ItemTest extends AbstractItemTestCase
=======
class ItemTest extends AbstractItemTest
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
{
    /**
     * @magentoDataFixture Magento/Checkout/_files/customer_quote_with_items_simple_product_options.php
     * @return void
     */
    public function testRenderProductOptions(): void
    {
        $this->processRender();
    }

    /**
     * @magentoDataFixture Magento/Checkout/_files/quote_with_address_saved.php
     * @return void
     */
    public function testRenderSimpleProduct(): void
    {
        $this->processRender();
    }
}
