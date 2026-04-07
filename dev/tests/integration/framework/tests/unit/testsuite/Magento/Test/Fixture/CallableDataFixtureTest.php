<?php
/**
<<<<<<< HEAD
 * Copyright 2021 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

namespace Magento\Test\Fixture;

use Magento\Framework\DataObject;
<<<<<<< HEAD
use Magento\Framework\TestFramework\Unit\Helper\MockCreationTrait;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
use Magento\TestFramework\Fixture\CallableDataFixture;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use stdClass;

/**
 * Test callable data fixture type
 */
class CallableDataFixtureTest extends TestCase
{
<<<<<<< HEAD
    use MockCreationTrait;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    /**
     * @var string
     */
    private static $testFlag = '';

    /**
     * @var MockObject|stdClass
     */
    private $fakeClass;

    /**
     * @ingeritdoc
     */
    protected function setUp(): void
    {
        parent::setUp();
        static::$testFlag = '';
<<<<<<< HEAD
        $this->fakeClass = $this->createPartialMockWithReflection(
            stdClass::class,
            ['fakeMethod', 'fakeMethodRollback']
        );
=======
        $this->fakeClass = $this->getMockBuilder(stdClass::class)
            ->addMethods(['fakeMethod', 'fakeMethodRollback'])
            ->getMock();
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }

    /**
     * @ingeritdoc
     */
    protected function tearDown(): void
    {
        static::$testFlag = '';
        parent::tearDown();
    }

    /**
     * Test apply with callable array
     */
    public function testApplyCallableArray(): void
    {
        $model = new CallableDataFixture([$this->fakeClass, 'fakeMethod']);
        $this->fakeClass->expects($this->once())
            ->method('fakeMethod');
        $model->apply();
    }

    /**
     * Test revert with callable array
     */
    public function testRevertCallableArray(): void
    {
        $model = new CallableDataFixture([$this->fakeClass, 'fakeMethod']);
        $this->fakeClass->expects($this->once())
            ->method('fakeMethodRollback');
        $model->revert(new DataObject());
    }

    /**
     * Test apply with callable string
     */
    public function testApplyCallableString(): void
    {
        $model = new CallableDataFixture(get_class($this) . '::fixtureMethod');
        $model->apply();
        $this->assertEquals('applied', static::$testFlag);
    }

    /**
     * Test revert with callable string
     */
    public function testRevertCallableString(): void
    {
        $model = new CallableDataFixture(get_class($this) . '::fixtureMethod');
        $model->revert(new DataObject());
        $this->assertEquals('reverted', static::$testFlag);
    }

    public static function fixtureMethod(): void
    {
        static::$testFlag = 'applied';
    }

    public static function fixtureMethodRollback(): void
    {
        static::$testFlag = 'reverted';
    }
}
