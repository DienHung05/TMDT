<?php
/**
 * Test case for \Magento\Framework\Profiler
 *
<<<<<<< HEAD
 * Copyright 2016 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
namespace Magento\Framework\Reflection;

use Magento\TestFramework\Helper\CacheCleaner;

class MethodsMapTest extends \PHPUnit\Framework\TestCase
{
    /** @var \Magento\Framework\Reflection\MethodsMap */
    private $object;

    protected function setUp(): void
    {
        $objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();
        $this->object = $objectManager->create(
            \Magento\Framework\Reflection\MethodsMap::class
        );
    }

    public function testGetMethodsMap()
    {
        $data = $this->object->getMethodsMap(\Magento\Framework\Reflection\MethodsMap::class);
        $this->assertArrayHasKey('getMethodsMap', $data);
        $cachedData = $this->object->getMethodsMap(\Magento\Framework\Reflection\MethodsMap::class);
        $this->assertEquals($data, $cachedData);
    }

    public function testGetMethodParams()
    {
        $data = $this->object->getMethodParams(
            \Magento\Framework\Reflection\MethodsMap::class,
            'getMethodParams'
        );
        $this->assertCount(2, $data);
        $cachedData = $this->object->getMethodParams(
            \Magento\Framework\Reflection\MethodsMap::class,
            'getMethodParams'
        );
        $this->assertEquals($data, $cachedData);
    }
}
