<?php
/**
<<<<<<< HEAD
 * Copyright 2014 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
namespace Magento\Framework\Search\Request\Config;

class ConverterTest extends \PHPUnit\Framework\TestCase
{
    /** @var  Converter */
    protected $object;

    protected function setUp(): void
    {
        $this->object = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()
            ->create(\Magento\Framework\Search\Request\Config\Converter::class);
    }

    public function testConvert()
    {
        $document = new \DOMDocument();
        $document->load(__DIR__ . '../../../_files/search_request.xml');
        $result = $this->object->convert($document);
        $expected = include __DIR__ . '/../../_files/search_request_config.php';
        $this->assertEquals($expected, $result);
    }
}
