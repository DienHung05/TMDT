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

use Magento\TestFramework\Helper\Bootstrap;

/**
 * @magentoAppArea adminhtml
 */
class GridTest extends \Magento\TestFramework\TestCase\AbstractBackendController
{
    protected function setUp(): void
    {
        $this->resource = 'Magento_Paypal::billing_agreement_actions_view';
        $this->uri = 'backend/paypal/billing_agreement/grid';
        parent::setUp();
    }

    /**
     * @magentoDataFixture Magento/Customer/_files/customer.php
     * @magentoDataFixture Magento/Paypal/_files/billing_agreement.php
     */
    public function testAclHasAccess()
    {
        /** @var $session \Magento\Backend\Model\Session */
        Bootstrap::getObjectManager()->create(\Magento\Backend\Model\Session::class);

        parent::testAclHasAccess();

        $response = $this->getResponse();

        $this->assertEquals(
            1,
            \Magento\TestFramework\Helper\Xpath::getElementsCountForXpath(
                '//button[@type="button" and @title="Reset Filter"]',
                $response->getBody()
            ),
            "Response for billing agreement grid doesn't contain 'Reset Filter' button"
        );

        $this->assertEquals(
            1,
            \Magento\TestFramework\Helper\Xpath::getElementsCountForXpath(
                '//*[@id="billing_agreements"]',
                $response->getBody()
            ),
            "Response for billing agreement grid doesn't contain grid"
        );
    }
}
