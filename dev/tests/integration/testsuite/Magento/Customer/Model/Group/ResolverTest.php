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

namespace Magento\Customer\Model\Group;

use PHPUnit\Framework\TestCase;
use Magento\TestFramework\Helper\Bootstrap;

class ResolverTest extends TestCase
{
    /**
     * @magentoDataFixture Magento/Customer/_files/customer.php
     */
    public function testResolve()
    {
        $customerId = 1;
        $expectedGroupId = 1;

        $resolver = Bootstrap::getObjectManager()->create(Resolver::class);
        $groupId = $resolver->resolve($customerId);
        $this->assertEquals($groupId, $expectedGroupId);
    }
}
