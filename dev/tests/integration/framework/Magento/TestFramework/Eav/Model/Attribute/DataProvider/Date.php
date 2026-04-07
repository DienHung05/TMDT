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
 * Product attribute data for attribute with input type date.
 */
class Date extends AbstractBaseAttributeData
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
    {
        static::$defaultAttributePostData['used_for_sort_by'] = '0';
        return array_replace_recursive(
            parent::getAttributeData(),
            [
                "{static::getFrontendInput()}_with_default_value" => [
=======
    public function getAttributeData(): array
    {
        return array_replace_recursive(
            parent::getAttributeData(),
            [
                "{$this->getFrontendInput()}_with_default_value" => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    [
                        'default_value_text' => '',
                        'default_value_date' => '10/29/2019',
                    ]
                ]
            ]
        );
    }

    /**
     * @inheritdoc
     */
<<<<<<< HEAD
    public static function getAttributeDataWithCheckArray(): array
    {
        static::$defaultAttributePostData['used_for_sort_by'] = '0';
        return array_replace_recursive(
            parent::getAttributeDataWithCheckArray(),
            [
                "{static::getFrontendInput()}_with_default_value" => [
=======
    public function getAttributeDataWithCheckArray(): array
    {
        return array_replace_recursive(
            parent::getAttributeDataWithCheckArray(),
            [
                "{$this->getFrontendInput()}_with_default_value" => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    1 => [
                        'default_value' => '2019-10-29 00:00:00',
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
        static::$defaultAttributePostData['used_for_sort_by'] = '0';
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
                        'attribute_code' => 'date_attribute',
                    ],
                ],
            ]
        );
    }

    /**
     * @inheritdoc
     */
<<<<<<< HEAD
    public static function getUpdateProviderWithErrorMessage(): array
    {
        static::$defaultAttributePostData['used_for_sort_by'] = '0';
        $frontendInput = static::getFrontendInput();
=======
    public function getUpdateProviderWithErrorMessage(): array
    {
        $frontendInput = $this->getFrontendInput();
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        return array_replace_recursive(
            parent::getUpdateProviderWithErrorMessage(),
            [
                "{$frontendInput}_wrong_default_value" => [
<<<<<<< HEAD
                    'postData' => [
                        'default_value_date' => '//2019/12/12',
                    ],
                    'errorMessage' => (string)__('The default date is invalid. Verify the date and try again.'),
=======
                    'post_data' => [
                        'default_value_date' => '//2019/12/12',
                    ],
                    'error_message' => (string)__('The default date is invalid. Verify the date and try again.'),
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
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
        return 'date';
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
                Store::DEFAULT_STORE_ID => 'Date Attribute Update',
            ],
            'frontend_input' => 'date',
            'is_required' => '1',
            'is_global' => ScopedAttributeInterface::SCOPE_WEBSITE,
            'default_value_date' => '12/29/2019',
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
        unset($updatePostData['default_value_date']);
        return array_merge(
            $updatePostData,
            [
                'frontend_label' => 'Date Attribute Update',
                'attribute_code' => 'date_attribute',
                'default_value' => '2019-12-29 00:00:00',
                'frontend_class' => null,
                'is_filterable' => '0',
                'is_filterable_in_search' => '0',
                'position' => '0',
                'is_user_defined' => '1',
                'backend_type' => 'datetime',
            ]
        );
    }
}
