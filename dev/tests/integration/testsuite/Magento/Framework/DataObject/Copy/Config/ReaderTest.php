<?php
/**
 * \Magento\Framework\DataObject\Copy\Config\Reader
 *
<<<<<<< HEAD
 * Copyright 2015 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
namespace Magento\Framework\DataObject\Copy\Config;

use Magento\TestFramework\Helper\Bootstrap;

class ReaderTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Magento\Framework\DataObject\Copy\Config\Reader
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
            \Magento\Framework\DataObject\Copy\Config\Reader::class,
            ['fileResolver' => $this->fileResolver]
        );
    }

    public function testRead()
    {
        $this->fileResolver->expects($this->once())
            ->method('get')
            ->with('fieldset.xml', 'global')
            ->willReturn([file_get_contents(__DIR__ . '/_files/fieldset.xml')]);
        $expected = include __DIR__ . '/_files/expectedArray.php';
        $this->assertEquals($expected, $this->model->read('global'));
    }

    public function testMergeCompleteAndPartial()
    {
        $fileList = [
            file_get_contents(__DIR__ . '/_files/partialFieldsetFirst.xml'),
            file_get_contents(__DIR__ . '/_files/partialFieldsetSecond.xml'),
        ];
        $this->fileResolver->expects($this->once())
            ->method('get')
            ->with('fieldset.xml', 'global')
            ->willReturn($fileList);
        $expected = [
            'global' => [
                'quote_convert_item' => [
                    'event_id' => ['to_order_item' => "*"],
                    'event_name' => ['to_order_item' => "*"],
                    'event_description' => ['to_order_item' => "complexDescription"],
                ],
            ],
        ];
        $this->assertEquals($expected, $this->model->read('global'));
    }
}
