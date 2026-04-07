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
namespace Magento\Paypal\Controller\Adminhtml\Billing\Agreement;

/**
 * @magentoAppArea adminhtml
 */
class CancelTest extends \Magento\TestFramework\TestCase\AbstractBackendController
{
    protected function setUp(): void
    {
        $this->resource = 'Magento_Paypal::actions_manage';
        $this->uri = 'backend/paypal/billing_agreement/cancel';
        parent::setUp();
    }
}
