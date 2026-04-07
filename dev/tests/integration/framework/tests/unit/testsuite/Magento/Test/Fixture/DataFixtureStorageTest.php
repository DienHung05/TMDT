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
use Magento\TestFramework\Fixture\DataFixtureStorage;
use PHPUnit\Framework\TestCase;

/**
 * Test data fixture storage model
 */
class DataFixtureStorageTest extends TestCase
{
    /**
     * Test that the correct fixture result is returned
     */
    public function test()
    {
        $result = new DataObject();
        $model = new DataFixtureStorage();
        $model->persist('fixture1', $result);
        $this->assertSame($result, $model->get('fixture1'));
        $this->assertNull($model->get('fixture2'));
        $model->flush();
        $this->assertNull($model->get('fixture1'));
    }
}
