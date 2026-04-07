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

namespace Magento\Framework\Model\ResourceModel\Db;

class AbstractTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Magento\Framework\Model\ResourceModel\Db\AbstractDb
     */
    protected $_model;

    protected function setUp(): void
    {
        $resource = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->get(
            \Magento\Framework\App\ResourceConnection::class
        );
        $context = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
            \Magento\Framework\Model\ResourceModel\Db\Context::class,
            ['resource' => $resource]
        );
<<<<<<< HEAD
        $this->_model = $this->getMockBuilder(\Magento\Framework\Model\ResourceModel\Db\AbstractDb::class)
            ->setConstructorArgs(['context' => $context])
            ->onlyMethods(['_construct'])
            ->getMock();
=======
        $this->_model = $this->getMockForAbstractClass(
            \Magento\Framework\Model\ResourceModel\Db\AbstractDb::class,
            ['context' => $context]
        );
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }

    public function testConstruct()
    {
        $resourceProperty = new \ReflectionProperty(get_class($this->_model), '_resources');
<<<<<<< HEAD
=======
        $resourceProperty->setAccessible(true);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $this->assertInstanceOf(
            \Magento\Framework\App\ResourceConnection::class,
            $resourceProperty->getValue($this->_model)
        );
    }

    public function testSetMainTable()
    {
        $setMainTableMethod = new \ReflectionMethod($this->_model, '_setMainTable');
<<<<<<< HEAD
=======
        $setMainTableMethod->setAccessible(true);

>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $tableName = $this->_model->getTable('store_website');
        $idFieldName = 'website_id';

        $setMainTableMethod->invoke($this->_model, $tableName);
        $this->assertEquals($tableName, $this->_model->getMainTable());

        $setMainTableMethod->invoke($this->_model, $tableName, $idFieldName);
        $this->assertEquals($tableName, $this->_model->getMainTable());
        $this->assertEquals($idFieldName, $this->_model->getIdFieldName());
    }

    public function testGetTableName()
    {
        $tableNameOrig = 'store_website';
        $tableSuffix = 'suffix';
        $resource = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
            \Magento\Framework\App\ResourceConnection::class,
            ['tablePrefix' => 'prefix_']
        );
        $context = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
            \Magento\Framework\Model\ResourceModel\Db\Context::class,
            ['resource' => $resource]
        );

<<<<<<< HEAD
        $model = $this->getMockBuilder(\Magento\Framework\Model\ResourceModel\Db\AbstractDb::class)
            ->setConstructorArgs(['context' => $context])
            ->onlyMethods(['_construct'])
            ->getMock();
=======
        $model = $this->getMockForAbstractClass(
            \Magento\Framework\Model\ResourceModel\Db\AbstractDb::class,
            ['context' => $context]
        );
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

        $tableName = $model->getTable([$tableNameOrig, $tableSuffix]);
        $this->assertEquals('prefix_store_website_suffix', $tableName);
    }
}
