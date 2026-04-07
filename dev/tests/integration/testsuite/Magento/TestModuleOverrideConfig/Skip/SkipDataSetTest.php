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

namespace Magento\TestModuleOverrideConfig\Skip;

use Magento\TestModuleOverrideConfig\AbstractOverridesTest;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * Class checks that only specific data set can be skipped using override config
 *
 * @magentoAppIsolation enabled
 */
class SkipDataSetTest extends AbstractOverridesTest
{
    /**
     * The first_data_set should not be executed according to override config it should be mark as skipped
<<<<<<< HEAD
     * @param $message
     * @return void
     */
    #[DataProvider('configDataProvider')]
    public function testSkipDataSet($message): void
    {
        if ($this->dataName() === 'first_data_set') {
            $this->fail($message);
=======
     *
     * @dataProvider testDataProvider
     *
     * @return void
     */
    public function testSkipDataSet(): void
    {
        if ($this->dataName() === 'first_data_set') {
            $this->fail('This test should be skipped via override config in data set node');
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        }
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function configDataProvider(): array
    {
        return [
            'first_data_set' => ['This test should be skipped via override config in data set node'],
            'second_data_set' => ['This test should be skipped via override config in data set node'],
=======
    public function testDataProvider(): array
    {
        return [
            'first_data_set' => [],
            'second_data_set' => [],
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        ];
    }
}
