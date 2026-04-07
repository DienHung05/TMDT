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

/**
 * Test class for \Magento\Cms\Controller\Page.
 */

namespace Magento\Cms\Controller\Noroute;

class IndexTest extends \Magento\TestFramework\TestCase\AbstractController
{
    /**
     * @magentoDbIsolation enabled
     * @magentoDataFixture Magento/Cms/_files/noroute.php
     */
    public function testDisabledNoRoutePage()
    {
        $this->dispatch('/test123');
        $this->assertStringContainsString(
            'There was no 404 CMS page configured or found.',
            $this->getResponse()->getBody()
        );
    }
}
