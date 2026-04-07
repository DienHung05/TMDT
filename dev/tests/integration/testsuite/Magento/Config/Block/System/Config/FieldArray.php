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
namespace Magento\Config\Block\System\Config;

use Magento\Config\Block\System\Config\Form\Field\FieldArray\AbstractFieldArray;

/**
 * Backend system config array field renderer for integration test.
 */
class FieldArray extends AbstractFieldArray
{
    /**
     * @inheritdoc
     */
    protected function _toHtml()
    {
        $value = '';
        $element = $this->getElement();
        if ($element->getValue() && is_array($element->getValue())) {
            $value = implode('|', $element->getValue());
        }

        return sprintf(
            '<input id="%s" name="%s" value="%s" />',
            $element->getId(),
            $element->getName(),
            $value
        );
    }
}
