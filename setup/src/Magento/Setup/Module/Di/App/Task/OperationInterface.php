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
namespace Magento\Setup\Module\Di\App\Task;

/**
 * Interface \Magento\Setup\Module\Di\App\Task\OperationInterface
 *
 */
interface OperationInterface
{
    /**
     * Processes operation task
     *
     * @return void
     */
    public function doOperation();

    /**
     * Returns operation name
     *
     * @return string
     */
    public function getName();
}
