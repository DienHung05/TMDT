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

namespace Magento\User\Controller\Adminhtml\Locks;

/**
 * Locked users page test.
 *
 * @magentoAppArea adminhtml
 */
class IndexTest extends \Magento\TestFramework\TestCase\AbstractBackendController
{
    /**
     * Test index action
     *
     * @magentoDbIsolation enabled
     * @magentoDataFixture Magento/User/_files/locked_users.php
     */
    public function testIndexAction()
    {
        $this->dispatch('backend/admin/locks/index');

        $body = $this->getResponse()->getBody();
        $this->assertStringContainsString('<h1 class="page-title">Locked Users</h1>', $body);
        $this->assertMatchesRegularExpression(
            '/<td data-column\="username"\s*class\="[^"]*col-name[^"]*col-username[^"]*"\s*>\s*adminUser1\s*<\/td>/',
            $body
        );
        $this->assertMatchesRegularExpression(
            '/<td data-column\="username"\s*class\="[^"]*col-name[^"]*col-username\s*"[^"]*>\s*adminUser2\s*<\/td>/',
            $body
        );
    }
}
