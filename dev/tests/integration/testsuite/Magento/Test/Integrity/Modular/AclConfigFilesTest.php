<?php
/**
<<<<<<< HEAD
 * Copyright 2013 Adobe
 * All Rights Reserved.
 */
namespace Magento\Test\Integrity\Modular;

use PHPUnit\Framework\Attributes\DataProvider;

=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Test\Integrity\Modular;

>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
class AclConfigFilesTest extends \PHPUnit\Framework\TestCase
{
    /**
     * Configuration acl file list
     *
     * @var array
     */
    protected $_fileList = [];

    /**
     * Path to scheme file
     *
     * @var string
     */
    protected $_schemeFile;

    protected function setUp(): void
    {
        $urnResolver = new \Magento\Framework\Config\Dom\UrnResolver();
        $this->_schemeFile = $urnResolver->getRealPath('urn:magento:framework:Acl/etc/acl.xsd');
    }

    /**
     * Test each acl configuration file
     * @param string $file
<<<<<<< HEAD
     */
    #[DataProvider('aclConfigFileDataProvider')]
=======
     * @dataProvider aclConfigFileDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testAclConfigFile($file)
    {
        $validationStateMock = $this->createMock(\Magento\Framework\Config\ValidationStateInterface::class);
        $validationStateMock->method('isValidationRequired')
            ->willReturn(true);
        $domConfig = new \Magento\Framework\Config\Dom(file_get_contents($file), $validationStateMock);
        $result = $domConfig->validate($this->_schemeFile, $errors);
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
    public static function aclConfigFileDataProvider()
=======
    public function aclConfigFileDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return \Magento\Framework\App\Utility\Files::init()->getConfigFiles('acl.xml');
    }
}
