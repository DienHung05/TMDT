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

/**
 * Automatic cleanup of test case's properties, it isn't needed to unset properties manually in tearDown() anymore
 */
namespace Magento\TestFramework\Workaround\Cleanup;

class TestCaseProperties
{
    /**
     * Clear test method properties after each test suite
     *
     * @param  \PHPUnit\Framework\TestSuite $suite
     */
    public function endTestSuite(\PHPUnit\Framework\TestSuite $suite)
    {
        $tests = $suite->tests();

        foreach ($tests as $test) {
            $reflectionClass = new \ReflectionClass($test);
            $properties = $reflectionClass->getProperties();
            foreach ($properties as $property) {
<<<<<<< HEAD
                if ($property->isInitialized($test)) {
                    $value = $property->getValue($test);
                    if (is_object($value) && method_exists($value, '__destruct') &&
                        is_callable([$value, '__destruct'])) {
                        $value->__destruct();
                    }
                }

                if (is_array($property->getDefaultValue())) {
                    $property->setValue($test, []);
                } else {
                    $property->setValue($test, null);
                }
=======
                $property->setAccessible(true);
                $value = $property->getValue($test);
                if (is_object($value) && method_exists($value, '__destruct') && is_callable([$value, '__destruct'])) {
                    $value->__destruct();
                }
                $property->setValue($test, null);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            }
        }
    }
}
