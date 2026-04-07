<?php
/**
 * \Magento\Persistent\Model\Persistent\Config
 *
<<<<<<< HEAD
 * Copyright 2013 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
namespace Magento\Persistent\Model\Persistent;

use Magento\Framework\App\Filesystem\DirectoryList;

class ConfigTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Magento\Persistent\Model\Persistent\Config
     */
    protected $_model;

    /** @var  \Magento\Framework\ObjectManagerInterface */
    protected $_objectManager;

    protected function setUp(): void
    {
        $directoryList = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
            \Magento\Framework\App\Filesystem\DirectoryList::class,
            ['root' => DirectoryList::ROOT]
        );
        $filesystem = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
            \Magento\Framework\Filesystem::class,
            ['directoryList' => $directoryList]
        );

        $this->_objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();
        $this->_model = $this->_objectManager->create(
            \Magento\Persistent\Model\Persistent\Config::class,
            ['filesystem' => $filesystem]
        );
    }

    public function testCollectInstancesToEmulate()
    {
        $this->_model->setConfigFilePath(__DIR__ . '/_files/persistent.xml');
        $result = $this->_model->collectInstancesToEmulate();
        $expected = include '_files/expectedArray.php';
        $this->assertEquals($expected, $result);
    }

    public function testGetBlockConfigInfo()
    {
        $this->_model->setConfigFilePath(__DIR__ . '/_files/persistent.xml');
        $blocks = $this->_model->getBlockConfigInfo(\Magento\Sales\Block\Reorder\Sidebar::class);
        $expected = include '_files/expectedBlocksArray.php';
        $this->assertEquals($expected, $blocks);
    }

    public function testGetBlockConfigInfoNotConfigured()
    {
        $this->_model->setConfigFilePath(__DIR__ . '/_files/persistent.xml');
        $blocks = $this->_model->getBlockConfigInfo(\Magento\Catalog\Block\Product\Compare\ListCompare::class);
        $this->assertEquals([], $blocks);
    }
}
