<?php
/**
<<<<<<< HEAD
 * Copyright 2014 Adobe
 * All Rights Reserved.
=======
 * Test case for \Magento\Framework\Profiler
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
namespace Magento\Framework;

use ReflectionClass;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

class ProfilerTest extends \PHPUnit\Framework\TestCase
{
    protected function tearDown(): void
    {
        \Magento\Framework\Profiler::reset();
    }

    /**
<<<<<<< HEAD
     * @param array $config
     * @param array $expectedDrivers
     */
    #[DataProvider('applyConfigDataProvider')]
=======
     * @dataProvider applyConfigDataProvider
     * @param array $config
     * @param array $expectedDrivers
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testApplyConfigWithDrivers(array $config, array $expectedDrivers)
    {
        $profiler = new \Magento\Framework\Profiler();
        $profiler::applyConfig($config, '');
<<<<<<< HEAD
        $this->assertIsObject($profiler);
        $this->assertTrue(property_exists($profiler, '_drivers'));
        $object = new ReflectionClass(\Magento\Framework\Profiler::class);
        $attribute = $object->getProperty('_drivers');
        $propertyObject = $attribute->getValue($profiler);
=======
        $this->assertClassHasAttribute('_drivers', \Magento\Framework\Profiler::class);
        $object = new ReflectionClass(\Magento\Framework\Profiler::class);
        $attribute = $object->getProperty('_drivers');
        $attribute->setAccessible(true);
        $propertyObject = $attribute->getValue($profiler);
        $attribute->setAccessible(false);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $this->assertEquals($expectedDrivers, $propertyObject);
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function applyConfigDataProvider()
    {
        return [
            'Empty config does not create any driver' => ['config' => [], 'expectedDrivers' => []],
            'Integer 0 does not create any driver' => [
                'config' => ['drivers' => [0]],
                'expectedDrivers' => [],
            ],
            'Integer 1 does creates standard driver' => [
                'config' => ['drivers' => [1]],
                'expectedDrivers' => [new \Magento\Framework\Profiler\Driver\Standard()],
            ],
            'Config array key sets driver type' => [
                'config' => ['drivers' => ['standard' => 1]],
                'expectedDrivers' => [new \Magento\Framework\Profiler\Driver\Standard()],
            ],
            'Config array key ignored when type set' => [
                'config' => ['drivers' => ['custom' => ['type' => 'standard']]],
                'expectedDrivers' => [new \Magento\Framework\Profiler\Driver\Standard()],
=======
    public function applyConfigDataProvider()
    {
        return [
            'Empty config does not create any driver' => ['config' => [], 'drivers' => []],
            'Integer 0 does not create any driver' => [
                'config' => ['drivers' => [0]],
                'drivers' => [],
            ],
            'Integer 1 does creates standard driver' => [
                'config' => ['drivers' => [1]],
                'drivers' => [new \Magento\Framework\Profiler\Driver\Standard()],
            ],
            'Config array key sets driver type' => [
                'configs' => ['drivers' => ['standard' => 1]],
                'drivers' => [new \Magento\Framework\Profiler\Driver\Standard()],
            ],
            'Config array key ignored when type set' => [
                'config' => ['drivers' => ['custom' => ['type' => 'standard']]],
                'drivers' => [new \Magento\Framework\Profiler\Driver\Standard()],
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            ],
            'Config with outputs element as integer 1 creates output' => [
                'config' => [
                    'drivers' => [['outputs' => ['html' => 1]]],
                    'baseDir' => '/some/base/dir',
                ],
<<<<<<< HEAD
                'expectedDrivers' => [
=======
                'drivers' => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    new \Magento\Framework\Profiler\Driver\Standard(
                        ['outputs' => [['type' => 'html', 'baseDir' => '/some/base/dir']]]
                    ),
                ],
            ],
            'Config with outputs element as integer 0 does not create output' => [
                'config' => ['drivers' => [['outputs' => ['html' => 0]]]],
<<<<<<< HEAD
                'expectedDrivers' => [new \Magento\Framework\Profiler\Driver\Standard()],
            ],
            'Config with shortly defined outputs element' => [
                'config' => ['drivers' => [['outputs' => ['foo' => 'html']]]],
                'expectedDrivers' => [
=======
                'drivers' => [new \Magento\Framework\Profiler\Driver\Standard()],
            ],
            'Config with shortly defined outputs element' => [
                'config' => ['drivers' => [['outputs' => ['foo' => 'html']]]],
                'drivers' => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    new \Magento\Framework\Profiler\Driver\Standard(['outputs' => [['type' => 'html']]]),
                ],
            ],
            'Config with fully defined outputs element options' => [
                'config' => [
                    'drivers' => [
                        [
                            'outputs' => [
                                'foo' => [
                                    'type' => 'html',
                                    'filterName' => '/someFilter/',
                                    'thresholds' => ['someKey' => 123],
                                    'baseDir' => '/custom/dir',
                                ],
                            ],
                        ],
                    ],
                ],
<<<<<<< HEAD
                'expectedDrivers' => [
=======
                'drivers' => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    new \Magento\Framework\Profiler\Driver\Standard(
                        [
                            'outputs' => [
                                [
                                    'type' => 'html',
                                    'filterName' => '/someFilter/',
                                    'thresholds' => ['someKey' => 123],
                                    'baseDir' => '/custom/dir',
                                ],
                            ],
                        ]
                    ),
                ],
            ],
            'Config with shortly defined output' => [
                'config' => ['drivers' => [['output' => 'html']]],
<<<<<<< HEAD
                'expectedDrivers' => [
=======
                'drivers' => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    new \Magento\Framework\Profiler\Driver\Standard(['outputs' => [['type' => 'html']]]),
                ],
            ]
        ];
    }
}
