<?php
/**
<<<<<<< HEAD
 * Copyright 2013 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
namespace Magento\Newsletter\Model;

use Magento\Framework\App\TemplateTypesInterface;
use Magento\Framework\View\DesignInterface;
use Magento\Store\Model\ScopeInterface;
use Magento\TestFramework\Helper\Bootstrap;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * @magentoDataFixture Magento/Store/_files/core_fixturestore.php
 */
class TemplateTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Magento\Newsletter\Model\Template
     */
    protected $_model = null;

    protected function setUp(): void
    {
        $this->_model = Bootstrap::getObjectManager()->create(
            \Magento\Newsletter\Model\Template::class
        );
    }

    /**
     * This test expects next themes for areas:
     * current_store design/theme/full_name Magento/luma
     * fixturestore_store design/theme/full_name Magento/blank
     *
     * @magentoAppIsolation  enabled
     * @magentoAppArea adminhtml
<<<<<<< HEAD
     */
    #[DataProvider('getProcessedTemplateFrontendDataProvider')]
=======
     * @dataProvider getProcessedTemplateFrontendDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testGetProcessedTemplateFrontend($store, $design)
    {
        $this->_model->setTemplateText('{{view url="Magento_Theme::favicon.ico"}}');
        if ($store != 'default') {
            Bootstrap::getObjectManager()->get(
                \Magento\Framework\App\Config\MutableScopeConfigInterface::class
            )->setValue(
                \Magento\Theme\Model\View\Design::XML_PATH_THEME_ID,
                $design,
                'store',
                $store
            );
        }
        $this->_model->emulateDesign($store, 'frontend');
        $processedTemplate = Bootstrap::getObjectManager()->get(
            \Magento\Framework\App\State::class
        )->emulateAreaCode(
            'frontend',
            [$this->_model, 'getProcessedTemplate']
        );
        $expectedTemplateText = "frontend/{$design}/en_US/Magento_Theme/favicon.ico";
        $this->assertStringEndsWith($expectedTemplateText, $processedTemplate);
        $this->_model->revertDesign();
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function getProcessedTemplateFrontendDataProvider()
=======
    public function getProcessedTemplateFrontendDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            'frontend' => ['default', 'Magento/luma'],
            'frontend store' => ['fixturestore', 'Magento/blank']
        ];
    }

    /**
     * This test expects next themes for areas:
     * adminhtml/design/theme/full_name Magento/backend
     *
     * @magentoAppIsolation  enabled
<<<<<<< HEAD
     */
    #[DataProvider('getProcessedTemplateAreaDataProvider')]
=======
     * @dataProvider getProcessedTemplateAreaDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testGetProcessedTemplateArea($area, $design)
    {
        $this->_model->setTemplateText('{{view url="Magento_Theme::favicon.ico"}}');
        $this->_model->emulateDesign('default', $area);
        $processedTemplate = Bootstrap::getObjectManager()->get(
            \Magento\Framework\App\State::class
        )->emulateAreaCode(
            $area,
            [$this->_model, 'getProcessedTemplate']
        );
        $expectedTemplateText = "{$area}/{$design}/en_US/Magento_Theme/favicon.ico";
        $this->assertStringEndsWith($expectedTemplateText, $processedTemplate);
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function getProcessedTemplateAreaDataProvider()
=======
    public function getProcessedTemplateAreaDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        $designTheme = Bootstrap::getObjectManager()
            ->get(DesignInterface::class)
            ->getConfigurationDesignTheme('adminhtml');
        return [
            'backend' => ['adminhtml', $designTheme]
        ];
    }

    /**
     * @magentoConfigFixture current_store system/smtp/disable 0
     * @magentoAppIsolation enabled
<<<<<<< HEAD
     */
    #[DataProvider('isValidToSendDataProvider')]
=======
     * @dataProvider isValidToSendDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testIsValidToSend($senderEmail, $senderName, $subject, $isValid)
    {
        $this->_model->setTemplateSenderEmail(
            $senderEmail
        )->setTemplateSenderName(
            $senderName
        )->setTemplateSubject(
            $subject
        );
        $this->assertSame($isValid, $this->_model->isValidForSend());
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function isValidToSendDataProvider()
=======
    public function isValidToSendDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            ['john.doe@example.com', 'john.doe', 'Test Subject', true],
            ['john.doe@example.com', 'john.doe', '', false],
            ['john.doe@example.com', '', 'Test Subject', false],
            ['john.doe@example.com', '', '', false],
            ['', 'john.doe', 'Test Subject', false],
            ['', '', 'Test Subject', false],
            ['', 'john.doe', '', false],
            ['', '', '', false]
        ];
    }

    /**
     * @magentoAppIsolation enabled
     * @magentoDbIsolation enabled
     */
    public function testLegacyTemplateFromDbLoadsInStrictMode()
    {
        $objectManager = Bootstrap::getObjectManager();

        $this->_model->setTemplateType(TemplateTypesInterface::TYPE_HTML);
        $templateText = '{{var store.isSaveAllowed()}} - {{template config_path="foobar"}}';
        $this->_model->setTemplateText($templateText);
        $this->_model->setTemplateId('abc');

        $template = $objectManager->create(\Magento\Email\Model\Template::class);
        $templateData = [
            'template_code' => 'some_unique_code',
            'template_type' => TemplateTypesInterface::TYPE_HTML,
            'template_text' => '{{var this.template_code}}'
                . ' - {{var store.isSaveAllowed()}} - {{var this.getTemplateCode()}}',
        ];
        $template->setData($templateData);
        $template->save();

        // Store the ID of the newly created template in the system config so that this template will be loaded
        $objectManager->get(\Magento\Framework\App\Config\MutableScopeConfigInterface::class)
            ->setValue('foobar', $template->getId(), ScopeInterface::SCOPE_STORE, 'default');

        $this->_model->emulateDesign('default', 'frontend');
        $processedTemplate = Bootstrap::getObjectManager()->get(
            \Magento\Framework\App\State::class
        )->emulateAreaCode(
            'frontend',
            [$this->_model, 'getProcessedTemplate']
        );
        self::assertEquals(' - some_unique_code -  - some_unique_code', $processedTemplate);
    }

    /**
     * @magentoAppIsolation enabled
     * @magentoDbIsolation enabled
     */
    public function testTemplateFromDbLoadsInStrictMode()
    {
        $objectManager = Bootstrap::getObjectManager();

        $this->_model->setTemplateType(TemplateTypesInterface::TYPE_HTML);
        $templateText = '{{var store.isSaveAllowed()}} - {{template config_path="foobar"}}';
        $this->_model->setTemplateText($templateText);
        $this->_model->setTemplateId('abc');

        $template = $objectManager->create(\Magento\Email\Model\Template::class);
        $templateData = [
            'template_code' => 'some_unique_code',
            'template_type' => TemplateTypesInterface::TYPE_HTML,
            'template_text' => '{{var this.template_code}}'
                . ' - {{var store.isSaveAllowed()}} - {{var this.getTemplateCode()}}',
        ];
        $template->setData($templateData);
        $template->save();

        // Store the ID of the newly created template in the system config so that this template will be loaded
        $objectManager->get(\Magento\Framework\App\Config\MutableScopeConfigInterface::class)
            ->setValue('foobar', $template->getId(), ScopeInterface::SCOPE_STORE, 'default');

        $this->_model->emulateDesign('default', 'frontend');
        $processedTemplate = Bootstrap::getObjectManager()->get(
            \Magento\Framework\App\State::class
        )->emulateAreaCode(
            'frontend',
            [$this->_model, 'getProcessedTemplate']
        );
        self::assertEquals(' - some_unique_code -  - some_unique_code', $processedTemplate);
    }
}
