<?php
/**
<<<<<<< HEAD
 * Copyright 2013 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

/**
 * Test class for \Magento\Rule\Model\Condition\AbstractCondition
 */
namespace Magento\Rule\Model\Condition;

<<<<<<< HEAD
use Magento\Framework\TestFramework\Unit\Helper\MockCreationTrait;

class AbstractTest extends \PHPUnit\Framework\TestCase
{
    use MockCreationTrait;
=======
class AbstractTest extends \PHPUnit\Framework\TestCase
{
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testGetValueElement()
    {
        $layoutMock = $this->createMock(\Magento\Framework\View\Layout::class);

        $objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();
        $context = $objectManager->create(\Magento\Rule\Model\Condition\Context::class, ['layout' => $layoutMock]);

        /** @var \Magento\Rule\Model\Condition\AbstractCondition $model */
<<<<<<< HEAD
        $model = $this->createPartialMockWithReflection(
            \Magento\Rule\Model\Condition\AbstractCondition::class,
            ['getValueElementRenderer']
        );
        // Set the context properties via reflection since constructor was skipped
        // AbstractCondition extracts these from context in its constructor
        $assetRepoProperty = new \ReflectionProperty(\Magento\Rule\Model\Condition\AbstractCondition::class, '_assetRepo');
        $assetRepoProperty->setValue($model, $context->getAssetRepository());

        $localeDateProperty = new \ReflectionProperty(\Magento\Rule\Model\Condition\AbstractCondition::class, '_localeDate');
        $localeDateProperty->setValue($model, $context->getLocaleDate());

        $layoutProperty = new \ReflectionProperty(\Magento\Rule\Model\Condition\AbstractCondition::class, '_layout');
        $layoutProperty->setValue($model, $context->getLayout());
=======
        $model = $this->getMockForAbstractClass(
            \Magento\Rule\Model\Condition\AbstractCondition::class,
            [$context],
            '',
            true,
            true,
            true,
            ['getValueElementRenderer']
        );
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $editableBlock = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
            \Magento\Rule\Block\Editable::class
        );
        $model->expects($this->any())->method('getValueElementRenderer')->willReturn($editableBlock);

<<<<<<< HEAD
        $rule = $this->createMock(\Magento\Rule\Model\AbstractModel::class);
=======
        $rule = $this->getMockBuilder(\Magento\Rule\Model\AbstractModel::class)
            ->setMethods(['getForm'])
            ->disableOriginalConstructor()
            ->getMockForAbstractClass();
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $rule->expects($this->any())
            ->method('getForm')
            ->willReturn(
                \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(\Magento\Framework\Data\Form::class)
            );
        $model->setRule($rule);

        $property = new \ReflectionProperty(\Magento\Rule\Model\Condition\AbstractCondition::class, '_inputType');
<<<<<<< HEAD
=======
        $property->setAccessible(true);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $property->setValue($model, 'date');

        $element = $model->getValueElement();
        $this->assertNotNull($element);
        $this->assertNotEmpty($element->getDateFormat());
    }
}
