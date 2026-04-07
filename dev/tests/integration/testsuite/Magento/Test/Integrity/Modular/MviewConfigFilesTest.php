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
namespace Magento\Test\Integrity\Modular;

use Magento\Framework\App\Filesystem\DirectoryList;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

class MviewConfigFilesTest extends \PHPUnit\Framework\TestCase
{
    /**
     * Configuration acl file list
     *
     * @var array
     */
    protected $fileList = [];

    /**
     * Path to scheme file
     *
     * @var string
     */
    protected $schemaFile;

    protected function setUp(): void
    {
        $urnResolver = new \Magento\Framework\Config\Dom\UrnResolver();
        $this->schemaFile = $urnResolver->getRealPath('urn:magento:framework:Mview/etc/mview.xsd');
    }

    /**
     * Test each acl configuration file
     * @param string $file
<<<<<<< HEAD
     */
    #[DataProvider('mviewConfigFileDataProvider')]
=======
     * @dataProvider mviewConfigFileDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testIndexerConfigFile($file)
    {
        $validationStateMock = $this->createMock(\Magento\Framework\Config\ValidationStateInterface::class);
        $validationStateMock->method('isValidationRequired')
            ->willReturn(true);
        $domConfig = new \Magento\Framework\Config\Dom(file_get_contents($file), $validationStateMock);
        $result = $domConfig->validate($this->schemaFile, $errors);
        $message = "Invalid XML-file: {$file}\n";
        foreach ($errors as $error) {
            $message .= "{$error}\n";
        }
        $this->assertTrue($result, $message);
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function mviewConfigFileDataProvider()
=======
    public function mviewConfigFileDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return \Magento\Framework\App\Utility\Files::init()->getConfigFiles('mview.xml');
    }
}
