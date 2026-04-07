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
namespace Magento\PageCache\Block\System\Config\Form\Field;

/**
 * @magentoAppArea adminhtml
 */
class ExportTest extends \Magento\TestFramework\TestCase\AbstractBackendController
{
    /**
     * Check Varnish export buttons
     * @covers \Magento\PageCache\Block\System\Config\Form\Field\Export::_getElementHtml
<<<<<<< HEAD
=======
     * @covers \Magento\PageCache\Block\System\Config\Form\Field\Export\Varnish5::getVarnishVersion
     * @covers \Magento\PageCache\Block\System\Config\Form\Field\Export\Varnish4::getVarnishVersion
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @magentoAppIsolation enabled
     * @magentoDbIsolation enabled
     */
    public function testExportButtons()
    {
        $this->dispatch('backend/admin/system_config/edit/section/system/');
        $body = $this->getResponse()->getBody();
<<<<<<< HEAD
=======
        $this->assertStringContainsString('system_full_page_cache_varnish_export_button_version4', $body);
        $this->assertStringContainsString('system_full_page_cache_varnish_export_button_version5', $body);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $this->assertStringContainsString('[id^=system_full_page_cache_varnish_export_button_version]', $body);
    }
}
