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

namespace Magento\Widget\Model\Config;

use Magento\TestFramework\Helper\Bootstrap;

class ReaderTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Magento\Widget\Model\Config\Reader
     */
    private $model;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject
     */
    private $fileResolver;

    protected function setUp(): void
    {
<<<<<<< HEAD
        $this->fileResolver = $this->createMock(\Magento\Framework\Config\FileResolverInterface::class);
=======
        $this->fileResolver = $this->getMockForAbstractClass(\Magento\Framework\Config\FileResolverInterface::class);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $objectManager = Bootstrap::getObjectManager();
        $this->model = $objectManager->create(
            \Magento\Widget\Model\Config\Reader::class,
            ['fileResolver' => $this->fileResolver]
        );
    }

    public function testRead()
    {
        $this->fileResolver->expects($this->once())
            ->method('get')
            ->willReturn([file_get_contents(__DIR__ . '/_files/orders_and_returns.xml')]);
        $expected = include __DIR__ . '/_files/expectedGlobalArray.php';
        $this->assertEquals($expected, $this->model->read('global'));
    }

    public function testReadFile()
    {
        $file = file_get_contents(__DIR__ . '/_files/orders_and_returns.xml');
        $expected = include __DIR__ . '/_files/expectedGlobalArray.php';
        $this->assertEquals($expected, $this->model->readFile($file));
    }

    public function testMergeCompleteAndPartial()
    {
        $fileList = [
            file_get_contents(__DIR__ . '/_files/catalog_new_products_list.xml'),
            file_get_contents(__DIR__ . '/_files/orders_and_returns_customized.xml'),
        ];
        $this->fileResolver->expects($this->once())
            ->method('get')
            ->with('widget.xml', 'global')
            ->willReturn($fileList);
        $expected = include __DIR__ . '/_files/expectedMergedArray.php';
        $this->assertEquals($expected, $this->model->read('global'));
    }
}
