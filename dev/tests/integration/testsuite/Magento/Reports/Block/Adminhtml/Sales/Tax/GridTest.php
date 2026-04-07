<?php
/**
<<<<<<< HEAD
 * Copyright 2013 Adobe
 * All Rights Reserved.
 */
namespace Magento\Reports\Block\Adminhtml\Sales\Tax;

use PHPUnit\Framework\Attributes\Depends;

=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Reports\Block\Adminhtml\Sales\Tax;

>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
/**
 * @magentoAppArea adminhtml
 */
class GridTest extends \PHPUnit\Framework\TestCase
{
    /**
     * Creates and inits block
     *
     * @param string|null $reportType
     * @return \Magento\Reports\Block\Adminhtml\Sales\Tax\Grid
     */
    protected function _createBlock($reportType = null)
    {
        $block = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->get(
            \Magento\Framework\View\LayoutInterface::class
        )->createBlock(
            \Magento\Reports\Block\Adminhtml\Sales\Tax\Grid::class
        );

        $filterData = new \Magento\Framework\DataObject();
        if ($reportType) {
            $filterData->setReportType($reportType);
        }
        $block->setFilterData($filterData);

        return $block;
    }

    /**
     * @return string
     */
    public function testGetResourceCollectionNameNormal()
    {
        $block = $this->_createBlock();
        $normalCollection = $block->getResourceCollectionName();
        $this->assertTrue(class_exists($normalCollection));

        return $normalCollection;
    }

    /**
<<<<<<< HEAD
     * @param  string $normalCollection
     */
    #[Depends('testGetResourceCollectionNameNormal')]
=======
     * @depends testGetResourceCollectionNameNormal
     * @param  string $normalCollection
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testGetResourceCollectionNameWithFilter($normalCollection)
    {
        $block = $this->_createBlock('updated_at_order');
        $filteredCollection = $block->getResourceCollectionName();
        $this->assertTrue(class_exists($filteredCollection));

        $this->assertNotEquals($normalCollection, $filteredCollection);
    }
}
