<?php
/**
<<<<<<< HEAD
 * Copyright 2013 Adobe
 * All Rights Reserved.
 */
namespace Magento\Downloadable\Block\Adminhtml\Catalog\Product\Edit\Tab\Downloadable;

use PHPUnit\Framework\Attributes\DataProvider;

=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Downloadable\Block\Adminhtml\Catalog\Product\Edit\Tab\Downloadable;

>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
/**
 * Class LinksTest
 *
 * @package Magento\Downloadable\Block\Adminhtml\Catalog\Product\Edit\Tab\Downloadable
 * @deprecated
 * @see \Magento\Downloadable\Ui\DataProvider\Product\Form\Modifier\Links
 */
class LinksTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @magentoAppArea adminhtml
     */
    public function testGetUploadButtonsHtml()
    {
        $block = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->get(
            \Magento\Framework\View\LayoutInterface::class
        )->createBlock(
            \Magento\Downloadable\Block\Adminhtml\Catalog\Product\Edit\Tab\Downloadable\Links::class
        );
        self::performUploadButtonTest($block);
    }

    /**
     * Reuse code for testing getUploadButtonHtml()
     *
     * @param \Magento\Framework\View\Element\AbstractBlock $block
     */
    public static function performUploadButtonTest(\Magento\Framework\View\Element\AbstractBlock $block)
    {
        /** @var $layout \Magento\Framework\View\LayoutInterface */
        $layout = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
            \Magento\Framework\View\Layout::class
        );
        $layout->addBlock($block, 'links');
        $expected = uniqid();
        $text = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->get(
            \Magento\Framework\View\LayoutInterface::class
        )->createBlock(
            \Magento\Framework\View\Element\Text::class,
            '',
            ['data' => ['text' => $expected]]
        );
        $block->unsetChild('upload_button');
        $layout->addBlock($text, 'upload_button', 'links');
        self::assertEquals($expected, $block->getUploadButtonHtml());
    }

    /**
     * @magentoAppArea adminhtml
     * @magentoAppIsolation enabled
     */
    public function testGetLinkData()
    {
        /** @var $objectManager \Magento\TestFramework\ObjectManager */
        $objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();
        $objectManager->get(
            \Magento\Framework\Registry::class
        )->register(
            'product',
            new \Magento\Framework\DataObject(['type_id' => 'simple'])
        );
        $block = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->get(
            \Magento\Framework\View\LayoutInterface::class
        )->createBlock(
            \Magento\Downloadable\Block\Adminhtml\Catalog\Product\Edit\Tab\Downloadable\Links::class
        );
        $this->assertEmpty($block->getLinkData());
    }

    /**
     * Get Links Title for simple/virtual/downloadable product
     *
     * @magentoConfigFixture current_store catalog/downloadable/links_title Links Title Test
     * @magentoAppIsolation enabled
<<<<<<< HEAD
=======
     * @dataProvider productLinksTitleDataProvider
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     *
     * @magentoAppArea adminhtml
     * @param string $productType
     * @param string $linksTitle
     * @param string $expectedResult
     */
<<<<<<< HEAD
    #[DataProvider('productLinksTitleDataProvider')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testGetLinksTitle($productType, $linksTitle, $expectedResult)
    {
        /** @var $objectManager \Magento\TestFramework\ObjectManager */
        $objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();
        $objectManager->get(
            \Magento\Framework\Registry::class
        )->register(
            'product',
            new \Magento\Framework\DataObject(['type_id' => $productType, 'id' => '1', 'links_title' => $linksTitle])
        );
        $block = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->get(
            \Magento\Framework\View\LayoutInterface::class
        )->createBlock(
            \Magento\Downloadable\Block\Adminhtml\Catalog\Product\Edit\Tab\Downloadable\Links::class
        );
        $this->assertEquals($expectedResult, $block->getLinksTitle());
    }

    /**
     * Data Provider with product types
     *
     * @return array
     */
<<<<<<< HEAD
    public static function productLinksTitleDataProvider()
=======
    public function productLinksTitleDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            ['simple', null, 'Links Title Test'],
            ['simple', 'Links Title', 'Links Title Test'],
            ['virtual', null, 'Links Title Test'],
            ['virtual', 'Links Title', 'Links Title Test'],
            ['downloadable', null, null],
            ['downloadable', 'Links Title', 'Links Title']
        ];
    }
}
