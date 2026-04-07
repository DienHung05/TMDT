<?php
/**
<<<<<<< HEAD
 * Copyright 2016 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
namespace Magento\TestFramework\Utility\File;

/**
 * Factory for \RegexIterator
 */
class RegexIteratorFactory
{
    /**
     * Create instance of \RegexIterator
     *
     * @param string $directoryPath
     * @param string $regexp
     * @return \RegexIterator
     */
    public function create($directoryPath, $regexp)
    {
        $directory = new \RecursiveDirectoryIterator($directoryPath);
        $recursiveIterator = new \RecursiveIteratorIterator($directory);
        return new \RegexIterator($recursiveIterator, $regexp, \RegexIterator::GET_MATCH);
    }
}
