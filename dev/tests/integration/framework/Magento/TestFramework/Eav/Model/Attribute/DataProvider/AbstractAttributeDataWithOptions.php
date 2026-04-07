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

use Magento\Store\Model\Store;

/**
 * Base POST data for create attribute with options.
 */
abstract class AbstractAttributeDataWithOptions extends AbstractBaseAttributeData
{
    /**
     * @inheritdoc
     */
    public function __construct()
    {
        parent::__construct();
<<<<<<< HEAD
        static::$defaultAttributePostData['serialized_options_arr'] = static::getOptionsDataArr();
        static::$defaultAttributePostData['is_filterable'] = '0';
        static::$defaultAttributePostData['is_filterable_in_search'] = '0';
=======
        $this->defaultAttributePostData['serialized_options_arr'] = $this->getOptionsDataArr();
        $this->defaultAttributePostData['is_filterable'] = '0';
        $this->defaultAttributePostData['is_filterable_in_search'] = '0';
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }

    /**
     * @inheritdoc
     */
<<<<<<< HEAD
    public static function getAttributeData(): array
    {
        static::$defaultAttributePostData['serialized_options_arr'] = static::getOptionsDataArr();
        static::$defaultAttributePostData['is_filterable'] = '0';
        static::$defaultAttributePostData['is_filterable_in_search'] = '0';
        $result = parent::getAttributeData();
        unset($result["{static::getFrontendInput()}_with_default_value"]);
        unset($result["{static::getFrontendInput()}_without_default_value"]);
=======
    public function getAttributeData(): array
    {
        $result = parent::getAttributeData();
        unset($result["{$this->getFrontendInput()}_with_default_value"]);
        unset($result["{$this->getFrontendInput()}_without_default_value"]);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

        return $result;
    }

    /**
     * @inheritdoc
     */
<<<<<<< HEAD
    public static function getAttributeDataWithErrorMessage(): array
    {
        $wrongSerializeMessage = 'The attribute couldn\'t be saved due to an error. Verify your information and ';
        $wrongSerializeMessage .= 'try again. If the error persists, please try again later.';
        static::$defaultAttributePostData['serialized_options_arr'] = static::getOptionsDataArr();
        static::$defaultAttributePostData['is_filterable'] = '0';
        static::$defaultAttributePostData['is_filterable_in_search'] = '0';
        return array_replace_recursive(
            parent::getAttributeDataWithErrorMessage(),
            [
                "{static::getFrontendInput()}_with_wrong_serialized_options" => [
                    array_merge(
                        static::$defaultAttributePostData,
=======
    public function getAttributeDataWithErrorMessage(): array
    {
        $wrongSerializeMessage = 'The attribute couldn\'t be saved due to an error. Verify your information and ';
        $wrongSerializeMessage .= 'try again. If the error persists, please try again later.';

        return array_replace_recursive(
            parent::getAttributeDataWithErrorMessage(),
            [
                "{$this->getFrontendInput()}_with_wrong_serialized_options" => [
                    array_merge(
                        $this->defaultAttributePostData,
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                        [
                            'serialized_options_arr' => [],
                            'serialized_options' => '?.\\//',
                        ]
                    ),
                    (string)__($wrongSerializeMessage)
                ],
            ]
        );
    }

    /**
     * @inheritdoc
     */
<<<<<<< HEAD
    public static function getAttributeDataWithCheckArray(): array
    {
        static::$defaultAttributePostData['serialized_options_arr'] = static::getOptionsDataArr();
        static::$defaultAttributePostData['is_filterable'] = '0';
        static::$defaultAttributePostData['is_filterable_in_search'] = '0';
        $result = parent::getAttributeDataWithCheckArray();
        unset($result["{static::getFrontendInput()}_with_default_value"]);
        unset($result["{static::getFrontendInput()}_without_default_value"]);
=======
    public function getAttributeDataWithCheckArray(): array
    {
        $result = parent::getAttributeDataWithCheckArray();
        unset($result["{$this->getFrontendInput()}_with_default_value"]);
        unset($result["{$this->getFrontendInput()}_without_default_value"]);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

        return $result;
    }

    /**
     * Return product attribute data set for update attribute options.
     *
     * @return array
     */
<<<<<<< HEAD
    public static function getUpdateOptionsProvider(): array
    {
        static::$defaultAttributePostData['serialized_options_arr'] = static::getOptionsDataArr();
        static::$defaultAttributePostData['is_filterable'] = '0';
        static::$defaultAttributePostData['is_filterable_in_search'] = '0';
        $frontendInput = static::getFrontendInput();
        return [
            "{$frontendInput}_update_options" => [
                'postData' => [
=======
    public function getUpdateOptionsProvider(): array
    {
        $frontendInput = $this->getFrontendInput();
        return [
            "{$frontendInput}_update_options" => [
                'post_data' => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    'options_array' => [
                        'option_1' => [
                            'order' => '5',
                            'value' => [
                                Store::DEFAULT_STORE_ID => 'Option 1 Admin',
                                'default' => 'Option 1 Store 1',
                                'fixture_second_store' => 'Option 1 Store 2',
                                'fixture_third_store' => 'Option 1 Store 3',
                            ],
                            'delete' => '',
                        ],
                        'option_2' => [
                            'order' => '6',
                            'value' => [
                                Store::DEFAULT_STORE_ID => 'Option 2 Admin',
                                'default' => 'Option 2 Store 1',
                                'fixture_second_store' => 'Option 2 Store 2',
                                'fixture_third_store' => 'Option 2 Store 3',
                            ],
                            'delete' => '',
                            'default' => 1,
                        ],
                    ],
                ],
            ],
            "{$frontendInput}_delete_options" => [
<<<<<<< HEAD
                'postData' => [
=======
                'post_data' => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    'options_array' => [
                        'option_1' => [
                            'value' => [],
                            'delete' => '',
                        ],
                        'option_2' => [
                            'value' => [],
                            'delete' => '1',
                        ],
                        'option_3' => [
                            'value' => [],
                            'delete' => '',
                        ],
                        'option_4' => [
                            'value' => [],
                            'delete' => '1',
                        ],
                    ],
                ],
            ],
        ];
    }

    /**
     * Return attribute options data.
     *
     * @return array
     */
<<<<<<< HEAD
    protected static function getOptionsDataArr(): array
=======
    protected function getOptionsDataArr(): array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            [
                'option' => [
                    'order' => [
                        'option_0' => '1',
                    ],
                    'value' => [
                        'option_0' => [
                            'Admin value 1',
                            'Default store view value 1',
                        ],
                    ],
                    'delete' => [
                        'option_0' => '',
                    ],
                ],
            ],
            [
                'option' => [
                    'order' => [
                        'option_1' => '2',
                    ],
                    'value' => [
                        'option_1' => [
                            'Admin value 2',
                            'Default store view value 2',
                        ],
                    ],
                    'delete' => [
                        'option_1' => '',
                    ],
                ],
            ],
        ];
    }
}
