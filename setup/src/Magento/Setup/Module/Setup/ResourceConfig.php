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
namespace Magento\Setup\Module\Setup;

/**
 * Simplified resource config for Setup tools
 */
class ResourceConfig implements \Magento\Framework\App\ResourceConnection\ConfigInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConnectionName($resourceName)
    {
        return \Magento\Framework\App\ResourceConnection::DEFAULT_CONNECTION;
    }
}
