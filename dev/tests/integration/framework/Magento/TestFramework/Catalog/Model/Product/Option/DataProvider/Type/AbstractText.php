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

namespace Magento\TestFramework\Catalog\Model\Product\Option\DataProvider\Type;

use Magento\TestFramework\Catalog\Model\Product\Option\DataProvider\Type\AbstractBase;

/**
 * Abstract data provider for options from text group.
 */
abstract class AbstractText extends AbstractBase
{
    /**
     * @inheritdoc
     */
<<<<<<< HEAD
    public static function getDataForCreateOptions(): array
=======
    public function getDataForCreateOptions(): array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return array_merge_recursive(
            parent::getDataForCreateOptions(),
            [
<<<<<<< HEAD
                "type_{static::getType()}_options_with_max_charters_configuration" => [
=======
                "type_{$this->getType()}_options_with_max_charters_configuration" => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    [
                        'record_id' => 0,
                        'sort_order' => 1,
                        'is_require' => 1,
                        'sku' => 'test-option-title-1',
                        'max_characters' => 30,
                        'title' => 'Test option title 1',
<<<<<<< HEAD
                        'type' => static::getType(),
=======
                        'type' => $this->getType(),
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                        'price' => 10,
                        'price_type' => 'fixed',
                    ],
                ],
<<<<<<< HEAD
                "type_{static::getType()}_options_without_max_charters_configuration" => [
=======
                "type_{$this->getType()}_options_without_max_charters_configuration" => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    [
                        'record_id' => 0,
                        'sort_order' => 1,
                        'is_require' => 1,
                        'sku' => 'test-option-title-1',
                        'title' => 'Test option title 1',
<<<<<<< HEAD
                        'type' => static::getType(),
=======
                        'type' => $this->getType(),
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                        'price' => 10,
                        'price_type' => 'fixed',
                    ],
                ],
            ]
        );
    }

    /**
     * @inheritdoc
     */
<<<<<<< HEAD
    public static function getDataForUpdateOptions(): array
=======
    public function getDataForUpdateOptions(): array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return array_merge_recursive(
            parent::getDataForUpdateOptions(),
            [
<<<<<<< HEAD
                "type_{static::getType()}_options_with_max_charters_configuration" => [
=======
                "type_{$this->getType()}_options_with_max_charters_configuration" => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    [
                        'max_characters' => 0,
                    ],
                ],
<<<<<<< HEAD
                "type_{static::getType()}_options_without_max_charters_configuration" => [
=======
                "type_{$this->getType()}_options_without_max_charters_configuration" => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    [
                        'max_characters' => 55,
                    ],
                ],
            ]
        );
    }
}
