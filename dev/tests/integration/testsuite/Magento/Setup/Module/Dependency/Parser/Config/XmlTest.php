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
namespace Magento\Setup\Module\Dependency\Parser\Config;

class XmlTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var string
     */
    protected $fixtureDir;

    /**
     * @var Xml
     */
    protected $parser;

    protected function setUp(): void
    {
        $this->fixtureDir = realpath(__DIR__ . '/../../_files') . '/';

        $this->parser = new Xml();
    }

    public function testParse()
    {
        $expected = [
            'Magento\Module1',
            'Magento\Module2',
        ];

        $actual = $this->parser->parse(
            ['files_for_parse' => [$this->fixtureDir . 'module1.xml', $this->fixtureDir . 'module2.xml']]
        );

        $this->assertEquals($expected, $actual);
    }
}
