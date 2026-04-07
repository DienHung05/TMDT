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
declare(strict_types=1);

namespace Magento\Setup\Test\Unit\Module\Dependency\Parser;

use Magento\Framework\TestFramework\Unit\Helper\ObjectManager;
use Magento\Setup\Module\Dependency\Parser\Code;
use PHPUnit\Framework\TestCase;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

class CodeTest extends TestCase
{
    /**
     * @var Code
     */
    protected $parser;

    protected function setUp(): void
    {
        $objectManagerHelper = new ObjectManager($this);
        $this->parser = $objectManagerHelper->getObject(Code::class);
    }

    /**
     * @param array $options
<<<<<<< HEAD
     */
    #[DataProvider('dataProviderWrongOptionFilesForParse')]
=======
     * @dataProvider dataProviderWrongOptionFilesForParse
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testParseWithWrongOptionFilesForParse($options)
    {
        $this->expectException('InvalidArgumentException');
        $this->expectExceptionMessage('Parse error: Option "files_for_parse" is wrong.');
        $this->parser->parse($options);
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function dataProviderWrongOptionFilesForParse()
=======
    public function dataProviderWrongOptionFilesForParse()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            [['files_for_parse' => [], 'declared_namespaces' => [1, 2]]],
            [['files_for_parse' => 'sting', 'declared_namespaces' => [1, 2]]],
            [['there_are_no_files_for_parse' => [1, 3], 'declared_namespaces' => [1, 2]]]
        ];
    }

    /**
     * @param array $options
<<<<<<< HEAD
     */
    #[DataProvider('dataProviderWrongOptionDeclaredNamespace')]
=======
     * @dataProvider dataProviderWrongOptionDeclaredNamespace
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testParseWithWrongOptionDeclaredNamespace($options)
    {
        $this->expectException('InvalidArgumentException');
        $this->expectExceptionMessage('Parse error: Option "declared_namespaces" is wrong.');
        $this->parser->parse($options);
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function dataProviderWrongOptionDeclaredNamespace()
=======
    public function dataProviderWrongOptionDeclaredNamespace()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            [['declared_namespaces' => [], 'files_for_parse' => [1, 2]]],
            [['declared_namespaces' => 'sting', 'files_for_parse' => [1, 2]]],
            [['there_are_no_declared_namespaces' => [1, 3], 'files_for_parse' => [1, 2]]]
        ];
    }
}
