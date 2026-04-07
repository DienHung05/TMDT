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

namespace Magento\Translation\Model;

class StringTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Magento\Translation\Model\StringUtils
     */
    protected $_model;

    protected function setUp(): void
    {
        $this->_model = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
            \Magento\Translation\Model\StringUtils::class
        );
    }

    public function testConstructor()
    {
        $this->assertInstanceOf(
            \Magento\Translation\Model\ResourceModel\StringUtils::class,
            $this->_model->getResource()
        );
    }

    public function testSetGetString()
    {
        $expectedString = __METHOD__;
        $this->_model->setString($expectedString);
        $actualString = $this->_model->getString();
        $this->assertEquals($expectedString, $actualString);
    }
}
