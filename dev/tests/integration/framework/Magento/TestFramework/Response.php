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

/**
 * HTTP response implementation that is used instead core one for testing
 */
namespace Magento\TestFramework;

/**
 * @SuppressWarnings(PHPMD.LongVariable)
 */
class Response extends \Magento\Framework\App\Response\Http
{
    public function sendResponse()
    {
    }
}
