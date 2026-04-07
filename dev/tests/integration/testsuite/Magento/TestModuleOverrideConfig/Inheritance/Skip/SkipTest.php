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

namespace Magento\TestModuleOverrideConfig\Inheritance\Skip;

<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;

=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
/**
 * Class checks that test method can be skipped using inherited from abstract class/interface override config
 *
 * phpcs:disable Generic.Classes.DuplicateClassName
 *
 * @magentoAppIsolation enabled
 */
class SkipTest extends SkipAbstractClass implements SkipInterface
{
    /**
     * @return void
     */
    public function testAbstractSkip(): void
    {
        $this->fail('This test should be skipped via override config in method node inherited from abstract class');
    }

    /**
     * @return void
     */
    public function testInterfaceSkip(): void
    {
        $this->fail('This test should be skipped via override config in method node inherited from interface');
    }

    /**
<<<<<<< HEAD
     * @param string $message
     * @return void
     */
    #[DataProvider('skipDataProvider')]
=======
     * @dataProvider skipDataProvider
     *
     * @param string $message
     * @return void
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testSkipDataSet(string $message): void
    {
        $this->fail($message);
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function skipDataProvider(): array
=======
    public function skipDataProvider(): array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            'first_data_set' => ['This test should be skipped in data set node inherited from abstract class'],
            'second_data_set' => ['This test should be skipped in data set node inherited from interface'],
        ];
    }
}
