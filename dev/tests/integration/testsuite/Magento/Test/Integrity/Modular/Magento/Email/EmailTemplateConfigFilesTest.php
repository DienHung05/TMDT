<?php
/**
<<<<<<< HEAD
 * Copyright 2013 Adobe
 * All Rights Reserved.
 */
namespace Magento\Test\Integrity\Modular\Magento\Email;

use PHPUnit\Framework\Attributes\DataProvider;

=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Test\Integrity\Modular\Magento\Email;

>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
class EmailTemplateConfigFilesTest extends \PHPUnit\Framework\TestCase
{
    /**
     * Test that email template configuration file matches the format
     *
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
        $urnResolver = new \Magento\Framework\Config\Dom\UrnResolver();
        $schemaFile = $urnResolver->getRealPath('urn:magento:module:Magento_Email:etc/email_templates.xsd');
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
        return \Magento\Framework\App\Utility\Files::init()->getConfigFiles('email_templates.xml');
    }

    /**
     * Test that email template configuration contains references to existing template files
     *
     * @param string $templateId
<<<<<<< HEAD
     */
    #[DataProvider('templateReferenceDataProvider')]
=======
     * @dataProvider templateReferenceDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testTemplateReference($templateId)
    {
        /** @var \Magento\Email\Model\Template\Config $emailConfig */
        $emailConfig = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
            \Magento\Email\Model\Template\Config::class
        );

        $parts = $emailConfig->parseTemplateIdParts($templateId);
        $templateId = $parts['templateId'];

        $designParams = [];
        $theme = $parts['theme'];
        if ($theme) {
            $designParams['theme'] = $theme;
        }

        $templateFilename = $emailConfig->getTemplateFilename($templateId, $designParams);
        $this->assertFileExists($templateFilename, 'Email template file, specified in the configuration, must exist');
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function templateReferenceDataProvider()
=======
    public function templateReferenceDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        $data = [];
        /** @var \Magento\Email\Model\Template\Config $emailConfig */
        $emailConfig = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
            \Magento\Email\Model\Template\Config::class
        );
        foreach ($emailConfig->getAvailableTemplates() as $template) {
            $data[$template['value']] = [$template['value']];
        }
        return $data;
    }

    /**
     * Test that merged configuration of email templates matches the format
     */
    public function testMergedFormat()
    {
        $validationState = $this->createMock(\Magento\Framework\Config\ValidationStateInterface::class);
        $validationState->expects($this->any())->method('isValidationRequired')->willReturn(true);
        /** @var \Magento\Email\Model\Template\Config\Reader $reader */
        $reader = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
            \Magento\Email\Model\Template\Config\Reader::class,
            ['validationState' => $validationState]
        );
        try {
            $reader->read();
        } catch (\Exception $e) {
            $this->fail('Merged email templates configuration does not pass XSD validation: ' . $e->getMessage());
        }
    }
}
