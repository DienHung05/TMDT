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
namespace Magento\CatalogSearch\Block;

class TermTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Magento\Search\Block\Term
     */
    protected $_block;

    protected function setUp(): void
    {
        $this->_block = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->get(
            \Magento\Framework\View\LayoutInterface::class
        )->createBlock(
            \Magento\Search\Block\Term::class
        );
    }

    public function testGetSearchUrl()
    {
        $query = uniqid();
        $obj = new \Magento\Framework\DataObject(['query_text' => $query]);
        $this->assertStringEndsWith("/catalogsearch/result/?q={$query}", $this->_block->getSearchUrl($obj));
    }
}
