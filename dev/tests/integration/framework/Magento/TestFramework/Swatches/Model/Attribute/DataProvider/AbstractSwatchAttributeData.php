<?php
/**
<<<<<<< HEAD
 * Copyright 2019 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

namespace Magento\TestFramework\Swatches\Model\Attribute\DataProvider;

use Magento\TestFramework\Eav\Model\Attribute\DataProvider\AbstractAttributeDataWithOptions;

/**
 * Base attribute data for swatch attributes.
 */
abstract class AbstractSwatchAttributeData extends AbstractAttributeDataWithOptions
{
    /**
     * @inheritdoc
     */
    public function __construct()
    {
        parent::__construct();
<<<<<<< HEAD
        static::$defaultAttributePostData = array_replace(
            static::$defaultAttributePostData,
=======
        $this->defaultAttributePostData = array_replace(
            $this->defaultAttributePostData,
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            [
                'update_product_preview_image' => 0,
                'use_product_image_for_swatch' => 0,
                'visual_swatch_validation' => '',
                'visual_swatch_validation_unique' => '',
                'text_swatch_validation' => '',
                'text_swatch_validation_unique' => '',
                'used_for_sort_by' => 0,
            ]
        );
<<<<<<< HEAD
        static::$defaultAttributePostData['swatch_input_type'] = 'text';
=======
        $this->defaultAttributePostData['swatch_input_type'] = 'text';
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }
}
