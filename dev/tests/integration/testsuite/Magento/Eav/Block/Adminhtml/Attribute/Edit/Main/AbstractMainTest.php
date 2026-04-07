<?php
/**
<<<<<<< HEAD
 * Copyright 2015 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

/**
 * Test class for \Magento\Eav\Block\Adminhtml\Attribute\Edit\Main\AbstractMain
 */
namespace Magento\Eav\Block\Adminhtml\Attribute\Edit\Main;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class AbstractMainTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @magentoAppIsolation enabled
     */
    public function testPrepareForm()
    {
        /** @var $objectManager \Magento\TestFramework\ObjectManager */
        $objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();

        \Magento\TestFramework\Helper\Bootstrap::getInstance()
            ->loadArea(\Magento\Backend\App\Area\FrontNameResolver::AREA_CODE);
        $objectManager->get(\Magento\Framework\View\DesignInterface::class)
            ->setDefaultDesignTheme();
        $entityType = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->get(\Magento\Eav\Model\Config::class)
            ->getEntityType('customer');
        $model = $objectManager->create(\Magento\Customer\Model\Attribute::class);
        $model->setEntityTypeId($entityType->getId());
        $objectManager->get(\Magento\Framework\Registry::class)->register('entity_attribute', $model);

<<<<<<< HEAD
        $block = $this->getMockBuilder(AbstractMain::class)
            ->setConstructorArgs([
=======
        $block = $this->getMockForAbstractClass(
            \Magento\Eav\Block\Adminhtml\Attribute\Edit\Main\AbstractMain::class,
            [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                $objectManager->get(\Magento\Backend\Block\Template\Context::class),
                $objectManager->get(\Magento\Framework\Registry::class),
                $objectManager->get(\Magento\Framework\Data\FormFactory::class),
                $objectManager->get(\Magento\Eav\Helper\Data::class),
                $objectManager->get(\Magento\Config\Model\Config\Source\YesnoFactory::class),
                $objectManager->get(\Magento\Eav\Model\Adminhtml\System\Config\Source\InputtypeFactory::class),
                $objectManager->get(\Magento\Eav\Block\Adminhtml\Attribute\PropertyLocker::class)
<<<<<<< HEAD
            ])
            ->onlyMethods(['_prepareForm'])     // list at least one abstract method
            ->getMock();

        $block->setLayout(
=======
            ]
        )->setLayout(
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            $objectManager->create(\Magento\Framework\View\Layout::class)
        );

        $method = new \ReflectionMethod(
            \Magento\Eav\Block\Adminhtml\Attribute\Edit\Main\AbstractMain::class,
            '_prepareForm'
        );
<<<<<<< HEAD
=======
        $method->setAccessible(true);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $method->invoke($block);

        $element = $block->getForm()->getElement('default_value_date');
        $this->assertNotNull($element);
        $this->assertNotEmpty($element->getDateFormat());
    }
}
