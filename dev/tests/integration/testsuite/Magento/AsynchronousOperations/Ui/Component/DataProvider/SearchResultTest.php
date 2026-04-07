<?php
/**
<<<<<<< HEAD
 * Copyright 2018 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
namespace Magento\AsynchronousOperations\Ui\Component\DataProvider;

use Magento\TestFramework\Helper\Bootstrap;

<<<<<<< HEAD
=======
/**
 * Class SearchResultTest
 */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
class SearchResultTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @magentoDataFixture Magento/AsynchronousOperations/_files/bulk.php
     * @magentoDbIsolation enabled
     * @magentoAppArea adminhtml
     */
    public function testGetAllIds()
    {
        $objectManager = Bootstrap::getObjectManager();
        $user = $objectManager->create(\Magento\User\Model\User::class);
        $user->loadByUsername(\Magento\TestFramework\Bootstrap::ADMIN_NAME);
        $session = $objectManager->get(\Magento\Backend\Model\Auth\Session::class);
        $session->setUser($user);

        /** @var \Magento\AsynchronousOperations\Ui\Component\DataProvider\SearchResult $searchResult */
        $searchResult = $objectManager->create(
            \Magento\AsynchronousOperations\Ui\Component\DataProvider\SearchResult::class
        );
<<<<<<< HEAD
        $this->assertEquals(6, $searchResult->getTotalCount());
=======
        $this->assertEquals(5, $searchResult->getTotalCount());
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }
}
