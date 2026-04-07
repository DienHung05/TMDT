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
 * Return random words from source
 */
class RandomWordSelector
{
    /**
     * Return $count random words from $source
     *
     * @param string $source
     * @param int $count
     * @return array
     */
    public function getRandomWords($source, $count)
    {
        $words = str_word_count($source, 1);
        if (empty($words)) {
            return [];
        }

        $randWords = [];
        $wordsSize = count($words);
        while ($count) {
            // mt_rand() here is not for cryptographic use.
            // phpcs:ignore Magento2.Security.InsecureFunction
            $randWords[] = $words[mt_rand(0, $wordsSize - 1)];
            $count--;
        }

        return $randWords;
    }
}
