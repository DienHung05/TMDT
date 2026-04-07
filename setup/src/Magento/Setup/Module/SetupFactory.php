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
namespace Magento\Setup\Module;

use Magento\Framework\App\ResourceConnection;
use Magento\Setup\Model\ObjectManagerProvider;

/**
 * Factory class to create Setup
 *
 * @api
 */
class SetupFactory
{
    /**
     * @var ObjectManagerProvider
     */
    private $objectManagerProvider;

    /**
     * Constructor
     *
     * @param ObjectManagerProvider $objectManagerProvider
     */
    public function __construct(ObjectManagerProvider $objectManagerProvider)
    {
        $this->objectManagerProvider = $objectManagerProvider;
    }

    /**
     * Creates setup
     *
     * @param ResourceConnection $appResource
     * @return Setup
     */
<<<<<<< HEAD
    public function create(?ResourceConnection $appResource = null)
=======
    public function create(ResourceConnection $appResource = null)
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        $objectManager = $this->objectManagerProvider->get();
        if ($appResource === null) {
            $appResource = $objectManager->get(\Magento\Framework\App\ResourceConnection::class);
        }
        return new Setup($appResource);
    }
}
