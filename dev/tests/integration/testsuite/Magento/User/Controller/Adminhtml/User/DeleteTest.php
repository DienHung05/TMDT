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
namespace Magento\User\Controller\Adminhtml\User;

/**
 * Test class for \Magento\User\Controller\Adminhtml\User\Delete
 * @magentoAppArea adminhtml
 */
class DeleteTest extends \Magento\TestFramework\TestCase\AbstractBackendController
{
    /**
     * @covers \Magento\User\Controller\Adminhtml\User\Delete::execute
     */
    public function testDeleteActionWithError()
    {
        $user = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()
            ->create(\Magento\User\Model\User::class);
        /** @var \Magento\Framework\Message\ManagerInterface $messageManager */
        $messageManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()
            ->get(\Magento\Framework\Message\ManagerInterface::class);
        $user->load(1);
<<<<<<< HEAD
        $this->getRequest()->setMethod('POST');
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $this->getRequest()->setPostValue('user_id', $user->getId() . '_suffix_ignored_in_mysql_casting_to_int');

        $this->dispatch('backend/admin/user/delete');
        $message = $messageManager->getMessages()->getLastAddedMessage()->getText();
        $this->assertEquals('You cannot delete your own account.', $message);
    }
}
