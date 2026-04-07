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
namespace Magento\Widget\Model\Template;

class FilterTest extends \PHPUnit\Framework\TestCase
{
    public function testMediaDirective()
    {
        $image = 'wysiwyg/VB.png';
        $construction = ['{{media url="' . $image . '"}}', 'media', ' url="' . $image . '"'];
        $baseUrl = 'http://localhost/media/';

        /** @var \Magento\Widget\Model\Template\Filter $filter */
        $filter = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
            \Magento\Widget\Model\Template\Filter::class
        );
        $result = $filter->mediaDirective($construction);
        $this->assertEquals($baseUrl . $image, $result);
    }

    public function testMediaDirectiveWithEncodedQuotes()
    {
        $image = 'wysiwyg/VB.png';
        $construction = ['{{media url=&quot;' . $image . '&quot;}}', 'media', ' url=&quot;' . $image . '&quot;'];
        $baseUrl = 'http://localhost/media/';

        /** @var \Magento\Widget\Model\Template\Filter $filter */
        $filter = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
            \Magento\Widget\Model\Template\Filter::class
        );
        $result = $filter->mediaDirective($construction);
        $this->assertEquals($baseUrl . $image, $result);
    }
}
