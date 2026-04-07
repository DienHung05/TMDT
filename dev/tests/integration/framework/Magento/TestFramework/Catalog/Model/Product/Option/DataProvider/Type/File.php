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

use Magento\Catalog\Api\Data\ProductCustomOptionInterface;
use Magento\TestFramework\Catalog\Model\Product\Option\DataProvider\Type\AbstractBase;

/**
 * Data provider for options from file group with type "file".
 */
class File extends AbstractBase
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
                "type_{static::getType()}_option_file_extension" => [
=======
                "type_{$this->getType()}_option_file_extension" => [
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
                        'file_extension' => 'gif',
                        'image_size_x' => 10,
                        'image_size_y' => 20,
                    ],
                ],
<<<<<<< HEAD
                "type_{static::getType()}_option_maximum_file_size" => [
=======
                "type_{$this->getType()}_option_maximum_file_size" => [
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
                        'file_extension' => 'gif',
                        'image_size_x' => 10,
                        'image_size_y' => 20,
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
                "type_{static::getType()}_option_file_extension" => [
=======
                "type_{$this->getType()}_option_file_extension" => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    [
                        'file_extension' => 'jpg',
                    ],
                ],
<<<<<<< HEAD
                "type_{static::getType()}_option_maximum_file_size" => [
=======
                "type_{$this->getType()}_option_maximum_file_size" => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    [
                        'image_size_x' => 300,
                        'image_size_y' => 815,
                    ],
                ],
            ]
        );
    }

    /**
     * @inheritdoc
     */
<<<<<<< HEAD
    protected static function getType(): string
=======
    protected function getType(): string
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return ProductCustomOptionInterface::OPTION_TYPE_FILE;
    }
}
