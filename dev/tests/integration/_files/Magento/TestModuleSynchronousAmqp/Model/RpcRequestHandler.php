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
namespace Magento\TestModuleSynchronousAmqp\Model;

class RpcRequestHandler
{
    /**
     * @param string $simpleDataItem
     * @return string
     */
    public function process($simpleDataItem)
    {
        return $simpleDataItem . ' processed by RPC handler';
    }
}
