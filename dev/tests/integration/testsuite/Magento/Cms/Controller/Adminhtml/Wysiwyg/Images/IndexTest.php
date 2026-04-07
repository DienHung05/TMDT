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

namespace Magento\Cms\Controller\Adminhtml\Wysiwyg\Images;

class IndexTest extends \Magento\TestFramework\TestCase\AbstractBackendController
{
    public function testViewAction()
    {
        $this->dispatch('backend/cms/wysiwyg_images/index/target_element_id/page_content/store/undefined/type/image/');
        $content = $this->getResponse()->getBody();
        $this->assertStringNotContainsString('<html', $content);
        $this->assertStringNotContainsString('<head', $content);
        $this->assertStringNotContainsString('<body', $content);
    }
}
