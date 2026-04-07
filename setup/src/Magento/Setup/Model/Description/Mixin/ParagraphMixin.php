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
namespace Magento\Setup\Model\Description\Mixin;

/**
 * Add paragraph html tag to description
 */
class ParagraphMixin implements DescriptionMixinInterface
{
    /**
     * Wrap each new line with <p></p> tags
     *
     * @param string $text
     * @return string
     */
    public function apply($text)
    {
        return '<p>'
            . implode(
                '</p>' . PHP_EOL . '<p>',
                explode(PHP_EOL, trim($text))
            )
            . '</p>';
    }
}
