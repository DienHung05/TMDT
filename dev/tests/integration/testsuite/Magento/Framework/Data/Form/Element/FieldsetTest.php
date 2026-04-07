<?php
/**
<<<<<<< HEAD
 * Copyright 2014 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

/**
 * Tests for \Magento\Framework\Data\Form\Element\Fieldset
 */
namespace Magento\Framework\Data\Form\Element;

<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;

=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
class FieldsetTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Magento\Framework\Data\Form\Element\Fieldset
     */
    protected $_fieldset;

    protected function setUp(): void
    {
        $objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();
        /** @var $elementFactory \Magento\Framework\Data\Form\ElementFactory */
        $elementFactory = $objectManager->create(\Magento\Framework\Data\Form\ElementFactory::class);
        $this->_fieldset = $elementFactory->create(\Magento\Framework\Data\Form\Element\Fieldset::class, []);
    }

    /**
     * @param array $fields
     */
    protected function _fillFieldset(array $fields)
    {
        foreach ($fields as $field) {
            $this->_fieldset->addField($field[0], $field[1], $field[2], $field[3], $field[4]);
        }
    }

    /**
     * Test whether fieldset contains advanced section or not
<<<<<<< HEAD
     */
    #[DataProvider('fieldsDataProvider')]
=======
     *
     * @dataProvider fieldsDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testHasAdvanced(array $fields, $expect)
    {
        $this->_fillFieldset($fields);
        $this->assertEquals($expect, $this->_fieldset->hasAdvanced());
    }

    /**
     * Test getting advanced section label
     */
    public function testAdvancedLabel()
    {
        $this->assertEmpty($this->_fieldset->getAdvancedLabel());
        $label = 'Test Label';
        $this->_fieldset->setAdvancedLabel($label);
        $this->assertEquals($label, $this->_fieldset->getAdvancedLabel());
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function fieldsDataProvider()
=======
    public function fieldsDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            [
                [
                    [
                        'code',
                        'text',
                        ['name' => 'code', 'label' => 'Name', 'class' => 'required-entry', 'required' => true],
                        false,
                        false,
                    ],
                    [
                        'tax_rate',
                        'multiselect',
                        [
                            'name' => 'tax_rate',
                            'label' => 'Tax Rate',
                            'class' => 'required-entry',
                            'values' => ['A', 'B', 'C'],
                            'value' => 1,
                            'required' => true
                        ],
                        false,
                        false
                    ],
                    [
                        'priority',
                        'text',
                        [
                            'name' => 'priority',
                            'label' => 'Priority',
                            'class' => 'validate-not-negative-number',
                            'value' => 1,
                            'required' => true,
                            'note' => 'Tax rates at the same priority are added, others are compounded.'
                        ],
                        false,
                        true
                    ],
                    [
                        'priority',
                        'text',
                        [
                            'name' => 'priority',
                            'label' => 'Priority',
                            'class' => 'validate-not-negative-number',
                            'value' => 1,
                            'required' => true,
                            'note' => 'Tax rates at the same priority are added, others are compounded.'
                        ],
                        false,
                        true
                    ],
                ],
                true,
            ],
            [
                [
                    [
                        'code',
                        'text',
                        ['name' => 'code', 'label' => 'Name', 'class' => 'required-entry', 'required' => true],
                        false,
                        false,
                    ],
                    [
                        'tax_rate',
                        'multiselect',
                        [
                            'name' => 'tax_rate',
                            'label' => 'Tax Rate',
                            'class' => 'required-entry',
                            'values' => ['A', 'B', 'C'],
                            'value' => 1,
                            'required' => true
                        ],
                        false,
                        false
                    ],
                ],
                false
            ]
        ];
    }

<<<<<<< HEAD
    #[DataProvider('getChildrenDataProvider')]
=======
    /**
     * @dataProvider getChildrenDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testGetChildren($fields, $expect)
    {
        $this->_fillFieldset($fields);
        $this->assertCount($expect, $this->_fieldset->getChildren());
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function getChildrenDataProvider()
    {
        $data = self::fieldsDataProvider();
=======
    public function getChildrenDataProvider()
    {
        $data = $this->fieldsDataProvider();
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $textField = $data[1][0][0];
        $fieldsetField = $textField;
        $fieldsetField[1] = 'fieldset';
        $result = [[[$fieldsetField], 0], [[$textField], 1]];
        return $result;
    }

    /**
<<<<<<< HEAD
     * @param array $fields
     * @param int $expect
     */
    #[DataProvider('getBasicChildrenDataProvider')]
=======
     * @dataProvider getBasicChildrenDataProvider
     * @param array $fields
     * @param int $expect
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testGetBasicChildren($fields, $expect)
    {
        $this->_fillFieldset($fields);
        $this->assertCount($expect, $this->_fieldset->getBasicChildren());
    }

    /**
<<<<<<< HEAD
     * @param array $fields
     * @param int $expect
     */
    #[DataProvider('getBasicChildrenDataProvider')]
=======
     * @dataProvider getBasicChildrenDataProvider
     * @param array $fields
     * @param int $expect
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testGetCountBasicChildren($fields, $expect)
    {
        $this->_fillFieldset($fields);
        $this->assertEquals($expect, $this->_fieldset->getCountBasicChildren());
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function getBasicChildrenDataProvider()
    {
        $data = self::getChildrenDataProvider();
=======
    public function getBasicChildrenDataProvider()
    {
        $data = $this->getChildrenDataProvider();
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        // set isAdvanced flag
        $data[0][0][0][4] = true;
        return $data;
    }

    /**
<<<<<<< HEAD
     * @param array $fields
     * @param int $expect
     */
    #[DataProvider('getAdvancedChildrenDataProvider')]
=======
     * @dataProvider getAdvancedChildrenDataProvider
     * @param array $fields
     * @param int $expect
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testGetAdvancedChildren($fields, $expect)
    {
        $this->_fillFieldset($fields);
        $this->assertCount($expect, $this->_fieldset->getAdvancedChildren());
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function getAdvancedChildrenDataProvider()
    {
        $data = self::getChildrenDataProvider();
=======
    public function getAdvancedChildrenDataProvider()
    {
        $data = $this->getChildrenDataProvider();
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        // change isAdvanced flag
        $data[0][0][0][4] = true;
        // change expected results
        $data[0][1] = 1;
        $data[1][1] = 0;
        return $data;
    }

    /**
<<<<<<< HEAD
     * @param array $fields
     * @param int $expect
     */
    #[DataProvider('getSubFieldsetDataProvider')]
=======
     * @dataProvider getSubFieldsetDataProvider
     * @param array $fields
     * @param int $expect
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testGetSubFieldset($fields, $expect)
    {
        $this->_fillFieldset($fields);
        $this->assertCount($expect, $this->_fieldset->getAdvancedChildren());
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function getSubFieldsetDataProvider()
    {
        $data = self::fieldsDataProvider();
=======
    public function getSubFieldsetDataProvider()
    {
        $data = $this->fieldsDataProvider();
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $textField = $data[1][0][0];
        $fieldsetField = $textField;
        $fieldsetField[1] = 'fieldset';
        $advancedFieldsetFld = $fieldsetField;
        // set isAdvanced flag
        $advancedFieldsetFld[4] = true;
        $result = [[[$fieldsetField, $textField, $advancedFieldsetFld], 1]];
        return $result;
    }
}
