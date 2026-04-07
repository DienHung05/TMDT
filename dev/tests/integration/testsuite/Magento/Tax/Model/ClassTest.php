<?php
/**
<<<<<<< HEAD
 * Copyright 2013 Adobe
 * All Rights Reserved.
 */
namespace Magento\Tax\Model;

use PHPUnit\Framework\Attributes\DataProvider;

=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Tax\Model;

>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
class ClassTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Magento\TestFramework\ObjectManager
     */
    protected $_objectManager;

    protected function setUp(): void
    {
        /** @var $objectManager \Magento\TestFramework\ObjectManager */
        $this->_objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();
    }

    /**
     * @magentoDbIsolation enabled
     */
    public function testCheckClassCanBeDeletedCustomerClassAssertException()
    {
        /** @var $model \Magento\Tax\Model\ClassModel */
        $model = $this->_objectManager->create(
            \Magento\Tax\Model\ClassModel::class
        )->getCollection()->setClassTypeFilter(
            \Magento\Tax\Model\ClassModel::TAX_CLASS_TYPE_CUSTOMER
        )->getFirstItem();

        $this->expectException(\Magento\Framework\Exception\CouldNotDeleteException::class);
        $model->delete();
    }

    /**
     * @magentoDbIsolation enabled
     */
    public function testCheckClassCanBeDeletedProductClassAssertException()
    {
        /** @var $model \Magento\Tax\Model\ClassModel */
        $model = $this->_objectManager->create(
            \Magento\Tax\Model\ClassModel::class
        )->getCollection()->setClassTypeFilter(
            \Magento\Tax\Model\ClassModel::TAX_CLASS_TYPE_PRODUCT
        )->getFirstItem();

        $this->_objectManager->create(
            \Magento\Catalog\Model\Product::class
        )->setTypeId(
            'simple'
        )->setAttributeSetId(
            4
        )->setName(
            'Simple Product'
        )->setSku(
            uniqid()
        )->setPrice(
            10
        )->setMetaTitle(
            'meta title'
        )->setMetaKeyword(
            'meta keyword'
        )->setMetaDescription(
            'meta description'
        )->setVisibility(
            \Magento\Catalog\Model\Product\Visibility::VISIBILITY_BOTH
        )->setStatus(
            \Magento\Catalog\Model\Product\Attribute\Source\Status::STATUS_ENABLED
        )->setTaxClassId(
            $model->getId()
        )->save();

        $this->expectException(\Magento\Framework\Exception\CouldNotDeleteException::class);
        $model->delete();
    }

    /**
     * @magentoDbIsolation enabled
<<<<<<< HEAD
     */
    #[DataProvider('classesDataProvider')]
=======
     * @dataProvider classesDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testCheckClassCanBeDeletedPositiveResult($classType)
    {
        /** @var $model \Magento\Tax\Model\ClassModel */
        $model = $this->_objectManager->create(\Magento\Tax\Model\ClassModel::class);
        $model->setClassName('TaxClass' . uniqid())->setClassType($classType)->isObjectNew(true);
        $model->save();

        $model->delete();
    }

<<<<<<< HEAD
    public static function classesDataProvider()
=======
    public function classesDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            [\Magento\Tax\Model\ClassModel::TAX_CLASS_TYPE_CUSTOMER],
            [\Magento\Tax\Model\ClassModel::TAX_CLASS_TYPE_PRODUCT]
        ];
    }

    /**
     * @magentoAppIsolation enabled
     * @magentoDataFixture Magento/Tax/_files/tax_classes.php
     */
    public function testCheckClassCanBeDeletedCustomerClassUsedInTaxRule()
    {
        /** @var $registry \Magento\Framework\Registry */
        $registry = $this->_objectManager->get(\Magento\Framework\Registry::class);
        /** @var $taxRule \Magento\Tax\Model\Calculation\Rule */
        $taxRule = $registry->registry('_fixture/Magento_Tax_Model_Calculation_Rule');
        $customerClasses = $taxRule->getCustomerTaxClasses();

        /** @var $model \Magento\Tax\Model\ClassModel */
        $model = $this->_objectManager->create(\Magento\Tax\Model\ClassModel::class)->load($customerClasses[0]);
        $this->expectException(\Magento\Framework\Exception\CouldNotDeleteException::class);
        $this->expectExceptionMessage('You cannot delete this tax class because it is used in' .
            ' Tax Rules. You have to delete the rules it is used in first.');
        $model->delete();
    }

    /**
     * @magentoAppIsolation enabled
     * @magentoDataFixture Magento/Tax/_files/tax_classes.php
     */
    public function testCheckClassCanBeDeletedProductClassUsedInTaxRule()
    {
        /** @var $registry \Magento\Framework\Registry */
        $registry = $this->_objectManager->get(\Magento\Framework\Registry::class);
        /** @var $taxRule \Magento\Tax\Model\Calculation\Rule */
        $taxRule = $registry->registry('_fixture/Magento_Tax_Model_Calculation_Rule');
        $productClasses = $taxRule->getProductTaxClasses();

        /** @var $model \Magento\Tax\Model\ClassModel */
        $model = $this->_objectManager->create(\Magento\Tax\Model\ClassModel::class)->load($productClasses[0]);
        $this->expectException(\Magento\Framework\Exception\CouldNotDeleteException::class);
        $this->expectExceptionMessage('You cannot delete this tax class because it is used in' .
            ' Tax Rules. You have to delete the rules it is used in first.');
        $model->delete();
    }
}
