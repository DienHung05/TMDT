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
namespace Magento\Framework\Url\Helper;

class DataTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Magento\Framework\Url\Helper\Data
     */
    protected $_helper = null;

    protected function setUp(): void
    {
        $this->_helper = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->get(
            \Magento\Framework\Url\Helper\Data::class
        );
    }

    public function testGetCurrentBase64Url()
    {
<<<<<<< HEAD
        $this->assertEquals('aHR0cDovL2xvY2FsaG9zdDo4MS8~', $this->_helper->getCurrentBase64Url());
=======
        $this->assertEquals('aHR0cDovL2xvY2FsaG9zdDo4MS8,', $this->_helper->getCurrentBase64Url());
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }

    public function testGetEncodedUrl()
    {
<<<<<<< HEAD
        $this->assertEquals('aHR0cDovL2xvY2FsaG9zdDo4MS8~', $this->_helper->getEncodedUrl());
        $this->assertEquals('aHR0cDovL2V4YW1wbGUuY29tLw~~', $this->_helper->getEncodedUrl('http://example.com/'));
=======
        $this->assertEquals('aHR0cDovL2xvY2FsaG9zdDo4MS8,', $this->_helper->getEncodedUrl());
        $this->assertEquals('aHR0cDovL2V4YW1wbGUuY29tLw,,', $this->_helper->getEncodedUrl('http://example.com/'));
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }
}
