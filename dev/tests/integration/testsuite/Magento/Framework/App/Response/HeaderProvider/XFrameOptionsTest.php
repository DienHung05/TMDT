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
namespace Magento\Framework\App\Response\HeaderProvider;

class XFrameOptionsTest extends AbstractHeaderTestCase
{
    public function testHeaderPresent()
    {
        $this->assertHeaderPresent('X-Frame-Options', 'SAMEORIGIN');
    }
}
