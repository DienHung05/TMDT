<?php
<<<<<<< HEAD
/**
 * Copyright 2015 Adobe
 * All Rights Reserved.
=======
/***
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
namespace Magento\AdminNotification\Controller\Adminhtml\Notification;

/**
 * Testing markAsRead controller.
 *
 * @magentoAppArea adminhtml
 */
class MarkAsReadTest extends \Magento\TestFramework\TestCase\AbstractBackendController
{
    /**
     * @inheritdoc
     */
    protected function setUp(): void
    {
        $this->resource = 'Magento_AdminNotification::mark_as_read';
        $this->uri = 'backend/admin/notification/markasread';
        parent::setUp();
    }
}
