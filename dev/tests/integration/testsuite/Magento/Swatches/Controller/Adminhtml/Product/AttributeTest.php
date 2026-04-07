<?php
/**
<<<<<<< HEAD
 * Copyright 2018 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

namespace Magento\Swatches\Controller\Adminhtml\Product;

use Magento\Framework\App\Request\Http as HttpRequest;
use Magento\Framework\Data\Form\FormKey;
use Magento\Framework\Exception\LocalizedException;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * Test for product attribute save controller.
 *
 * @magentoAppArea adminhtml
 * @magentoDbIsolation enabled
 */
class AttributeTest extends \Magento\TestFramework\TestCase\AbstractBackendController
{
    /**
     * @var FormKey
     */
    private $formKey;

    /**
     * @inheritDoc
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->formKey = $this->_objectManager->get(FormKey::class);
    }

    /**
     * Generate random hex color.
     *
     * @return string
     */
<<<<<<< HEAD
    private static function getRandomColor() : string
=======
    private function getRandomColor() : string
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return '#' . str_pad(dechex(random_int(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
    }

    /**
     * Get visual swatches data set.
     *
     * @param int $optionsCount
     * @return array
     */
<<<<<<< HEAD
    private static function getSwatchVisualDataSet(int $optionsCount) : array
=======
    private function getSwatchVisualDataSet(int $optionsCount) : array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        $optionsData = [];
        $expectedOptionsLabels = [];
        for ($i = 0; $i < $optionsCount; $i++) {
            $expectedOptionLabelOnStoreView = 'value_' . $i .'_store_1';
            $expectedOptionsLabels[$i+1] = $expectedOptionLabelOnStoreView;
            $optionId = 'option_' .$i;
            $optionRowData = [];
            $optionRowData['optionvisual']['order'][$optionId] = $i + 1;
            $optionRowData['defaultvisual'][] = $optionId;
<<<<<<< HEAD
            $optionRowData['swatchvisual']['value'][$optionId] = self::getRandomColor();
=======
            $optionRowData['swatchvisual']['value'][$optionId] = $this->getRandomColor();
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            $optionRowData['optionvisual']['value'][$optionId][0] = 'value_' . $i .'_admin';
            $optionRowData['optionvisual']['value'][$optionId][1] = $expectedOptionLabelOnStoreView;
            $optionRowData['optionvisual']['delete'][$optionId] = '';
            $optionsData[] = http_build_query($optionRowData);
        }
        return [
<<<<<<< HEAD
            'attributeData' => array_merge_recursive(
=======
            'attribute_data' => array_merge_recursive(
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                [
                    'serialized_options' => json_encode($optionsData),
                ],
                [
                    'visual_swatch_validation' => '',
                    'visual_swatch_validation_unique' => '',
                ],
<<<<<<< HEAD
                self::getAttributePreset(),
=======
                $this->getAttributePreset(),
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                [
                    'frontend_input' => 'swatch_visual'
                ]
            ),
<<<<<<< HEAD
            'expectedOptionsCount' => $optionsCount + 1,
            'expectedLabels' => $expectedOptionsLabels
=======
            'expected_options_count' => $optionsCount + 1,
            'expected_store_labels' => $expectedOptionsLabels
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        ];
    }

    /**
     * Get text swatches data set.
     *
     * @param int $optionsCount
     * @return array
     */
<<<<<<< HEAD
    private static function getSwatchTextDataSet(int $optionsCount) : array
=======
    private function getSwatchTextDataSet(int $optionsCount) : array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        $optionsData = [];
        $expectedOptionsLabels = [];
        for ($i = 0; $i < $optionsCount; $i++) {
            $expectedOptionLabelOnStoreView = 'value_' . $i . '_store_1';
            $expectedOptionsLabels[$i+1] = $expectedOptionLabelOnStoreView;
            $optionId = 'option_' . $i;
            $optionRowData = [];
            $optionRowData['optiontext']['order'][$optionId] = $i + 1;
            $optionRowData['defaulttext'][] = $optionId;
            $optionRowData['swatchtext']['value'][$optionId][] = 'x' . $i ;
            $optionRowData['optiontext']['value'][$optionId][0] = 'value_' . $i . '_admin';
            $optionRowData['optiontext']['value'][$optionId][1]= $expectedOptionLabelOnStoreView;
            $optionRowData['optiontext']['delete'][$optionId]='';
            $optionsData[] = http_build_query($optionRowData);
        }
        return [
<<<<<<< HEAD
            'attributeData' => array_merge_recursive(
=======
            'attribute_data' => array_merge_recursive(
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                [
                    'serialized_options' => json_encode($optionsData),
                ],
                [
                    'text_swatch_validation' => '',
                    'text_swatch_validation_unique' => '',
                ],
<<<<<<< HEAD
                self::getAttributePreset(),
=======
                $this->getAttributePreset(),
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                [
                    'frontend_input' => 'swatch_text'
                ]
            ),
<<<<<<< HEAD
            'expectedOptionsCount' => $optionsCount + 1,
            'expectedLabels' => $expectedOptionsLabels
=======
            'expected_options_count' => $optionsCount + 1,
            'expected_store_labels' => $expectedOptionsLabels
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        ];
    }

    /**
     * Get data preset for new attribute.
     *
     * @return array
     */
<<<<<<< HEAD
    private static function getAttributePreset() : array
=======
    private function getAttributePreset() : array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            'form_key' => 'XxtpPYjm2YPYUlAt',
            'frontend_label' => [
                0 => 'asdasd',
                1 => '',
                2 => '',
            ],
            'is_required' => '0',
            'update_product_preview_image' => '0',
            'use_product_image_for_swatch' => '0',
            'is_global' => '0',
            'default_value_text' => '512',
            'default_value_yesno' => '1',
            'default_value_date' => '1/1/70',
            'default_value_textarea' => '512',
            'is_unique' => '0',
            'is_used_in_grid' => '1',
            'is_visible_in_grid' => '1',
            'is_filterable_in_grid' => '1',
            'is_searchable' => '0',
            'is_comparable' => '0',
            'is_filterable' => '0',
            'is_filterable_in_search' => '0',
            'position' => '0',
            'is_used_for_promo_rules' => '0',
            'is_html_allowed_on_front' => '1',
            'is_visible_on_front' => '0',
            'used_in_product_listing' => '0',
            'used_for_sort_by' => '0',
            'attribute_code' => 'test_many_swatches',
        ];
    }

    /**
     * Data provider for large swatches amount test.
     *
     * @return array
     */
<<<<<<< HEAD
    public static function getLargeSwatchesAmountAttributeData() : array
=======
    public function getLargeSwatchesAmountAttributeData() : array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        $swatchVisualOptionsCount = 2000;
        $swatchTextOptionsCount = 2000;
        return [
<<<<<<< HEAD
            'visual swatches' => self::getSwatchVisualDataSet($swatchVisualOptionsCount),
            'text swatches' => self::getSwatchTextDataSet($swatchTextOptionsCount)
=======
            'visual swatches' => $this->getSwatchVisualDataSet($swatchVisualOptionsCount),
            'text swatches' => $this->getSwatchTextDataSet($swatchTextOptionsCount)
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        ];
    }

    /**
     * Test attribute saving with large amount of options exceeding maximum allowed by max_input_vars limit.
<<<<<<< HEAD
=======
     * @dataProvider getLargeSwatchesAmountAttributeData()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @param array $attributeData
     * @param int $expectedOptionsCount
     * @param array $expectedLabels
     * @return void
     */
<<<<<<< HEAD
    #[DataProvider('getLargeSwatchesAmountAttributeData')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testLargeOptionsDataSet(
        array $attributeData,
        int $expectedOptionsCount,
        array $expectedLabels
    ) : void {
        $this->getRequest()->setMethod(HttpRequest::METHOD_POST);
        $this->getRequest()->setPostValue($attributeData);
        $this->getRequest()->setPostValue('form_key', $this->formKey->getFormKey());
        $this->dispatch('backend/catalog/product_attribute/save');
        $entityTypeId = $this->_objectManager->create(
            \Magento\Eav\Model\Entity::class
        )->setType(
            \Magento\Catalog\Model\Product::ENTITY
        )->getTypeId();

        /** @var $attribute \Magento\Catalog\Model\ResourceModel\Eav\Attribute */
        $attribute = $this->_objectManager->create(
            \Magento\Catalog\Model\ResourceModel\Eav\Attribute::class
        )->setEntityTypeId(
            $entityTypeId
        );
        try {
            $attribute->loadByCode($entityTypeId, 'test_many_swatches');
            $options = $attribute->getOptions();
            // assert that all options are saved without truncation
            $this->assertEquals(
                $expectedOptionsCount,
                count($options),
                'Expected options count does not match (regarding first empty option for non-required attribute)'
            );

            foreach ($expectedLabels as $optionOrderNum => $label) {
                $this->assertEquals(
                    $label,
                    $options[$optionOrderNum]->getLabel(),
                    "Label for option #{$optionOrderNum} does not match expected."
                );
            }
        } catch (LocalizedException $e) {
            $this->fail('Test failed with exception on attribute model load: ' . $e);
        }
    }
}
