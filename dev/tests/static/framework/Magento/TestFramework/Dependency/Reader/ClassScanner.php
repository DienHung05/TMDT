<?php
/**
<<<<<<< HEAD
 * Copyright 2020 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

namespace Magento\TestFramework\Dependency\Reader;

use Magento\Setup\Module\Di\Code\Reader\FileClassScanner;

/**
 * Search classes in file by path.
 */
class ClassScanner
{
    /**
     * @var string[]
     */
    private $classNames = [];

    /**
     * Get class name by file name.
     *
     * @param string $filePath
     *
     * @return string
     */
    public function getClassName(string $filePath): string
    {
        if (!isset($this->classNames[$filePath])) {
            $this->classNames[$filePath] = $this->loadClassName($filePath);
        }

        return $this->classNames[$filePath];
    }

    /**
     * Load class name from file.
     *
     * @param string $filePath
     *
     * @return string
     */
    private function loadClassName(string $filePath): string
    {
        $scanner = new FileClassScanner($filePath);
        return $scanner->getClassName();
    }
}
