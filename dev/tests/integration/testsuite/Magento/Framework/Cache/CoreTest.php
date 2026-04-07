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

/**
 * \Magento\Framework\Cache\Core test case
<<<<<<< HEAD
 *
 * @deprecated Tests deprecated class Core
 * @see \Magento\Framework\Cache\Core
 * @group legacy
 * @group disabled
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
namespace Magento\Framework\Cache;

class CoreTest extends \PHPUnit\Framework\TestCase
{
<<<<<<< HEAD
    /**
     * Skip all tests as the class being tested is deprecated
     *
     * @return void
     */
    protected function setUp(): void
    {
        $this->markTestSkipped(
            'Test skipped: Core is deprecated. Use Symfony cache adapter instead.'
        );
    }

=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testSetBackendSuccess()
    {
        $mockBackend = $this->createMock(\Zend_Cache_Backend_File::class);
        $config = [
            'backend_decorators' => [
                'test_decorator' => [
                    'class' => \Magento\Framework\Cache\Backend\Decorator\Compression::class,
                    'options' => ['compression_threshold' => '100'],
                ],
            ],
        ];

        $core = new \Magento\Framework\Cache\Core($config);
        $core->setBackend($mockBackend);

        $this->assertInstanceOf(
            \Magento\Framework\Cache\Backend\Decorator\AbstractDecorator::class,
            $core->getBackend()
        );
    }

    /**
     */
    public function testSetBackendException()
    {
        $this->expectException(\Zend_Cache_Exception::class);

        $mockBackend = $this->createMock(\Zend_Cache_Backend_File::class);
        $config = ['backend_decorators' => ['test_decorator' => ['class' => 'Zend_Cache_Backend']]];

        $core = new \Magento\Framework\Cache\Core($config);
        $core->setBackend($mockBackend);
    }
}
