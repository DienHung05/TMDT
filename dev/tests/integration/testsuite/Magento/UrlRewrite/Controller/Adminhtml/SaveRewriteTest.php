<?php
/**
<<<<<<< HEAD
 * Copyright 2021 Adobe
 * All Rights Reserved.
 */
declare(strict_types=1);

namespace Magento\UrlRewrite\Controller\Adminhtml;

use Magento\Framework\App\Request\Http as HttpRequest;
use Magento\Framework\Message\MessageInterface;
use Magento\TestFramework\TestCase\AbstractBackendController;
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\UrlRewrite\Controller\Adminhtml;

use Magento\Framework\App\Request\Http as HttpRequest;
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * @magentoAppArea adminhtml
 */
<<<<<<< HEAD
class SaveRewriteTest extends AbstractBackendController
=======
class SaveRewriteTest extends \Magento\TestFramework\TestCase\AbstractBackendController
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
{
    /**
     * Test create url rewrite with invalid target path
     *
     * @return void
     */
    public function testSaveRewriteWithInvalidRequestPath() : void
    {
        $requestPath = 'admin';
        $reservedWords = 'admin, soap, rest, graphql, standard';
        $this->getRequest()->setMethod(HttpRequest::METHOD_POST);
        $this->getRequest()->setPostValue(
            [
                'description' => 'Some URL rewrite description',
                'options' => 'R',
                'request_path' => 'admin',
                'target_path' => "target_path",
                'store_id' => 1,
            ]
        );
        $this->dispatch('backend/admin/url_rewrite/save');

        $this->assertSessionMessages(
<<<<<<< HEAD
            $this->containsEqual(__(
                'URL key "%1" matches a reserved endpoint name (%2). Use another URL key.',
                $requestPath,
                $reservedWords
            )),
            MessageInterface::TYPE_ERROR
=======
            $this->containsEqual(__(sprintf(
                'URL key "%s" matches a reserved endpoint name (%s). Use another URL key.',
                $requestPath,
                $reservedWords
            ))),
            \Magento\Framework\Message\MessageInterface::TYPE_ERROR
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        );
    }
}
