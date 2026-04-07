<?php
/**
<<<<<<< HEAD
 * Copyright 2013 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
namespace Magento\Paypal\Adminhtml\Paypal;

/**
 * @magentoAppArea adminhtml
 */
class ReportsTest extends \Magento\TestFramework\TestCase\AbstractBackendController
{
    /**
     * @magentoConfigFixture current_store paypal/fetch_reports/active 1
     * @magentoConfigFixture current_store paypal/fetch_reports/ftp_ip 127.0.0.1
     * @magentoConfigFixture current_store paypal/fetch_reports/ftp_path /tmp
     * @magentoConfigFixture current_store paypal/fetch_reports/ftp_login login
     * @magentoConfigFixture current_store paypal/fetch_reports/ftp_password password
     * @magentoConfigFixture current_store paypal/fetch_reports/ftp_sandbox 0
     * @magentoDbIsolation enabled
     */
    public function testFetchAction()
    {
        $this->dispatch('backend/paypal/paypal_reports/fetch');
        $this->assertSessionMessages(
            $this->equalTo(['We can&#039;t fetch reports from &quot;login@127.0.0.1.&quot;']),
            \Magento\Framework\Message\MessageInterface::TYPE_ERROR
        );
    }
}
