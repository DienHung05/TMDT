<?php
/**
<<<<<<< HEAD
 * Copyright 2019 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

declare(strict_types=1);

namespace Magento\Framework\Filter\DirectiveProcessor\Filter;

use Magento\Framework\App\ObjectManager;
use PHPUnit\Framework\TestCase;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

class FilterApplierTest extends TestCase
{
    /**
     * @var FilterApplier
     */
    private $applier;

    protected function setUp(): void
    {
        $this->applier = ObjectManager::getInstance()->get(FilterApplier::class);
    }

    /**
<<<<<<< HEAD
     */
    #[DataProvider('arrayUseCaseProvider')]
=======
     * @dataProvider arrayUseCaseProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testArrayUseCases($param, $input, $expected)
    {
        $result = $this->applier->applyFromArray($param, $input);

        self::assertSame($expected, $result);
    }

<<<<<<< HEAD
    public static function arrayUseCaseProvider()
=======
    public function arrayUseCaseProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        $standardInput = 'Hello ' . "\n" . ' &world!';
        return [
            'raw' => [['raw'], $standardInput, $standardInput],
            'standard usage' => [['escape', 'nl2br'], $standardInput, 'Hello <br />' . "\n" . ' &amp;world!'],
            'single usage' => [['escape'], $standardInput, 'Hello ' . "\n" . ' &amp;world!'],
            'params' => [
                ['nl2br', 'escape:url', 'foofilter'],
                $standardInput,
                '12%DLROW62%02%A0%E3%F2%02%RBC3%02%OLLEH'
            ],
            'no filters' => [[], $standardInput, $standardInput],
            'bad filters' => [['', false, 0, null], $standardInput, $standardInput],
            'mixed filters' => [['', false, 'escape', 0, null], $standardInput, 'Hello ' . "\n" . ' &amp;world!'],
        ];
    }

    /**
<<<<<<< HEAD
     */
    #[DataProvider('rawUseCaseProvider')]
=======
     * @dataProvider rawUseCaseProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testRawUseCases($param, $input, $expected)
    {
        $result = $this->applier->applyFromRawParam($param, $input, ['escape']);

        self::assertSame($expected, $result);
    }

<<<<<<< HEAD
    public static function rawUseCaseProvider()
=======
    public function rawUseCaseProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        $standardInput = 'Hello ' . "\n" . ' &world!';
        return [
            'raw' => ['|raw', $standardInput, $standardInput],
            'standard usage' => ['|escape|nl2br', $standardInput, 'Hello <br />' . "\n" . ' &amp;world!'],
            'single usage' => ['|escape', $standardInput, 'Hello ' . "\n" . ' &amp;world!'],
            'default filters' => ['', $standardInput, 'Hello ' . "\n" . ' &amp;world!'],
            'params' => ['|nl2br|escape:url|foofilter', $standardInput, '12%DLROW62%02%A0%E3%F2%02%RBC3%02%OLLEH'],
        ];
    }
}
