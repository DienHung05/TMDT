<?php
/**
<<<<<<< HEAD
 * Copyright 2017 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

namespace Magento\Setup\Test\Unit\Fixtures\AttributeSet;

use Magento\Catalog\Api\AttributeSetManagementInterface;
use Magento\Catalog\Api\Data\ProductAttributeInterface;
use Magento\Catalog\Api\ProductAttributeGroupRepositoryInterface;
use Magento\Catalog\Api\ProductAttributeManagementInterface;
use Magento\Catalog\Api\ProductAttributeRepositoryInterface;
use Magento\Eav\Api\Data\AttributeGroupInterface;
use Magento\Eav\Api\Data\AttributeOptionInterface;
use Magento\Eav\Api\Data\AttributeSetInterface;
use Magento\Setup\Fixtures\AttributeSet\AttributeSetFixture;
use PHPUnit\Framework\TestCase;

/**
 * @SuppressWarnings(PHPMD)
 */
class AttributeSetFixtureTest extends TestCase
{
    public function testExecute()
    {
        $attributeSets = [
            'name' => 'attribute set name',
            'attributes' => [
                'attribute' => [
                    [
                        'is_required' => 1,
                        'is_visible_on_front' => 1,
                        'is_visible_in_advanced_search' => 0,
                        'is_filterable' => 0,
                        'is_filterable_in_search' => 0,
                        'attribute_code' => 'attribute_1',
                        'is_searchable' => 0,
                        'frontend_label' => 'Attribute 1',
                        'frontend_input' => 'select',
                        'backend_type' => 1,
                        'default_option' => 'option 1',
                        'options' => [
                            'option' => [
                                [
                                    'label' => 'option 1',
                                    'value' => 'option_1'
                                ],
                            ]
                        ]
                    ]
                ]
            ]
        ];

        // Mock Attribute Sets
        $attributeSetMock = $this->getMockBuilder(AttributeSetInterface::class)
            ->disableOriginalConstructor()
<<<<<<< HEAD
            ->getMock();
=======
            ->getMockForAbstractClass();
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $attributeSetMock->expects($this->once())
            ->method('setAttributeSetName')
            ->with("attribute set name");
        $attributeSetMock->expects($this->once())
            ->method('setEntityTypeId')
            ->with(ProductAttributeInterface::ENTITY_TYPE_CODE);
        $attributeSetMock->expects($this->any())
            ->method('getAttributeSetName')
            ->willReturn($attributeSets['name']);

        $attributeSetFactoryMock = $this->getMockBuilder(\Magento\Eav\Api\Data\AttributeSetInterfaceFactory::class)
            ->disableOriginalConstructor()
<<<<<<< HEAD
            ->onlyMethods(['create'])
=======
            ->setMethods(['create'])
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            ->getMock();
        $attributeSetFactoryMock->expects($this->once())
            ->method('create')
            ->willReturn($attributeSetMock);

        $attributeSetManagementMock = $this->getMockBuilder(AttributeSetManagementInterface::class)
            ->disableOriginalConstructor()
<<<<<<< HEAD
            ->getMock();
=======
            ->getMockForAbstractClass();
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $attributeSetManagementMock->expects($this->once())
            ->method('create')
            ->with($attributeSetMock, '4')
            ->willReturn($attributeSetMock);

        //Mock Attribute Groups
        $attributeGroupMock = $this->getMockBuilder(AttributeGroupInterface::class)
            ->disableOriginalConstructor()
<<<<<<< HEAD
            ->getMock();
=======
            ->getMockForAbstractClass();
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $attributeGroupMock->expects($this->once())
            ->method('setAttributeGroupName')
            ->with($attributeSetMock->getAttributeSetName() . ' - Group');
        $attributeGroupMock->expects($this->once())
            ->method('setAttributeSetId')
            ->with($attributeSetMock->getAttributeSetId());

        $attributeGroupFactoryMock = $this->getMockBuilder(\Magento\Eav\Api\Data\AttributeGroupInterfaceFactory::class)
            ->disableOriginalConstructor()
<<<<<<< HEAD
            ->onlyMethods(['create'])
=======
            ->setMethods(['create'])
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            ->getMock();
        $attributeGroupFactoryMock->expects($this->once())
            ->method('create')
            ->willReturn($attributeGroupMock);

        $productAttributeGroupRepoMock = $this->getMockBuilder(
            ProductAttributeGroupRepositoryInterface::class
        )
            ->disableOriginalConstructor()
            ->getMock();
        $productAttributeGroupRepoMock->expects($this->once())
            ->method('save')
            ->with($attributeGroupMock)
            ->willReturn($attributeGroupMock);

        // Mock Attributes
        $attributeMock = $this->getMockBuilder(ProductAttributeInterface::class)
            ->disableOriginalConstructor()
<<<<<<< HEAD
            ->getMock();

        $attributeFactoryMock = $this->getMockBuilder(\Magento\Catalog\Api\Data\ProductAttributeInterfaceFactory::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['create'])
=======
            ->getMockForAbstractClass();

        $attributeFactoryMock = $this->getMockBuilder(\Magento\Catalog\Api\Data\ProductAttributeInterfaceFactory::class)
            ->disableOriginalConstructor()
            ->setMethods(['create'])
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            ->getMock();
        $attributeFactoryMock->expects($this->once())
            ->method('create')
            ->willReturn($attributeMock);

        //Mock Attribute Options
        $optionMock = $this->getMockBuilder(AttributeOptionInterface::class)
            ->disableOriginalConstructor()
<<<<<<< HEAD
            ->getMock();

        $optionFactoryMock = $this->getMockBuilder(\Magento\Eav\Api\Data\AttributeOptionInterfaceFactory::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['create'])
=======
            ->getMockForAbstractClass();

        $optionFactoryMock = $this->getMockBuilder(\Magento\Eav\Api\Data\AttributeOptionInterfaceFactory::class)
            ->disableOriginalConstructor()
            ->setMethods(['create'])
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            ->getMock();
        $optionFactoryMock->expects($this->once())
            ->method('create')
            ->willReturn($optionMock);

        $productAttributeRepoMock = $this->getMockBuilder(
            ProductAttributeRepositoryInterface::class
        )
            ->disableOriginalConstructor()
            ->getMock();
        $productAttributeRepoMock->expects($this->once())
            ->method('save')
            ->with($attributeMock)
            ->willReturn($attributeMock);

        $productAttributeManagementMock = $this->getMockBuilder(
            ProductAttributeManagementInterface::class
        )
            ->disableOriginalConstructor()
            ->getMock();
        $productAttributeManagementMock->expects($this->once())
            ->method('assign')
            ->willReturn($attributeMock->getAttributeId());

        $attributeSet = new AttributeSetFixture(
            $attributeSetManagementMock,
            $productAttributeGroupRepoMock,
            $productAttributeRepoMock,
            $productAttributeManagementMock,
            $attributeFactoryMock,
            $optionFactoryMock,
            $attributeSetFactoryMock,
            $attributeGroupFactoryMock
        );
        $attributeSet->createAttributeSet($attributeSets);
    }
}
