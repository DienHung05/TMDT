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

namespace Magento\TestFramework\CodingStandard\Tool;

interface ExtensionInterface
{
    /**
     * Set extensions for tool to run
     * Example: 'php', 'xml', 'phtml', 'css'
     *
     * @param array $extensions
     * @return void
     */
    public function setExtensions(array $extensions);
}
