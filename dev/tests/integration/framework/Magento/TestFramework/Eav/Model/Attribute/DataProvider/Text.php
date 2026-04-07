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
 * Product attribute data for attribute with input type text.
 */
class Text extends AbstractBaseAttributeData
{
    /**
     * @inheritdoc
     */
    public function __construct()
    {
        parent::__construct();
<<<<<<< HEAD
        static::$defaultAttributePostData['frontend_class'] = '';
        static::$defaultAttributePostData['used_for_sort_by'] = '0';
=======
        $this->defaultAttributePostData['frontend_class'] = '';
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
                "{static::getFrontendInput()}_with_input_validation" => [
                    array_merge(static::$defaultAttributePostData, ['frontend_class' => 'validate-alpha']),
                ],
                "{static::getFrontendInput()}_without_input_validation" => [
                    static::$defaultAttributePostData,
=======
                "{$this->getFrontendInput()}_with_input_validation" => [
                    array_merge($this->defaultAttributePostData, ['frontend_class' => 'validate-alpha']),
                ],
                "{$this->getFrontendInput()}_without_input_validation" => [
                    $this->defaultAttributePostData,
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                ],
            ]
        );
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
        return array_merge_recursive(
            parent::getAttributeDataWithCheckArray(),
            [
<<<<<<< HEAD
                "{static::getFrontendInput()}_with_input_validation" => [
=======
                "{$this->getFrontendInput()}_with_input_validation" => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    [
                        'attribute_code' => 'test_attribute_name',
                        'frontend_class' => 'validate-alpha',
                    ],
                ],
<<<<<<< HEAD
                "{static::getFrontendInput()}_without_input_validation" => [
=======
                "{$this->getFrontendInput()}_without_input_validation" => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    [
                        'attribute_code' => 'test_attribute_name',
                        'frontend_class' => '',
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
                        'attribute_code' => 'varchar_attribute_update',
                    ],
                    'expectedData' => [
=======
                    'post_data' => [
                        'attribute_code' => 'varchar_attribute_update',
                    ],
                    'expected_data' => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                        'attribute_code' => 'varchar_attribute',
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
        return 'text';
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
                Store::DEFAULT_STORE_ID => 'Varchar Attribute Update',
            ],
            'is_required' => '1',
            'is_global' => ScopedAttributeInterface::SCOPE_WEBSITE,
            'default_value_text' => 'Varchar Attribute Default',
            'is_unique' => '1',
            'frontend_class' => 'validate-alphanum',
            'is_used_in_grid' => '1',
            'is_visible_in_grid' => '1',
            'is_filterable_in_grid' => '1',
            'is_searchable' => '1',
            'search_weight' => '2',
            'is_visible_in_advanced_search' => '1',
            'is_comparable' => '1',
            'is_used_for_promo_rules' => '1',
            'is_html_allowed_on_front' => '0',
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
        unset($updatePostData['default_value_text']);
        return array_merge(
            $updatePostData,
            [
                'frontend_label' => 'Varchar Attribute Update',
                'frontend_input' => 'text',
                'attribute_code' => 'varchar_attribute',
                'default_value' => 'Varchar Attribute Default',
                'is_filterable' => '0',
                'is_filterable_in_search' => '0',
                'position' => '0',
                'is_user_defined' => '1',
                'backend_type' => 'varchar',
            ]
        );
    }
}
