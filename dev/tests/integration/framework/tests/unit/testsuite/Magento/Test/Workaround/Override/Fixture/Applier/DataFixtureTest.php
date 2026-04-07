<?php
/**
<<<<<<< HEAD
 * Copyright 2020 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

namespace Magento\Test\Workaround\Override\Fixture\Applier;

use Magento\TestFramework\Workaround\Override\Fixture\Applier\DataFixture;
use PHPUnit\Framework\TestCase;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * Provide tests for \Magento\TestFramework\Workaround\Override\Fixture\Applier\DataFixture
 */
class DataFixtureTest extends TestCase
{
    /** @var DataFixture */
    private $object;

    /**
     * @inheritdoc
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->object = new DataFixture();
    }

    /**
     * @return void
     */
    public function testGetPrioritizedConfig(): void
    {
        $this->object = $this->getMockBuilder(DataFixture::class)
<<<<<<< HEAD
            ->onlyMethods(['getGlobalConfig','getClassConfig', 'getMethodConfig', 'getDataSetConfig'])
=======
            ->setMethods(['getGlobalConfig','getClassConfig', 'getMethodConfig', 'getDataSetConfig'])
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            ->getMock();
        $this->object->expects($this->once())
            ->method('getGlobalConfig')
            ->willReturn(['global_config']);
        $this->object->expects($this->once())
            ->method('getClassConfig')
            ->willReturn(['class_config']);
        $this->object->expects($this->once())
            ->method('getMethodConfig')
            ->willReturn(['method_config']);
        $this->object->expects($this->once())
            ->method('getDataSetConfig')
            ->willReturn(['data_set_config']);
        $expectedResult = [
            ['global_config'],
            ['class_config'],
            ['method_config'],
            ['data_set_config'],
        ];
        $reflectionMethod = new \ReflectionMethod(DataFixture::class, 'getPrioritizedConfig');
<<<<<<< HEAD
=======
        $reflectionMethod->setAccessible(true);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $this->assertEquals($expectedResult, $reflectionMethod->invoke($this->object));
    }

    /**
<<<<<<< HEAD
=======
     * @dataProvider fixturesProvider
     *
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @param array $existingFixtures
     * @param array $config
     * @param array $expectedOrder
     * @return void
     */
<<<<<<< HEAD
    #[DataProvider('fixturesProvider')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testSortFixtures(array $existingFixtures, array $config, array $expectedOrder): void
    {
        $fixtures = $this->processApply($existingFixtures, $config);
        $this->assertEquals($expectedOrder, $fixtures);
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function fixturesProvider(): array
    {
        return [
            'sort_fixtures_before_all' => [
                'existingFixtures' => [['factory' => 'fixture']],
=======
    public function fixturesProvider(): array
    {
        return [
            'sort_fixtures_before_all' => [
                'existing_fixtures' => [['factory' => 'fixture']],
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                'config' => [
                    [
                        'path' => 'added_fixture',
                        'newPath' => null,
                        'before' => '-',
                        'after' => null,
                        'remove' => false,
                    ]
                ],
<<<<<<< HEAD
                'expectedOrder' => [['factory' => 'added_fixture'], ['factory' => 'fixture']],
            ],
            'sort_fixtures_after_all' => [
                'existingFixtures' => [['factory' => 'fixture']],
=======
                'expected_order' => [['factory' => 'added_fixture'], ['factory' => 'fixture']],
            ],
            'sort_fixtures_after_all' => [
                'existing_fixtures' => [['factory' => 'fixture']],
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                'config' => [
                    [
                        'path' => 'added_fixture',
                        'newPath' => null,
                        'before' => null,
                        'after' => '-',
                        'remove' => false,
                    ]
                ],
<<<<<<< HEAD
                'expectedOrder' => [['factory' => 'fixture'], ['factory' => 'added_fixture']],
            ],
            'sort_fixture_before_specific' => [
                'existingFixtures' => [['factory' => 'fixture1'], ['factory' => 'fixture2']],
=======
                'expected_order' => [['factory' => 'fixture'], ['factory' => 'added_fixture']],
            ],
            'sort_fixture_before_specific' => [
                'existing_fixtures' => [['factory' => 'fixture1'], ['factory' => 'fixture2']],
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                'config' => [
                    [
                        'path' => 'added_fixture',
                        'newPath' => null,
                        'before' => 'fixture2',
                        'after' => null,
                        'remove' => false,
                    ]
                ],
<<<<<<< HEAD
                'expectedOrder' => [
=======
                'expected_order' => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    ['factory' => 'fixture1'],
                    ['factory' => 'added_fixture'],
                    ['factory' => 'fixture2']
                ],
            ],
            'sort_fixture_after_specific' => [
<<<<<<< HEAD
                'existingFixtures' => [
=======
                'existing_fixtures' => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    ['factory' => 'fixture1'],
                    ['factory' => 'fixture2'],
                    ['factory' => 'fixture3']
                ],
                'config' => [
                    [
                        'path' => 'added_fixture',
                        'newPath' => null,
                        'before' => null,
                        'after' => 'fixture2',
                        'remove' => false,
                    ]
                ],
<<<<<<< HEAD
                'expectedOrder' => [
=======
                'expected_order' => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    ['factory' => 'fixture1'],
                    ['factory' => 'fixture2'],
                    ['factory' => 'added_fixture'],
                    ['factory' => 'fixture3']
                ],
            ],
        ];
    }

    /**
<<<<<<< HEAD
=======
     * @dataProvider removeFixturesProvider
     *
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @param array $existingFixtures
     * @param array $config
     * @param array $expectedOrder
     * @return void
     */
<<<<<<< HEAD
    #[DataProvider('removeFixturesProvider')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testRemoveFixtures(array $existingFixtures, array $config, array $expectedOrder): void
    {
        $fixtures = $this->processApply($existingFixtures, $config);
        $this->assertEquals($expectedOrder, $fixtures);
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function removeFixturesProvider(): array
    {
        return [
            'remove_fixture' => [
                'existingFixtures' => [['factory' => 'fixture'], ['factory' => 'fixture2']],
=======
    public function removeFixturesProvider(): array
    {
        return [
            'remove_fixture' => [
                'existing_fixtures' => [['factory' => 'fixture'], ['factory' => 'fixture2']],
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                'config' => [
                    [
                        'path' => 'fixture',
                        'newPath' => null,
                        'before' => null,
                        'after' => null,
                        'remove' => true,
                    ]
                ],
<<<<<<< HEAD
                'expectedOrder' => [['factory' => 'fixture2']],
            ],
            'remove_one_of_same_fixtures' => [
                'existingFixtures' => [['factory' => 'fixture'], ['factory' => 'fixture'], ['factory' => 'fixture2']],
=======
                'expected_order' => [['factory' => 'fixture2']],
            ],
            'remove_one_of_same_fixtures' => [
                'existing_fixtures' => [['factory' => 'fixture'], ['factory' => 'fixture'], ['factory' => 'fixture2']],
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                'config' => [
                    [
                        'path' => 'fixture',
                        'newPath' => null,
                        'before' => null,
                        'after' => null,
                        'remove' => true,
                    ]
                ],
<<<<<<< HEAD
                'expectedOrder' => [['factory' => 'fixture'], ['factory' => 'fixture2']],
            ],
            'remove_all_of_same_fixtures' => [
                'existingFixtures' => [['factory' => 'fixture'], ['factory' => 'fixture'], ['factory' => 'fixture2']],
=======
                'expected_order' => [['factory' => 'fixture'], ['factory' => 'fixture2']],
            ],
            'remove_all_of_same_fixtures' => [
                'existing_fixtures' => [['factory' => 'fixture'], ['factory' => 'fixture'], ['factory' => 'fixture2']],
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                'config' => [
                    [
                        'path' => 'fixture',
                        'newPath' => null,
                        'before' => null,
                        'after' => null,
                        'remove' => true,
                    ],
                    [
                        'path' => 'fixture',
                        'newPath' => null,
                        'before' => null,
                        'after' => null,
                        'remove' => true,
                    ]
                ],
<<<<<<< HEAD
                'expectedOrder' => [['factory' => 'fixture2']],
=======
                'expected_order' => [['factory' => 'fixture2']],
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            ],
        ];
    }

    /**
<<<<<<< HEAD
=======
     * @dataProvider replaceFixturesProvider
     *
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @param array $existingFixtures
     * @param array $config
     * @param array $expectedOrder
     * @return void
     */
<<<<<<< HEAD
    #[DataProvider('replaceFixturesProvider')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testReplaceFixtures(array $existingFixtures, array $config, array $expectedOrder): void
    {
        $fixtures = $this->processApply($existingFixtures, $config);
        $this->assertEquals($expectedOrder, $fixtures);
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function replaceFixturesProvider(): array
    {
        return [
            'replace_one_fixture' => [
                'existingFixtures' => [['factory' => 'fixture'], ['factory' => 'fixture2']],
=======
    public function replaceFixturesProvider(): array
    {
        return [
            'replace_one_fixture' => [
                'existing_fixtures' => [['factory' => 'fixture'], ['factory' => 'fixture2']],
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                'config' => [
                    [
                        'path' => 'fixture',
                        'newPath' => 'new_fixture',
                        'before' => null,
                        'after' => null,
                        'remove' => false,
                    ]
                ],
<<<<<<< HEAD
                'expectedOrder' => [['factory' => 'new_fixture'], ['factory' => 'fixture2']],
            ],
            'replace_all_fixture' => [
                'existingFixtures' => [['factory' => 'fixture'], ['factory' => 'fixture'], ['factory' => 'fixture2']],
=======
                'expected_order' => [['factory' => 'new_fixture'], ['factory' => 'fixture2']],
            ],
            'replace_all_fixture' => [
                'existing_fixtures' => [['factory' => 'fixture'], ['factory' => 'fixture'], ['factory' => 'fixture2']],
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                'config' => [
                    [
                        'path' => 'fixture',
                        'newPath' => 'new_fixture',
                        'before' => null,
                        'after' => null,
                        'remove' => false,
                    ]
                ],
<<<<<<< HEAD
                'expectedOrder' => [
=======
                'expected_order' => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    ['factory' => 'new_fixture'],
                    ['factory' => 'new_fixture'],
                    ['factory' => 'fixture2']
                ],
            ],
        ];
    }

    /**
     * Process apply configurations
     *
     * @param array $existingFixtures
     * @param array $config
     * @return array
     */
    private function processApply(array $existingFixtures, array $config): array
    {
        $this->setConfig($config);
        $fixtures = $this->object->apply($existingFixtures);

        return array_values($fixtures);
    }

    /**
     * Set config to method scope
     *
     * @param array $config
     * @return void
     */
    private function setConfig(array $config): void
    {
        $this->object->setGlobalConfig([]);
        $this->object->setClassConfig([]);
        $this->object->setDataSetConfig([]);
        $this->object->setMethodConfig($config);
    }
}
