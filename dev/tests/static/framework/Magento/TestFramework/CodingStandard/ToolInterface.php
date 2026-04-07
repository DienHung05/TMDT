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
 * Code standard tool wrapper interface
 */
namespace Magento\TestFramework\CodingStandard;

interface ToolInterface
{
    /**
     * Whether the tool can be ran on the current environment
     *
     * @return bool
     */
    public function canRun();

    /**
     * Run tool for files specified
     *
     * @param array $whiteList Files/directories to be inspected
     * @return int
     */
    public function run(array $whiteList);
}
