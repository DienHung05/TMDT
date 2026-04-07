<?php
/**
<<<<<<< HEAD
 * Copyright 2022 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

declare(strict_types=1);

namespace Magento\Email\Model\Template;

use Magento\Framework\TestFramework\Unit\Helper\ObjectManager;
use PHPUnit\Framework\TestCase;

class VariableCompatibilityCheckerTest extends TestCase
{
    public function testCompatibilityCheck()
    {
        $objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();
        /** @var VariableCompatibilityChecker $checker */
        $checker = $objectManager->get(VariableCompatibilityChecker::class);
        $errors = $checker->getCompatibilityIssues(file_get_contents(__DIR__ . '/../_files/variables_template.html'));

        self::assertCount(17, $errors);
    }
}
