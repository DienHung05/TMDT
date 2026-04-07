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
 * Test class for \Magento\Sales\Block\Adminhtml\Order\Create\Form\AbstractForm
 */
namespace Magento\Sales\Block\Adminhtml\Order\Create\Form;

<<<<<<< HEAD
use Magento\Backend\App\Area\FrontNameResolver;
use Magento\Backend\Block\Template\Context;
use Magento\Backend\Model\Session\Quote;
use Magento\Customer\Api\Data\AttributeMetadataInterfaceFactory;
use Magento\Framework\Data\FormFactory;
use Magento\Framework\Pricing\PriceCurrencyInterface;
use Magento\Framework\Reflection\DataObjectProcessor;
use Magento\Framework\View\DesignInterface;
use Magento\Framework\View\Layout;
use Magento\Sales\Model\AdminOrder\Create;
use Magento\TestFramework\Helper\Bootstrap;
use PHPUnit\Framework\TestCase;
use ReflectionMethod;
=======
use Magento\Customer\Api\Data\AttributeMetadataInterfaceFactory;
use Magento\Customer\Api\Data\OptionInterfaceFactory;
use Magento\Customer\Api\Data\ValidationRuleInterfaceFactory;
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * Class AbstractTest
 *
<<<<<<< HEAD
 * Test cases to check custom attribute can be added successfully with the form
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class AbstractTest extends TestCase
=======
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class AbstractTest extends \PHPUnit\Framework\TestCase
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
{
    /**
     * @magentoAppIsolation enabled
     */
    public function testAddAttributesToForm()
    {
<<<<<<< HEAD
        $objectManager = Bootstrap::getObjectManager();
        Bootstrap::getInstance()
            ->loadArea(FrontNameResolver::AREA_CODE);
        $objectManager->get(DesignInterface::class)->setDefaultDesignTheme();
        $arguments = [
            $objectManager->get(Context::class),
            $objectManager->get(Quote::class),
            $objectManager->get(Create::class),
            $objectManager->get(PriceCurrencyInterface::class),
            $objectManager->get(FormFactory::class),
            $objectManager->get(DataObjectProcessor::class)
        ];

        /** @var $block AbstractForm */
        $block = $this->getMockBuilder(AbstractForm::class)
            ->setConstructorArgs($arguments)
            ->onlyMethods(['_prepareForm'])
            ->getMock();
        $block->setLayout($objectManager->create(Layout::class));

        $method1 = new ReflectionMethod(
            AbstractForm::class,
            '_addAttributesToForm'
        );
        $method2 = new ReflectionMethod(
            AbstractForm::class,
            'getForm'
        );

        $form = $method2->invoke($block);
        $fieldset = $form->addFieldset('test_fieldset', []);
        /** @var AttributeMetadataInterfaceFactory $attributeMetadataFactory */
        $attributeMetadataFactory =
            $objectManager->create(AttributeMetadataInterfaceFactory::class);
        $dateAttribute = $attributeMetadataFactory->create()->setAttributeCode('date')
            ->setBackendType('datetime')
            ->setFrontendInput('date')
            ->setFrontendLabel('Date')
            ->setSortOrder(100);

        $textAttribute = $attributeMetadataFactory->create()->setAttributeCode('test_text')
            ->setBackendType('text')
            ->setFrontendInput('text')
            ->setFrontendLabel('Test Text')
            ->setSortOrder(200);

        $attributes = ['date' => $dateAttribute, 'test_text' => $textAttribute];
        $method1->invoke($block, $attributes, $fieldset);

        $element1 = $form->getElement('date');
        $this->assertNotNull($element1);
        $this->assertNotEmpty($element1->getDateFormat());
        $this->assertNotEmpty($element1->getSortOrder());
        $this->assertEquals($element1->getSortOrder(), 100);

        $element2 = $form->getElement('test_text');
        $this->assertNotNull($element2);
        $this->assertNotEmpty($element2->getSortOrder());
        $this->assertEquals($element2->getSortOrder(), 200);
=======
        $objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();
        \Magento\TestFramework\Helper\Bootstrap::getInstance()
            ->loadArea(\Magento\Backend\App\Area\FrontNameResolver::AREA_CODE);

        $objectManager->get(\Magento\Framework\View\DesignInterface::class)->setDefaultDesignTheme();
        $arguments = [
            $objectManager->get(\Magento\Backend\Block\Template\Context::class),
            $objectManager->get(\Magento\Backend\Model\Session\Quote::class),
            $objectManager->get(\Magento\Sales\Model\AdminOrder\Create::class),
            $objectManager->get(\Magento\Framework\Pricing\PriceCurrencyInterface::class),
            $objectManager->get(\Magento\Framework\Data\FormFactory::class),
            $objectManager->get(\Magento\Framework\Reflection\DataObjectProcessor::class)
        ];

        /** @var $block \Magento\Sales\Block\Adminhtml\Order\Create\Form\AbstractForm */
        $block = $this->getMockForAbstractClass(
            \Magento\Sales\Block\Adminhtml\Order\Create\Form\AbstractForm::class,
            $arguments
        );
        $block->setLayout($objectManager->create(\Magento\Framework\View\Layout::class));

        $method = new \ReflectionMethod(
            \Magento\Sales\Block\Adminhtml\Order\Create\Form\AbstractForm::class,
            '_addAttributesToForm'
        );
        $method->setAccessible(true);

        /** @var $formFactory \Magento\Framework\Data\FormFactory */
        $formFactory = $objectManager->get(\Magento\Framework\Data\FormFactory::class);
        $form = $formFactory->create();
        $fieldset = $form->addFieldset('test_fieldset', []);
        /** @var \Magento\Customer\Api\Data\AttributeMetadataInterfaceFactory $attributeMetadataFactory */
        $attributeMetadataFactory =
            $objectManager->create(\Magento\Customer\Api\Data\AttributeMetadataInterfaceFactory::class);
        $dateAttribute = $attributeMetadataFactory->create()->setAttributeCode('date')
            ->setBackendType('datetime')
            ->setFrontendInput('date')
            ->setFrontendLabel('Date');
        $attributes = ['date' => $dateAttribute];
        $method->invoke($block, $attributes, $fieldset);

        $element = $form->getElement('date');
        $this->assertNotNull($element);
        $this->assertNotEmpty($element->getDateFormat());
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }
}
