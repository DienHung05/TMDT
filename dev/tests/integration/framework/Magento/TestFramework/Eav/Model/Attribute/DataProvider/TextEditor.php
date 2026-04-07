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

namespace Magento\TestFramework\Eav\Model\Attribute\DataProvider;

use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;
use Magento\Store\Model\Store;

/**
 * Product attribute data for attribute with text editor input type.
 */
class TextEditor extends AbstractBaseAttributeData
{
    /**
     * @inheritdoc
     */
    public function __construct()
    {
        parent::__construct();
<<<<<<< HEAD
        static::$defaultAttributePostData['used_for_sort_by'] = '0';
=======
        $this->defaultAttributePostData['used_for_sort_by'] = '0';
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }

    /**
     * @inheritdoc
     */
<<<<<<< HEAD
    public static function getAttributeData(): array
=======
    public function getAttributeData(): array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return array_replace_recursive(
            parent::getAttributeData(),
            [
<<<<<<< HEAD
                "{static::getFrontendInput()}_with_default_value" => [
=======
                "{$this->getFrontendInput()}_with_default_value" => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    [
                        'default_value_text' => '',
                        'default_value_textarea' => 'Default attribute value',
                    ],
                ],
            ]
        );
    }

    /**
     * @inheritDoc
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
                        'frontend_input' => 'textarea',
                    ],
                ],
<<<<<<< HEAD
                "{static::getFrontendInput()}_with_store_view_scope" => [
=======
                "{$this->getFrontendInput()}_with_store_view_scope" => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    1 => [
                        'frontend_input' => 'textarea'
                    ],
                ],
<<<<<<< HEAD
                "{static::getFrontendInput()}_with_global_scope" => [
=======
                "{$this->getFrontendInput()}_with_global_scope" => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    1 => [
                        'frontend_input' => 'textarea'
                    ],
                ],
<<<<<<< HEAD
                "{static::getFrontendInput()}_with_website_scope" => [
=======
                "{$this->getFrontendInput()}_with_website_scope" => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    1 => [
                        'frontend_input' => 'textarea'
                    ],
                ],
<<<<<<< HEAD
                "{static::getFrontendInput()}_with_attribute_code" => [
=======
                "{$this->getFrontendInput()}_with_attribute_code" => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    1 => [
                        'frontend_input' => 'textarea'
                    ],
                ],
<<<<<<< HEAD
                "{static::getFrontendInput()}_with_default_value" => [
=======
                "{$this->getFrontendInput()}_with_default_value" => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    1 => [
                        'frontend_input' => 'textarea'
                    ],
                ],
<<<<<<< HEAD
                "{static::getFrontendInput()}_without_default_value" => [
=======
                "{$this->getFrontendInput()}_without_default_value" => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    1 => [
                        'frontend_input' => 'textarea'
                    ],
                ],
<<<<<<< HEAD
                "{static::getFrontendInput()}_with_unique_value" => [
=======
                "{$this->getFrontendInput()}_with_unique_value" => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    1 => [
                        'frontend_input' => 'textarea'
                    ],
                ],
<<<<<<< HEAD
                "{static::getFrontendInput()}_without_unique_value" => [
=======
                "{$this->getFrontendInput()}_without_unique_value" => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    1 => [
                        'frontend_input' => 'textarea'
                    ],
                ],
<<<<<<< HEAD
                "{static::getFrontendInput()}_with_enabled_add_to_column_options" => [
=======
                "{$this->getFrontendInput()}_with_enabled_add_to_column_options" => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    1 => [
                        'frontend_input' => 'textarea'
                    ],
                ],
<<<<<<< HEAD
                "{static::getFrontendInput()}_without_enabled_add_to_column_options" => [
=======
                "{$this->getFrontendInput()}_without_enabled_add_to_column_options" => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    1 => [
                        'frontend_input' => 'textarea'
                    ],
                ],
<<<<<<< HEAD
                "{static::getFrontendInput()}_with_enabled_use_in_filter_options" => [
=======
                "{$this->getFrontendInput()}_with_enabled_use_in_filter_options" => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    1 => [
                        'frontend_input' => 'textarea'
                    ],
                ],
<<<<<<< HEAD
                "{static::getFrontendInput()}_without_enabled_use_in_filter_options" => [
=======
                "{$this->getFrontendInput()}_without_enabled_use_in_filter_options" => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    1 => [
                        'frontend_input' => 'textarea'
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
                        'attribute_code' => 'text_editor_attribute',
                    ],
                ],
                "{$frontendInput}_change_frontend_input" => [
<<<<<<< HEAD
                    'postData' => [
                        'frontend_input' => 'textarea',
                    ],
                    'expectedData' => [
=======
                    'post_data' => [
                        'frontend_input' => 'textarea',
                    ],
                    'expected_data' => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                        'frontend_input' => 'textarea',
                        'is_wysiwyg_enabled' => '0'
                    ],
                ],
            ]
        );
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
        return 'texteditor';
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
                Store::DEFAULT_STORE_ID => 'Text Editor Attribute Update',
            ],
            'frontend_input' => 'texteditor',
            'is_required' => '1',
            'is_global' => ScopedAttributeInterface::SCOPE_WEBSITE,
            'default_value_textarea' => 'Text Editor Attribute Default',
            'is_unique' => '1',
            'is_used_in_grid' => '1',
            'is_visible_in_grid' => '1',
            'is_filterable_in_grid' => '1',
            'is_searchable' => '1',
            'search_weight' => '2',
            'is_visible_in_advanced_search' => '1',
            'is_comparable' => '1',
            'is_used_for_promo_rules' => '1',
            'is_html_allowed_on_front' => '1',
            'is_visible_on_front' => '1',
            'used_in_product_listing' => '1',
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
        unset($updatePostData['default_value_textarea']);
        return array_merge(
            $updatePostData,
            [
                'frontend_label' => 'Text Editor Attribute Update',
                'frontend_input' => 'textarea',
                'attribute_code' => 'text_editor_attribute',
                'default_value' => 'Text Editor Attribute Default',
                'frontend_class' => null,
                'is_filterable' => '0',
                'is_filterable_in_search' => '0',
                'position' => '0',
                'is_user_defined' => '1',
                'backend_type' => 'text',
                'is_wysiwyg_enabled' => '1',
            ]
        );
    }
}
