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

/**
 * Base custom options data provider.
 */
abstract class AbstractBase
{
    /**
     * Return data for create options for all cases.
     *
     * @return array
     */
<<<<<<< HEAD
    public static function getDataForCreateOptions(): array
    {
        return [
            "type_{static::getType()}_title" => [
=======
    public function getDataForCreateOptions(): array
    {
        return [
            "type_{$this->getType()}_title" => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                [
                    'record_id' => 0,
                    'sort_order' => 1,
                    'is_require' => 1,
                    'sku' => 'test-option-title-1',
                    'max_characters' => 50,
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
            "type_{static::getType()}_required_options" => [
=======
            "type_{$this->getType()}_required_options" => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                [
                    'record_id' => 0,
                    'sort_order' => 1,
                    'is_require' => 1,
                    'sku' => 'test-option-title-1',
                    'max_characters' => 50,
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
            "type_{static::getType()}_not_required_options" => [
=======
            "type_{$this->getType()}_not_required_options" => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                [
                    'record_id' => 0,
                    'sort_order' => 1,
                    'is_require' => 0,
                    'sku' => 'test-option-title-1',
                    'max_characters' => 50,
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
            "type_{static::getType()}_options_with_fixed_price" => [
=======
            "type_{$this->getType()}_options_with_fixed_price" => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                [
                    'record_id' => 0,
                    'sort_order' => 1,
                    'is_require' => 1,
                    'sku' => 'test-option-title-1',
                    'max_characters' => 50,
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
            "type_{static::getType()}_options_with_percent_price" => [
=======
            "type_{$this->getType()}_options_with_percent_price" => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                [
                    'record_id' => 0,
                    'sort_order' => 1,
                    'is_require' => 1,
                    'sku' => 'test-option-title-1',
                    'max_characters' => 50,
                    'title' => 'Test option title 1',
<<<<<<< HEAD
                    'type' => static::getType(),
=======
                    'type' => $this->getType(),
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    'price' => 10,
                    'price_type' => 'percent',
                ],
            ],
<<<<<<< HEAD
            "type_{static::getType()}_price" => [
=======
            "type_{$this->getType()}_price" => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                [
                    'record_id' => 0,
                    'sort_order' => 1,
                    'is_require' => 1,
                    'sku' => 'test-option-title-1',
                    'max_characters' => 50,
                    'title' => 'Test option title 1',
<<<<<<< HEAD
                    'type' => static::getType(),
=======
                    'type' => $this->getType(),
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    'price' => 22,
                    'price_type' => 'percent',
                ],
            ],
<<<<<<< HEAD
            "type_{static::getType()}_sku" => [
=======
            "type_{$this->getType()}_sku" => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                [
                    'record_id' => 0,
                    'sort_order' => 1,
                    'is_require' => 1,
                    'sku' => 'test-option-title-1',
                    'max_characters' => 50,
                    'title' => 'Test option title 1',
<<<<<<< HEAD
                    'type' => static::getType(),
=======
                    'type' => $this->getType(),
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    'price' => 22,
                    'price_type' => 'percent',
                ],
            ],
        ];
    }

    /**
     * Return data for create options for all cases.
     *
     * @return array
     */
<<<<<<< HEAD
    public static function getDataForUpdateOptions(): array
    {
        return array_merge_recursive(
            static::getDataForCreateOptions(),
            [
                "type_{static::getType()}_title" => [
=======
    public function getDataForUpdateOptions(): array
    {
        return array_merge_recursive(
            $this->getDataForCreateOptions(),
            [
                "type_{$this->getType()}_title" => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    [
                        'title' => 'Test updated option title',
                    ]
                ],
<<<<<<< HEAD
                "type_{static::getType()}_required_options" => [
=======
                "type_{$this->getType()}_required_options" => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    [
                        'is_require' => 0,
                    ],
                ],
<<<<<<< HEAD
                "type_{static::getType()}_not_required_options" => [
=======
                "type_{$this->getType()}_not_required_options" => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    [
                        'is_require' => 1,
                    ],
                ],
<<<<<<< HEAD
                "type_{static::getType()}_options_with_fixed_price" => [
=======
                "type_{$this->getType()}_options_with_fixed_price" => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    [
                        'price_type' => 'percent',
                    ],
                ],
<<<<<<< HEAD
                "type_{static::getType()}_options_with_percent_price" => [
=======
                "type_{$this->getType()}_options_with_percent_price" => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    [
                        'price_type' => 'fixed',
                    ],
                ],
<<<<<<< HEAD
                "type_{static::getType()}_price" => [
=======
                "type_{$this->getType()}_price" => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    [
                        'price' => 60,
                    ],
                ],
<<<<<<< HEAD
                "type_{static::getType()}_sku" => [
=======
                "type_{$this->getType()}_sku" => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    [
                        'sku' => 'Updated option sku',
                    ],
                ],
            ]
        );
    }

    /**
     * Return option type.
     *
     * @return string
     */
<<<<<<< HEAD
    abstract protected static function getType(): string;
=======
    abstract protected function getType(): string;
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
}
