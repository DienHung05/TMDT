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

namespace Magento\Setup\Test\Unit\Console\Style;

use Symfony\Component\Console\Output\Output;

/**
 * Auxiliary class for MagentoStyleTest.
 */
class TestOutput extends Output
{
<<<<<<< HEAD
    /**
     * Captured output content for testing purposes
     *
     * @var string
     */
    public $output = '';

    public function clear(): void
=======
    public $output = '';

    public function clear()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        $this->output = '';
    }

    /**
     * @param string $message
     * @param bool $newline
     */
<<<<<<< HEAD
    protected function doWrite($message, $newline): void
=======
    protected function doWrite($message, $newline)
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        $this->output .= $message . ($newline ? "\n" : '');
    }
}
