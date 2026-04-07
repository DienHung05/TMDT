<?php
/**
<<<<<<< HEAD
 * Copyright 2018 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

namespace Magento\Framework\Filter;

<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;

=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
class TruncateFilterTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @param string $expectedValue
     * @param string $expectedRemainder
     * @param string $string
     * @param int $length
     * @param string $etc
     * @param bool $breakWords
<<<<<<< HEAD
     */
    #[DataProvider('truncateDataProvider')]
=======
     * @dataProvider truncateDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testFilter(
        $expectedValue,
        $expectedRemainder,
        $string,
        $length = 5,
        $etc = '...',
        $breakWords = true
    ) {
        /** @var TruncateFilter $truncateFilter */
        $truncateFilter = \Magento\TestFramework\ObjectManager::getInstance()->create(
            TruncateFilter::class,
            [
                'length' => $length,
                'etc' => $etc,
                'breakWords' => $breakWords,
            ]
        );
        $result = $truncateFilter->filter($string);
        $this->assertEquals($expectedValue, $result->getValue());
        $this->assertEquals($expectedRemainder, $result->getRemainder());
    }

<<<<<<< HEAD
    public static function truncateDataProvider() : array
=======
    public function truncateDataProvider() : array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            '1' => [
                '12...',
                '34567890',
                '1234567890',
            ],
            '2' => [
                '123..',
                ' 456 789',
                '123 456 789',
                8,
                '..',
                false
            ]
        ];
    }
}
