<?php
// phpcs:ignoreFile
/**
<<<<<<< HEAD
 * Copyright 2021 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

namespace Magento\TestFramework\Integrity\Library;

use Magento\Framework\DataObject;
use TestNamespace\Some\SomeTestClass;

/**
 * @SuppressWarnings(PHPMD.UnusedFormalParameter)
 * @SuppressWarnings(PHPMD.UnusedPrivateMethod)
 */
class DummyInjectableClass
{
    public function testMethod(DataObject $dataObject, SomeTestClass $test)
    {
    }

    private function otherTest(\TestNamespace\Other\Test $test)
    {
    }
}
