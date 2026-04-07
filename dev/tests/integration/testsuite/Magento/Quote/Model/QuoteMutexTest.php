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

namespace Magento\Quote\Model;

use Magento\Quote\Api\GuestCartManagementInterface;
use Magento\TestFramework\Helper\Bootstrap as BootstrapHelper;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

class QuoteMutexTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var GuestCartManagementInterface
     */
    private $guestCartManagement;

    /**
     * @var QuoteMutexInterface
     */
    private $quoteMutex;

<<<<<<< HEAD
    private static $quoteMutexClass;

=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    protected function setUp(): void
    {
        $objectManager = BootstrapHelper::getObjectManager();
        $this->quoteMutex = $objectManager->create(QuoteMutexInterface::class);
        $this->guestCartManagement = $objectManager->create(GuestCartManagementInterface::class);
<<<<<<< HEAD
        self::$quoteMutexClass = $this;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }

    /**
     * Tests quote mutex execution with different callables.
     *
     * @param callable $callable
     * @param array $args
     * @param mixed $expectedResult
     * @return void
<<<<<<< HEAD
     */
    #[DataProvider('callableDataProvider')]
=======
     * @dataProvider callableDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testSuccessfulExecution(callable $callable, array $args, $expectedResult): void
    {
        $maskedQuoteId = $this->guestCartManagement->createEmptyCart();
        $result = $this->quoteMutex->execute([$maskedQuoteId], $callable, $args);

        $this->assertEquals($expectedResult, $result);
    }

    /**
     * @return array[]
     */
<<<<<<< HEAD
    public static function callableDataProvider(): array
=======
    public function callableDataProvider(): array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        $functionWithArgs = function (int $a, int $b) {
            return $a + $b;
        };

        $functionWithoutArgs = function () {
            return 'Function without args';
        };

        return [
            ['callable' => $functionWithoutArgs, 'args' => [], 'expectedResult' => 'Function without args'],
            ['callable' => $functionWithArgs, 'args' => [1,2], 'expectedResult' => 3],
            [
<<<<<<< HEAD
                'callable' => \Closure::fromCallable([QuoteMutexTest::class, 'privateMethod']),
=======
                'callable' => \Closure::fromCallable([$this, 'privateMethod']),
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                'args' => ['test'],
                'expectedResult' => 'test'
            ],
        ];
    }

    /**
     * Private method for data provider.
     *
     * @param string $var
     * @return string
     * @SuppressWarnings(PHPMD.UnusedPrivateMethod)
     */
<<<<<<< HEAD
    private static function privateMethod(string $var)
=======
    private function privateMethod(string $var)
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return $var;
    }

    /**
     * Tests exception when empty maskIds array has been provided.
     *
     * @return void
     */
    public function testWithEmptyMaskIdsArgument(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $callable = function () {
        };
        $this->quoteMutex->execute([], $callable);
    }
}
