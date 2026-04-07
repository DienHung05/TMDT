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
namespace Magento\Setup\Model\Description;

/**
 * Generate random paragraph for description based on configuration
 */
class DescriptionParagraphGenerator
{
    /**
     * @var \Magento\Setup\Model\Description\DescriptionSentenceGenerator
     */
    private $sentenceGenerator;

    /**
     * @var array
     */
    private $paragraphConfig;

    /**
     * @param \Magento\Setup\Model\Description\DescriptionSentenceGenerator $sentenceGenerator
     * @param array $paragraphConfig
     */
    public function __construct(
        \Magento\Setup\Model\Description\DescriptionSentenceGenerator $sentenceGenerator,
        array $paragraphConfig
    ) {
        $this->sentenceGenerator = $sentenceGenerator;
        $this->paragraphConfig = $paragraphConfig;
    }

    /**
     * Generate paragraph for description
     *
     * @return string
     */
    public function generate()
    {
        // mt_rand() here is not for cryptographic use.
        // phpcs:ignore Magento2.Security.InsecureFunction
        $sentencesCount = mt_rand(
            $this->paragraphConfig['sentences']['count-min'],
            $this->paragraphConfig['sentences']['count-max']
        );
        $sentences = '';

        while ($sentencesCount) {
            $sentences .= $this->sentenceGenerator->generate();
            $sentences .= ' ';
            $sentencesCount--;
        }

        $sentences = rtrim($sentences);

        return $sentences;
    }
}
