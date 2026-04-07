<?php
/**
<<<<<<< HEAD
 * Copyright 2015 Adobe
 * All Rights Reserved.
 */
namespace Magento\Payment\Block\Transparent;

use PHPUnit\Framework\Attributes\DataProvider;

=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Payment\Block\Transparent;

>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
/**
 * Test for \Magento\Payment\Block\Transparent\Iframe
 */
class IframeTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @magentoAppIsolation enabled
     * @magentoAppArea frontend
<<<<<<< HEAD
     */
    #[DataProvider('xssDataProvider')]
=======
     * @dataProvider xssDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testToHtml($xssString)
    {
        /** @var $block Iframe */
        $block = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->get(
            \Magento\Framework\View\LayoutInterface::class
        )->createBlock(
            \Magento\Payment\Block\Transparent\Iframe::class
        );

        $block->setTemplate('transparent/iframe.phtml');
        $block->setData(
            'params',
            [
                'redirect' => $xssString,
                'redirect_parent' => $xssString,
                'error_msg' => $xssString
            ]
        );

        $content = $block->toHtml();

        $this->assertStringNotContainsString($xssString, $content, 'Params must be escaped');
        $this->assertStringContainsString($block->escapeJs($xssString), $content, 'Content must be present');
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function xssDataProvider(): array
=======
    public function xssDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            ['</script><script>alert("XSS")</script>'],
            ['javascript%3Aalert%28String.fromCharCode%280x78%29%2BString.fromCharCode%280x73%29%2BString.'
                . 'fromCharCode%280x73%29%29'],
            ['javascript:alert(String.fromCharCode(0x78)+String.fromCharCode(0x73)+String.fromCharCode(0x73))']
        ];
    }
}
