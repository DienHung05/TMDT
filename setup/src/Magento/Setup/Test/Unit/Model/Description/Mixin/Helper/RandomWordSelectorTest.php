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
declare(strict_types=1);

namespace Magento\Setup\Test\Unit\Model\Description\Mixin\Helper;

use Magento\Setup\Model\Description\Mixin\Helper\RandomWordSelector;
use PHPUnit\Framework\TestCase;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

class RandomWordSelectorTest extends TestCase
{
    /**
     * @var RandomWordSelector
     */
    private $helper;

    protected function setUp(): void
    {
        $this->helper = new RandomWordSelector();
    }

    /**
     * @param string $fixtureSource
     * @param int $fixtureCount
<<<<<<< HEAD
     */
    #[DataProvider('getTestData')]
=======
     * @dataProvider getTestData
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testRandomSelector($fixtureSource, $fixtureCount)
    {
        $randWords = $this->helper->getRandomWords($fixtureSource, $fixtureCount);

        $this->assertCount($fixtureCount, $randWords);

        $fixtureWords = str_word_count($fixtureSource, 1);
        foreach ($randWords as $randWord) {
            $this->assertContains($randWord, $fixtureWords);
        }
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function getTestData()
    {
        return [
            [
                'fixtureSource' => '
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                ',
                'fixtureCount' => 1
            ],
            [
                'fixtureSource' => 'Lorem.',
                'fixtureCount' => 5
            ],
            [
                'fixtureSource' => '
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                ',
                'fixtureCount' => 3
=======
    public function getTestData()
    {
        return [
            [
                'source' => '
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                ',
                'count' => 1
            ],
            [
                'source' => 'Lorem.',
                'count' => 5
            ],
            [
                'source' => '
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                ',
                'count' => 3
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            ],
        ];
    }
}
