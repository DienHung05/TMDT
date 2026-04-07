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

namespace Magento\TestFramework\ConfigurableProduct\Block\CustomOptions;

use Magento\TestFramework\Catalog\Block\Product\View\Options\SelectGroupDataProvider as OptionsSelectGroupDataProvider;

/**
 * @inheritdoc
 */
class SelectGroupDataProvider extends OptionsSelectGroupDataProvider
{
    /**
     * @inheritdoc
     */
<<<<<<< HEAD
    public static function getData(): array
=======
    public function getData(): array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        $optionsData = parent::getData();
        unset(
            $optionsData['type_drop_down_value_percent_price'],
            $optionsData['type_radio_button_value_percent_price'],
            $optionsData['type_checkbox_value_percent_price'],
            $optionsData['type_multiselect_value_percent_price']
        );

        return $optionsData;
    }
}
