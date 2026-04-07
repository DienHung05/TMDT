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
namespace Magento\TestModule1\Controller\CookieTester;

use \Magento\Framework\App\RequestInterface;

/**
 * Controller to test deletion of a cookie
 */
class DeleteCookie extends \Magento\TestModule1\Controller\CookieTester
{
    /**
     *
     * @return \Magento\Framework\App\ResponseInterface
     */
    public function execute()
    {
        $cookieName = $this->request->getParam('cookie_name');
        $this->getCookieManager()->deleteCookie($cookieName);
        return $this->_response;
    }
}
