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

namespace Magento\TestFramework\Eav\Model\Attribute\DataProvider;

use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;
use Magento\Store\Model\Store;

/**
 * Product attribute data for attribute with input type datetime.
 */
class DateTime extends AbstractBaseAttributeData
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
                        'default_value_datetime' => '02/4/2020 6:30 AM',
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
                        'default_value' => '2020-02-04 06:30:00',
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
                        'attribute_code' => 'datetime_attribute',
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
                        'default_value_datetime' => '//02/4/2020 6:30 AM',
                    ],
                    'errorMessage' => (string)__('The default date is invalid. Verify the date and try again.'),
=======
                    'post_data' => [
                        'default_value_datetime' => '//02/4/2020 6:30 AM',
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
        return 'datetime';
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
                Store::DEFAULT_STORE_ID => 'Date Time Attribute Update',
            ],
            'frontend_input' => 'datetime',
            'is_required' => '1',
            'is_global' => ScopedAttributeInterface::SCOPE_WEBSITE,
            'default_value_datetime' => '02/4/2020 6:30 AM',
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
        unset($updatePostData['default_value_datetime']);
        return array_merge(
            $updatePostData,
            [
                'frontend_label' => 'Date Time Attribute Update',
                'attribute_code' => 'datetime_attribute',
                'default_value' => '2020-02-04 06:30:00',
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
