<?php
/**
<<<<<<< HEAD
 * Copyright 2013 Adobe
 * All Rights Reserved.
 */
namespace Magento\Test\Integrity\Modular\Magento\Sales;

use PHPUnit\Framework\Attributes\DataProvider;

=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Test\Integrity\Modular\Magento\Sales;

>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
class PdfConfigFilesTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @param string $file
<<<<<<< HEAD
     */
    #[DataProvider('fileFormatDataProvider')]
=======
     * @dataProvider fileFormatDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testFileFormat($file)
    {
        /** @var \Magento\Sales\Model\Order\Pdf\Config\SchemaLocator $schemaLocator */
        $schemaLocator = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->get(
            \Magento\Sales\Model\Order\Pdf\Config\SchemaLocator::class
        );
        $schemaFile = $schemaLocator->getPerFileSchema();

        $validationStateMock = $this->createMock(\Magento\Framework\Config\ValidationStateInterface::class);
        $validationStateMock->method('isValidationRequired')
            ->willReturn(true);
        $dom = new \Magento\Framework\Config\Dom(file_get_contents($file), $validationStateMock);
        $result = $dom->validate($schemaFile, $errors);
        $this->assertTrue($result, print_r($errors, true));
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function fileFormatDataProvider()
=======
    public function fileFormatDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return \Magento\Framework\App\Utility\Files::init()->getConfigFiles('pdf.xml');
    }

    public function testMergedFormat()
    {
        $validationState = $this->createMock(\Magento\Framework\Config\ValidationStateInterface::class);
        $validationState->expects($this->any())->method('isValidationRequired')->willReturn(true);

        /** @var \Magento\Sales\Model\Order\Pdf\Config\Reader $reader */
        $reader = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
            \Magento\Sales\Model\Order\Pdf\Config\Reader::class,
            ['validationState' => $validationState]
        );
        try {
            $reader->read();
        } catch (\Exception $e) {
            $this->fail('Merged pdf.xml files do not pass XSD validation: ' . $e->getMessage());
        }
    }
}
