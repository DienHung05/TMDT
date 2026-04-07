<?php
/**
<<<<<<< HEAD
 * Copyright 2019 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

namespace Magento\Catalog\Controller\Adminhtml\Category;

use Magento\Framework\App\Request\Http as HttpRequest;
use Magento\Framework\Message\MessageInterface;
use Magento\TestFramework\TestCase\AbstractBackendController;

/**
 * Test for class \Magento\Catalog\Controller\Adminhtml\Category\Delete
 *
 * @magentoAppArea adminhtml
 */
class DeleteTest extends AbstractBackendController
{
    /**
     * @return void
     */
    public function testDeleteMissingCategory(): void
    {
        $incorrectId = 825852;
        $this->getRequest()->setMethod(HttpRequest::METHOD_POST);
        $this->getRequest()->setPostValue(['id' => $incorrectId]);
        $this->dispatch('backend/catalog/category/delete');
        $this->assertSessionMessages(
<<<<<<< HEAD
            $this->equalTo([(string)__('No such entity with id = %1', $incorrectId)]),
=======
            $this->equalTo([(string)__(sprintf('No such entity with id = %s', $incorrectId))]),
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            MessageInterface::TYPE_ERROR
        );
    }

    /**
     * @magentoDbIsolation enabled
     * @magentoDataFixture Magento/Catalog/_files/category.php
     */
    public function testDeleteCategory(): void
    {
        $this->getRequest()->setMethod(HttpRequest::METHOD_POST);
        $this->getRequest()->setPostValue(['id' => 333]);
        $this->dispatch('backend/catalog/category/delete');
        $this->assertSessionMessages($this->equalTo([(string)__('You deleted the category.')]));
    }
}
