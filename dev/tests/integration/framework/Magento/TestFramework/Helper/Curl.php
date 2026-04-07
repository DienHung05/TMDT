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

declare(strict_types=1);

namespace Magento\TestFramework\Helper;

use Magento\Framework\HTTP\Client\Curl as CurlLibrary;

class Curl extends CurlLibrary
{
    /**
     * Make DELETE request
     *
     * String type was added to parameter $param in order to support sending JSON or XML requests.
     * This feature was added base on Community Pull Request https://github.com/magento/magento2/pull/8373
     *
     * @param string $uri
     * @return void
     *
     * @see \Magento\Framework\HTTP\Client#post($uri, $params)
     */
    public function delete($uri)
    {
        $this->makeRequest("DELETE", $uri);
    }
}
