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
class ViewConfigFilesTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @param string $file
<<<<<<< HEAD
     */
    #[DataProvider('viewConfigFileDataProvider')]
=======
     * @dataProvider viewConfigFileDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testViewConfigFile($file)
    {
        $validationStateMock = $this->createMock(\Magento\Framework\Config\ValidationStateInterface::class);
        $validationStateMock->method('isValidationRequired')
            ->willReturn(true);
        $domConfig = new \Magento\Framework\Config\Dom($file, $validationStateMock);
        $urnResolver = new \Magento\Framework\Config\Dom\UrnResolver();
        $result = $domConfig->validate(
            $urnResolver->getRealPath('urn:magento:framework:Config/etc/view.xsd'),
            $errors
        );
        $message = "Invalid XML-file: {$file}\n";
        foreach ($errors as $error) {
            $message .= "{$error->message} Line: {$error->line}\n";
        }
        $this->assertTrue($result, $message);
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function viewConfigFileDataProvider()
=======
    public function viewConfigFileDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        $result = [];
        $files = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->get(
            \Magento\Framework\Module\Dir\Reader::class
        )->getConfigurationFiles(
            'view.xml'
        );
        foreach ($files as $file) {
            $result[] = [$file];
        }
        return $result;
    }
}
