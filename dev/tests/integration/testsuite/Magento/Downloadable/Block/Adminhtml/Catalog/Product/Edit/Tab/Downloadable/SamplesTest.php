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
 * Class SamplesTest
 *
 * @package Magento\Downloadable\Block\Adminhtml\Catalog\Product\Edit\Tab\Downloadable
 * @deprecated
 * @see \Magento\Downloadable\Ui\DataProvider\Product\Form\Modifier\Samples
 */
class SamplesTest extends \PHPUnit\Framework\TestCase
{
    public function testGetUploadButtonsHtml()
    {
        $block = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->get(
            \Magento\Framework\View\LayoutInterface::class
        )->createBlock(
            \Magento\Downloadable\Block\Adminhtml\Catalog\Product\Edit\Tab\Downloadable\Samples::class
        );
        \Magento\Downloadable\Block\Adminhtml\Catalog\Product\Edit\Tab\Downloadable\LinksTest::performUploadButtonTest(
            $block
        );
    }

    /**
     * @magentoAppIsolation enabled
     */
    public function testGetSampleData()
    {
        /** @var $objectManager \Magento\TestFramework\ObjectManager */
        $objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();
        $objectManager->get(
            \Magento\Framework\Registry::class
        )->register(
            'current_product',
            new \Magento\Framework\DataObject(['type_id' => 'simple'])
        );
        $block = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->get(
            \Magento\Framework\View\LayoutInterface::class
        )->createBlock(
            \Magento\Downloadable\Block\Adminhtml\Catalog\Product\Edit\Tab\Downloadable\Samples::class
        );
        $this->assertEmpty($block->getSampleData());
    }

    /**
     * Get Samples Title for simple/virtual/downloadable product
     *
     * @magentoConfigFixture current_store catalog/downloadable/samples_title Samples Title Test
     * @magentoAppIsolation enabled
<<<<<<< HEAD
=======
     * @dataProvider productSamplesTitleDataProvider
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     *
     * @param string $productType
     * @param string $samplesTitle
     * @param string $expectedResult
     */
<<<<<<< HEAD
    #[DataProvider('productSamplesTitleDataProvider')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testGetSamplesTitle($productType, $samplesTitle, $expectedResult)
    {
        /** @var $objectManager \Magento\TestFramework\ObjectManager */
        $objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();
        $objectManager->get(
            \Magento\Framework\Registry::class
        )->register(
            'current_product',
            new \Magento\Framework\DataObject(
                [
                    'type_id' => $productType,
                    'id' => '1',
                    'samples_title' => $samplesTitle,
                ]
            )
        );
        $block = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->get(
            \Magento\Framework\View\LayoutInterface::class
        )->createBlock(
            \Magento\Downloadable\Block\Adminhtml\Catalog\Product\Edit\Tab\Downloadable\Samples::class
        );
        $this->assertEquals($expectedResult, $block->getSamplesTitle());
    }

    /**
     * Data Provider with product types
     *
     * @return array
     */
<<<<<<< HEAD
    public static function productSamplesTitleDataProvider()
=======
    public function productSamplesTitleDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            ['simple', null, 'Samples Title Test'],
            ['simple', 'Samples Title', 'Samples Title Test'],
            ['virtual', null, 'Samples Title Test'],
            ['virtual', 'Samples Title', 'Samples Title Test'],
            ['downloadable', null, null],
            ['downloadable', 'Samples Title', 'Samples Title']
        ];
    }
}
