<?php
/**
<<<<<<< HEAD
 * Copyright 2015 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
namespace Magento\CurrencySymbol\Controller\Adminhtml\System\Currencysymbol;

class IndexTest extends \Magento\TestFramework\TestCase\AbstractBackendController
{
    /**
     * Test index action
     *
     * @magentoConfigFixture               currency/options/allow USD
     * @magentoAppIsolation enabled
     * @magentoDbIsolation enabled
     */
    public function testIndexAction()
    {
        $this->dispatch('backend/admin/system_currencysymbol/index');

        $body = $this->getResponse()->getBody();
        $this->assertStringContainsString('id="currency-symbols-form"', $body);
        $this->assertStringContainsString('<input id="custom_currency_symbolUSD"', $body);
        $this->assertStringContainsString('save primary save-currency-symbols', $body);
    }
}
