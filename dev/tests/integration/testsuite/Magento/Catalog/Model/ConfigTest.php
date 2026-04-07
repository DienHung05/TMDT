<?php
/**
<<<<<<< HEAD
 * Copyright 2016 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
namespace Magento\Catalog\Model;

use Magento\Catalog\Model\Config;
use Magento\TestFramework\ObjectManager;
use Magento\TestFramework\Helper\Bootstrap;
use Magento\TestFramework\Helper\CacheCleaner;

class ConfigTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var Config
     */
    private $config;
    
    /**
     * @var ObjectManager
     */
    private $objectManager;
    
    protected function setUp(): void
    {
        $this->objectManager = Bootstrap::getObjectManager();
        $this->config = $this->objectManager->get(Config::class);
    }

    public function testGetEntityAttributeCodes()
    {
        $entityType = 'catalog_product';
        $this->assertEquals(
            $this->config->getEntityAttributeCodes($entityType),
            $this->config->getEntityAttributeCodes($entityType)
        );
    }

    public function testGetAttribute()
    {
        $entityType = 'catalog_product';
        $attributeCode = 'color';
        $this->assertEquals(
            $this->config->getAttribute($entityType, $attributeCode),
            $this->config->getAttribute($entityType, $attributeCode)
        );
    }

    public function testGetEntityType()
    {
        $entityType = 'catalog_product';
        $this->assertEquals(
            $this->config->getEntityType($entityType),
            $this->config->getEntityType($entityType)
        );
    }
}
