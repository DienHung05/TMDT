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

namespace Magento\Test\Workaround\Cleanup;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\TestSuite;
use Magento\TestFramework\Workaround\Cleanup\TestCaseProperties;

/**
 * Test class for \Magento\TestFramework\Workaround\Cleanup\TestCaseProperties.
 */
class TestCasePropertiesTest extends TestCase
{
    /**
     * @var array
     */
    protected $fixtureProperties = [
        'testPublic' => ['name' => 'testPublic', 'is_static' => false],
        '_testPrivate' => ['name' => '_testPrivate', 'is_static' => false],
        '_testPropertyBoolean' => ['name' => '_testPropertyBoolean', 'is_static' => false],
        '_testPropertyInteger' => ['name' => '_testPropertyInteger', 'is_static' => false],
        '_testPropertyFloat' => ['name' => '_testPropertyFloat', 'is_static' => false],
        '_testPropertyString' => ['name' => '_testPropertyString', 'is_static' => false],
        '_testPropertyArray' => ['name' => '_testPropertyArray', 'is_static' => false],
        'testPublicStatic' => ['name' => 'testPublicStatic', 'is_static' => true],
        '_testProtectedStatic' => ['name' => '_testProtectedStatic', 'is_static' => true],
        '_testPrivateStatic' => ['name' => '_testPrivateStatic', 'is_static' => true]
    ];

    /**
     * @return void
     */
    public function testEndTestSuiteDestruct(): void
    {
<<<<<<< HEAD
        $phpUnitTestSuite = TestSuite::empty('TestSuite');
=======
        $phpUnitTestSuite = new TestSuite();
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $phpUnitTestSuite->addTestFile(__DIR__ . '/TestCasePropertiesTest/DummyTestCase.php');
        // Because addTestFile() adds classes from file to tests array, use first testsuite
        /** @var TestSuite $testSuite */
        $testSuite = current($phpUnitTestSuite->tests());
        $testSuite->run();
<<<<<<< HEAD

        $reflectionClass = new \ReflectionClass($testSuite);
=======
        /** @var \Magento\Test\Workaround\Cleanup\TestCasePropertiesTest\DummyTestCase $testClass */
        $testClass = current($testSuite->tests());

        $reflectionClass = new \ReflectionClass($testClass);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $classProperties = $reflectionClass->getProperties();
        $fixturePropertiesNames = array_keys($this->fixtureProperties);

        foreach ($classProperties as $property) {
            if (in_array($property->getName(), $fixturePropertiesNames)) {
<<<<<<< HEAD
                $value = $property->getValue($testSuite);
=======
                $property->setAccessible(true);
                $value = $property->getValue($testClass);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                $this->assertNotNull($value);
            }
        }
        $clearProperties = new TestCaseProperties();
        $clearProperties->endTestSuite($testSuite);

        foreach ($classProperties as $property) {
            if (in_array($property->getName(), $fixturePropertiesNames)) {
<<<<<<< HEAD
                $value = $property->getValue($testSuite);
=======
                $property->setAccessible(true);
                $value = $property->getValue($testClass);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                $this->assertNull($value);
            }
        }
    }
}
