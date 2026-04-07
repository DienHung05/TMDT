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
namespace Magento\Framework\Pricing\Helper;

class DataTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Magento\Framework\Pricing\Helper\Data
     */
    protected $helper;

    protected function setUp(): void
    {
        $this->helper = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->get(
            \Magento\Framework\Pricing\Helper\Data::class
        );
    }

    public function testCurrency()
    {
        $price = 10.00;
        $priceHtml = '<span class="price">$10.00</span>';
        $this->assertEquals($priceHtml, $this->helper->currency($price));
    }
}
