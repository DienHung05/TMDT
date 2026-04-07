<?php
/**
<<<<<<< HEAD
 * Copyright 2013 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 *
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
namespace Magento\Widget\Model\Config;

/**
 * @magentoAppArea adminhtml
 */
class DataTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @magentoCache config disabled
     */
    public function testGet()
    {
<<<<<<< HEAD
        $fileResolver = $this->createMock(\Magento\Framework\Config\FileResolverInterface::class);
=======
        $fileResolver = $this->getMockForAbstractClass(\Magento\Framework\Config\FileResolverInterface::class);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $fileResolver->expects($this->exactly(3))->method('get')->willReturnMap([
            ['widget.xml', 'global', [file_get_contents(__DIR__ . '/_files/orders_and_returns.xml')]],
            ['widget.xml', 'adminhtml', []],
            ['widget.xml', 'design', [file_get_contents(__DIR__ . '/_files/orders_and_returns_customized.xml')]],
        ]);
        $objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();
        $reader = $objectManager->create(\Magento\Widget\Model\Config\Reader::class, ['fileResolver' => $fileResolver]);
        /** @var \Magento\Widget\Model\Config\Data $configData */
        $configData = $objectManager->create(\Magento\Widget\Model\Config\Data::class, ['reader' => $reader]);
        $result = $configData->get();
        $expected = include '_files/expectedGlobalDesignArray.php';
        $this->assertEquals($expected, $result);
    }
}
