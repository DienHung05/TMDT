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
 * Product attribute data for attribute with yes/no input type.
 */
class YesNo extends AbstractBaseAttributeData
{
    /**
     * @inheritdoc
     */
    public function __construct()
    {
        parent::__construct();
<<<<<<< HEAD
        static::$defaultAttributePostData['is_filterable'] = '0';
        static::$defaultAttributePostData['is_filterable_in_search'] = '0';
        static::$defaultAttributePostData['used_for_sort_by'] = '0';
=======
        $this->defaultAttributePostData['is_filterable'] = '0';
        $this->defaultAttributePostData['is_filterable_in_search'] = '0';
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
                        'default_value_yesno' => 1,
                    ],
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
        return array_replace_recursive(
            parent::getAttributeDataWithCheckArray(),
            [
<<<<<<< HEAD
                "{static::getFrontendInput()}_with_default_value" => [
=======
                "{$this->getFrontendInput()}_with_default_value" => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    1 => [
                        'default_value' => 1,
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
                        'attribute_code' => 'boolean_attribute',
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
        return 'boolean';
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
                Store::DEFAULT_STORE_ID => 'Boolean Attribute Update',
            ],
            'frontend_input' => 'boolean',
            'is_required' => '1',
            'is_global' => ScopedAttributeInterface::SCOPE_WEBSITE,
            'default_value_yesno' => '1',
            'is_unique' => '1',
            'is_used_in_grid' => '1',
            'is_visible_in_grid' => '1',
            'is_filterable_in_grid' => '1',
            'is_searchable' => '1',
            'search_weight' => '2',
            'is_visible_in_advanced_search' => '0',
            'is_comparable' => '1',
            'is_filterable' => '2',
            'is_filterable_in_search' => '0',
            'position' => '2',
            'is_used_for_promo_rules' => '1',
            'is_html_allowed_on_front' => '0',
            'is_visible_on_front' => '0',
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
        unset($updatePostData['default_value_yesno']);
        return array_merge(
            $updatePostData,
            [
                'frontend_label' => 'Boolean Attribute Update',
                'attribute_code' => 'boolean_attribute',
                'default_value' => '1',
                'frontend_class' => null,
                'is_user_defined' => '1',
                'backend_type' => 'int',
            ]
        );
    }
}
