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
class EventConfigFilesTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var string
     */
    protected $_schemaFile;

    protected function setUp(): void
    {
        $objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();
        $this->_schemaFile = $objectManager->get(\Magento\Framework\Event\Config\SchemaLocator::class)->getSchema();
    }

    /**
     * @param string $file
<<<<<<< HEAD
     */
    #[DataProvider('eventConfigFilesDataProvider')]
=======
     * @dataProvider eventConfigFilesDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testEventConfigFiles($file)
    {
        $errors = [];
        $validationStateMock = $this->createMock(\Magento\Framework\Config\ValidationStateInterface::class);
        $validationStateMock->method('isValidationRequired')
            ->willReturn(true);
        $dom = new \Magento\Framework\Config\Dom(file_get_contents($file), $validationStateMock);
        $result = $dom->validate($this->_schemaFile, $errors);
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
    public static function eventConfigFilesDataProvider()
=======
    public function eventConfigFilesDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return \Magento\Framework\App\Utility\Files::init()->getConfigFiles('{*/events.xml,events.xml}');
    }
}
