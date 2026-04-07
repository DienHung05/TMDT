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

namespace Magento\TestFramework\Catalog\Model\Product\Attribute\DataProvider;

use Magento\Catalog\Model\Product\Attribute\Frontend\Image;
use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;
use Magento\Store\Model\Store;
use Magento\TestFramework\Eav\Model\Attribute\DataProvider\AbstractBaseAttributeData;
<<<<<<< HEAD
use tests\util\MftfStaticTestCase;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * Product attribute data for attribute with input type media image.
 */
class MediaImage extends AbstractBaseAttributeData
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
    public static function getAttributeDataWithCheckArray(): array
    {
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
                        'attribute_code' => 'image_attribute',
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
        return 'media_image';
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
                Store::DEFAULT_STORE_ID => 'Decimal Attribute Update',
            ],
            'frontend_input' => 'media_image',
            'is_global' => ScopedAttributeInterface::SCOPE_WEBSITE,
            'is_used_in_grid' => '1',
            'is_visible_in_grid' => '1',
            'is_filterable_in_grid' => '1',
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
                'frontend_label' => 'Decimal Attribute Update',
                'is_required' => '0',
                'attribute_code' => 'image_attribute',
                'default_value' => null,
                'is_unique' => '0',
                'frontend_class' => null,
                'is_searchable' => '0',
                'search_weight' => '1',
                'is_visible_in_advanced_search' => '0',
                'is_comparable' => '0',
                'is_filterable' => '0',
                'is_filterable_in_search' => '0',
                'position' => '0',
                'is_used_for_promo_rules' => '0',
                'is_html_allowed_on_front' => '1',
                'is_visible_on_front' => '0',
                'used_in_product_listing' => '1',
                'used_for_sort_by' => '0',
                'is_user_defined' => '1',
                'backend_type' => 'varchar',
                'frontend_model' => Image::class,
            ]
        );
    }
}
