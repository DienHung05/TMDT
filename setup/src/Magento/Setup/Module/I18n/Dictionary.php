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
namespace Magento\Setup\Module\I18n;

use Magento\Setup\Module\I18n\Dictionary\Phrase;

/**
 *  Dictionary
 */
class Dictionary
{
    /**
     * Phrases
     *
     * @var array
     */
    private $_phrases = [];

    /**
     * List of phrases where array key is vo key
     *
     * @var array
     */
    private $_phrasesByKey = [];

    /**
     * Add phrase to pack container
     *
     * @param Phrase $phrase
     * @return void
     */
    public function addPhrase(Phrase $phrase)
    {
        $this->_phrases[] = $phrase;
<<<<<<< HEAD
        // Normalize null keys to empty string to avoid deprecated null array offset on PHP 8.1+
        $key = (string)($phrase->getKey() ?? '');
        $this->_phrasesByKey[$key][] = $phrase;
=======
        $this->_phrasesByKey[$phrase->getKey()][] = $phrase;
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }

    /**
     * Get phrases
     *
     * @return Phrase[]
     */
    public function getPhrases()
    {
        return $this->_phrases;
    }

    /**
     * Get duplicates in container
     *
     * @return array
     */
    public function getDuplicates()
    {
        return array_values(
            array_filter(
                $this->_phrasesByKey,
                function ($phrases) {
                    return count($phrases) > 1;
                }
            )
        );
    }
}
