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

use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;
use Magento\Swatches\Model\Swatch;
use Magento\Store\Model\Store;

/**
 * Product attribute data for attribute with input type visual swatch.
 */
class VisualSwatch extends AbstractSwatchAttributeData
{
    /**
     * @inheritdoc
     */
    public function __construct()
    {
        parent::__construct();
<<<<<<< HEAD
        static::$defaultAttributePostData['swatch_input_type'] = 'visual';
=======
        $this->defaultAttributePostData['swatch_input_type'] = 'visual';
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }

    /**
     * @inheritdoc
     */
<<<<<<< HEAD
    public static function getAttributeDataWithCheckArray(): array
=======
    public function getAttributeDataWithCheckArray(): array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return array_replace_recursive(
            parent::getAttributeDataWithCheckArray(),
            [
<<<<<<< HEAD
                "{static::getFrontendInput()}_with_required_fields" => [
=======
                "{$this->getFrontendInput()}_with_required_fields" => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    1 => [
                        'frontend_input' => 'select',
                    ],
                ],
<<<<<<< HEAD
                "{static::getFrontendInput()}_with_store_view_scope" => [
=======
                "{$this->getFrontendInput()}_with_store_view_scope" => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    1 => [
                        'frontend_input' => 'select',
                    ],
                ],
<<<<<<< HEAD
                "{static::getFrontendInput()}_with_global_scope" => [
=======
                "{$this->getFrontendInput()}_with_global_scope" => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    1 => [
                        'frontend_input' => 'select',
                    ],
                ],
<<<<<<< HEAD
                "{static::getFrontendInput()}_with_website_scope" => [
=======
                "{$this->getFrontendInput()}_with_website_scope" => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    1 => [
                        'frontend_input' => 'select',
                    ],
                ],
<<<<<<< HEAD
                "{static::getFrontendInput()}_with_attribute_code" => [
=======
                "{$this->getFrontendInput()}_with_attribute_code" => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    1 => [
                        'frontend_input' => 'select',
                    ],
                ],
<<<<<<< HEAD
                "{static::getFrontendInput()}_with_unique_value" => [
=======
                "{$this->getFrontendInput()}_with_unique_value" => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    1 => [
                        'frontend_input' => 'select',
                    ],
                ],
<<<<<<< HEAD
                "{static::getFrontendInput()}_without_unique_value" => [
=======
                "{$this->getFrontendInput()}_without_unique_value" => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    1 => [
                        'frontend_input' => 'select',
                    ],
                ],
<<<<<<< HEAD
                "{static::getFrontendInput()}_with_enabled_add_to_column_options" => [
=======
                "{$this->getFrontendInput()}_with_enabled_add_to_column_options" => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    1 => [
                        'frontend_input' => 'select',
                    ],
                ],
<<<<<<< HEAD
                "{static::getFrontendInput()}_without_enabled_add_to_column_options" => [
=======
                "{$this->getFrontendInput()}_without_enabled_add_to_column_options" => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    1 => [
                        'frontend_input' => 'select',
                    ],
                ],
<<<<<<< HEAD
                "{static::getFrontendInput()}_with_enabled_use_in_filter_options" => [
=======
                "{$this->getFrontendInput()}_with_enabled_use_in_filter_options" => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    1 => [
                        'frontend_input' => 'select',
                    ],
                ],
<<<<<<< HEAD
                "{static::getFrontendInput()}_without_enabled_use_in_filter_options" => [
=======
                "{$this->getFrontendInput()}_without_enabled_use_in_filter_options" => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    1 => [
                        'frontend_input' => 'select',
                    ],
                ],
            ]
        );
    }

    /**
     * @inheritdoc
     */
<<<<<<< HEAD
    public static function getUpdateProvider(): array
    {
        $frontendInput = static::getFrontendInput();
=======
    public function getUpdateProvider(): array
    {
        $frontendInput = $this->getFrontendInput();
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        return array_replace_recursive(
            parent::getUpdateProvider(),
            [
                "{$frontendInput}_other_attribute_code" => [
<<<<<<< HEAD
                    'postData' => [
                        'attribute_code' => 'text_attribute_update',
                    ],
                    'expectedData' => [
=======
                    'post_data' => [
                        'attribute_code' => 'text_attribute_update',
                    ],
                    'expected_data' => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                        'attribute_code' => 'visual_swatch_attribute',
                    ],
                ],
                "{$frontendInput}_change_frontend_input_swatch_text" => [
<<<<<<< HEAD
                    'postData' => [
                        'frontend_input' => Swatch::SWATCH_TYPE_TEXTUAL_ATTRIBUTE_FRONTEND_INPUT,
                        'update_product_preview_image' => '1',
                    ],
                    'expectedData' => [
=======
                    'post_data' => [
                        'frontend_input' => Swatch::SWATCH_TYPE_TEXTUAL_ATTRIBUTE_FRONTEND_INPUT,
                        'update_product_preview_image' => '1',
                    ],
                    'expected_data' => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                        'frontend_input' => 'select',
                        'swatch_input_type' => Swatch::SWATCH_INPUT_TYPE_TEXT,
                        'update_product_preview_image' => '1',
                        'use_product_image_for_swatch' => 0,
                    ],
                ],
                "{$frontendInput}_change_frontend_input_dropdown" => [
<<<<<<< HEAD
                    'postData' => [
                        'frontend_input' => 'select',
                    ],
                    'expectedData' => [
=======
                    'post_data' => [
                        'frontend_input' => 'select',
                    ],
                    'expected_data' => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                        'frontend_input' => 'select',
                        'swatch_input_type' => null,
                        'update_product_preview_image' => null,
                        'use_product_image_for_swatch' => null,
                    ],
                ],
            ]
        );
    }

    /**
     * @inheritdoc
     */
<<<<<<< HEAD
    public static function getUpdateOptionsProvider(): array
    {
        $frontendInput = static::getFrontendInput();
=======
    public function getUpdateOptionsProvider(): array
    {
        $frontendInput = $this->getFrontendInput();
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        return array_replace_recursive(
            parent::getUpdateOptionsProvider(),
            [
                "{$frontendInput}_update_options" => [
<<<<<<< HEAD
                    'postData' => [
=======
                    'post_data' => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                        'options_array' => [
                            'option_1' => [
                                'order' => '4',
                                'swatch' => [
                                    Store::DEFAULT_STORE_ID => '#1a1a1a',
                                ],
                            ],
                            'option_2' => [
                                'order' => '5',
                                'swatch' => [
                                    Store::DEFAULT_STORE_ID => '#2b2b2b',
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        );
    }

    /**
     * @inheritdoc
     */
<<<<<<< HEAD
    protected static function getOptionsDataArr(): array
=======
    protected function getOptionsDataArr(): array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            [
                'optionvisual' => [
                    'order' => [
                        'option_0' => '1',
                    ],
                    'value' => [
                        'option_0' => [
                            0 => 'Admin black test 1',
                            1 => 'Default store view black test 1',
                        ],
                    ],
                    'delete' => [
                        'option_0' => '',
                    ]
                ],
                'swatchvisual' => [
                    'value' => [
                        'option_0' => '#000000',
                    ]
                ]
            ],
            [
                'optionvisual' => [
                    'order' => [
                        'option_1' => '2',
                    ],
                    'value' => [
                        'option_1' => [
                            0 => 'Admin white test 2',
                            1 => 'Default store view white test 2',
                        ],
                    ],
                    'delete' => [
                        'option_1' => '',
                    ],
                ],
                'swatchvisual' => [
                    'value' => [
                        'option_1' => '#ffffff',
                    ],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
<<<<<<< HEAD
    protected static function getFrontendInput(): string
=======
    protected function getFrontendInput(): string
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return Swatch::SWATCH_TYPE_VISUAL_ATTRIBUTE_FRONTEND_INPUT;
    }

    /**
     * @inheritdoc
     */
<<<<<<< HEAD
    protected static function getUpdatePostData(): array
=======
    protected function getUpdatePostData(): array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            'frontend_label' => [
                Store::DEFAULT_STORE_ID => 'Visual swatch attribute Update',
            ],
            'frontend_input' => Swatch::SWATCH_TYPE_VISUAL_ATTRIBUTE_FRONTEND_INPUT,
            'is_required' => '1',
            'update_product_preview_image' => '1',
            'use_product_image_for_swatch' => '1',
            'is_global' => ScopedAttributeInterface::SCOPE_WEBSITE,
            'is_unique' => '1',
            'is_used_in_grid' => '1',
            'is_visible_in_grid' => '1',
            'is_filterable_in_grid' => '1',
            'is_searchable' => '1',
            'search_weight' => '2',
            'is_visible_in_advanced_search' => '1',
            'is_comparable' => '1',
            'is_filterable' => '2',
            'is_filterable_in_search' => '1',
            'position' => '2',
            'is_used_for_promo_rules' => '1',
            'is_visible_on_front' => '1',
            'used_in_product_listing' => '0',
            'used_for_sort_by' => '1',
        ];
    }

    /**
     * @inheritdoc
     */
<<<<<<< HEAD
    protected static function getUpdateExpectedData(): array
    {
        $updatePostData = static::getUpdatePostData();
=======
    protected function getUpdateExpectedData(): array
    {
        $updatePostData = $this->getUpdatePostData();
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        return array_merge(
            $updatePostData,
            [
                'frontend_label' => 'Visual swatch attribute Update',
                'frontend_input' => 'select',
                'attribute_code' => 'visual_swatch_attribute',
                'default_value' => null,
                'frontend_class' => null,
                'is_html_allowed_on_front' => '1',
                'is_user_defined' => '1',
                'backend_type' => 'int',
            ]
        );
    }
}
