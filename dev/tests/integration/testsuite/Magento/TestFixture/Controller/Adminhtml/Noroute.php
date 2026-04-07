<?php
/**
<<<<<<< HEAD
 * Copyright 2014 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
namespace Magento\TestFixture\Controller\Adminhtml;

use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\ResponseInterface;

/**
 * Mock index controller class
 */
class Noroute implements \Magento\Framework\App\ActionInterface
{
    /**
     * Dispatch request
     *
     * @return ResponseInterface
     * @throws \Magento\Framework\Exception\NotFoundException
     */
    public function execute()
    {
    }

    /**
     * Get Response object
     *
     * @return ResponseInterface
     */
    public function getResponse()
    {
    }
}
