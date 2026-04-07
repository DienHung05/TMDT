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

use Magento\TestFramework\Workaround\Override\Fixture\Applier\AdminConfigFixture;
use PHPUnit\Framework\TestCase;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * Provide tests for \Magento\TestFramework\Workaround\Override\Fixture\Applier\AdminConfigFixture
 */
class AdminConfigFixtureTest extends TestCase
{
    /** @var AdminConfigFixture */
    private $object;

    /**
     * @inheritdoc
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->object = new AdminConfigFixture();
    }

    /**
<<<<<<< HEAD
=======
     * @dataProvider annotationsProvider
     *
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @param string $fixture
     * @param array $attributes
     * @return  void
     */
<<<<<<< HEAD
    #[DataProvider('annotationsProvider')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testIsFixtureMatch(string $fixture, array $attributes): void
    {
        $this->assertTrue($this->invokeIsFixtureMatchMethod($attributes, $fixture));
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function annotationsProvider(): array
    {
        return [
            'simple_record' => [
                'fixture' => 'section/group/field value',
=======
    public function annotationsProvider(): array
    {
        return [
            'simple_record' => [
                'current_fixture' => 'section/group/field value',
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                'attributes' => [
                    'path' => 'section/group/field',
                    'value' => 'value',
                ],
            ],
            'simple_record_many_spaces' => [
<<<<<<< HEAD
                'fixture' => '   section/group/field    value',
=======
                'current_fixture' => '   section/group/field    value',
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                'attributes' => [
                    'path' => 'section/group/field',
                    'value' => 'value',
                ],
            ],
        ];
    }

    /**
<<<<<<< HEAD
=======
     * @dataProvider wrongRecordsProvider
     *
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @param string $fixture
     * @param array $attributes
     * @return void
     */
<<<<<<< HEAD
    #[DataProvider('wrongRecordsProvider')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testFixtureDoesNotMatch(string $fixture, array $attributes): void
    {
        $this->assertFalse($this->invokeIsFixtureMatchMethod($attributes, $fixture));
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function wrongRecordsProvider(): array
    {
        return [
            'another_path_record' => [
                'fixture' => 'section/group/another_field value',
=======
    public function wrongRecordsProvider(): array
    {
        return [
            'another_path_record' => [
                'current_fixture' => 'section/group/another_field value',
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                'attributes' => [
                    'path' => 'section/group/field',
                    'value' => 'value',
                ],
            ],
        ];
    }

    /**
<<<<<<< HEAD
=======
     * @dataProvider initFixtureProvider
     *
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @param array $attributes
     * @param string $expectedValue
     * @return void
     */
<<<<<<< HEAD
    #[DataProvider('initFixtureProvider')]
    public function testInitConfigFixture(array $attributes, string $expectedValue): void
    {
        $reflectionMethod = new \ReflectionMethod(AdminConfigFixture::class, 'initConfigFixture');
=======
    public function testInitConfigFixture(array $attributes, string $expectedValue): void
    {
        $reflectionMethod = new \ReflectionMethod(AdminConfigFixture::class, 'initConfigFixture');
        $reflectionMethod->setAccessible(true);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $value = $reflectionMethod->invoke($this->object, $attributes);
        $this->assertEquals($expectedValue, $value);
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function initFixtureProvider(): array
=======
    public function initFixtureProvider(): array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            'with_value' => [
                'attributes' => [
                    'path' => 'section/group/field',
                    'value' => 'value',
                ],
<<<<<<< HEAD
                'expectedValue' => 'section/group/field value',
=======
                'expected_value' => 'section/group/field value',
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            ],
            'with_new_value' => [
                'attributes' => [
                    'path' => 'section/group/field',
                    'newValue' => 'new_value',
                ],
<<<<<<< HEAD
                'expectedValue' => 'section/group/field new_value',
=======
                'expected_value' => 'section/group/field new_value',
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            ],
        ];
    }

    /**
     * Invove object method
     *
     * @param array $attributes
     * @param string $fixture
     * @return bool
     */
    private function invokeIsFixtureMatchMethod(array $attributes, string $fixture): bool
    {
        $reflectionMethod = new \ReflectionMethod(AdminConfigFixture::class, 'isFixtureMatch');
<<<<<<< HEAD
=======
        $reflectionMethod->setAccessible(true);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        return $reflectionMethod->invoke($this->object, $attributes, $fixture);
    }
}
