<?php
/**
<<<<<<< HEAD
 * Copyright 2017 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
namespace Magento\TestFramework\Assert;

use PHPUnit\Framework\Assert;

/**
 * Check that actual data contains all values from expected data
 * But actual data can have more values than expected data
 */
class AssertArrayContains
{
    /**
     * @param array $expected
     * @param array $actual
     * @return void
     */
    public static function assert(array $expected, array $actual)
    {
        foreach ($expected as $key => $value) {
            Assert::assertArrayHasKey(
                $key,
                $actual,
                "Expected value for key '{$key}' is missed"
            );
            if (is_array($value)) {
                self::assert($value, $actual[$key]);
            } else {
                Assert::assertEquals(
                    $value,
                    $actual[$key],
                    "Expected value for key '{$key}' doesn't match"
                );
            }
        }
    }
}
