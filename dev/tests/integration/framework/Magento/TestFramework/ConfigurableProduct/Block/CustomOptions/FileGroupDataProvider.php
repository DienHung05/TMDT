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

use Magento\TestFramework\Catalog\Block\Product\View\Options\FileGroupDataProvider as OptionsFileGroupDataProvider;

/**
 * @inheritdoc
 */
class FileGroupDataProvider extends OptionsFileGroupDataProvider
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
        unset($optionsData['type_file_percent_price']);

        return $optionsData;
    }
}
