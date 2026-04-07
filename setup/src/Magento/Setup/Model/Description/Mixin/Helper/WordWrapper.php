<?php
/**
<<<<<<< HEAD
 * Copyright 2017 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
namespace Magento\Setup\Model\Description\Mixin\Helper;

/**
 * Apply specific format to words from source
 */
class WordWrapper
{
    /**
     * Wrap $words with $format in $source
     *
     * @param string $source
     * @param array $words
     * @param string $format
     * @return string
     */
    public function wrapWords($source, array $words, $format)
    {
        return empty($words)
            ? $source
            : preg_replace("/\\b(" . implode('|', $words) . ")\\b/", sprintf($format, '$1'), $source);
    }
}
