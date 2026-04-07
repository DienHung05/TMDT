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

namespace Magento\Setup\Test\Unit\Model\Description;

use Magento\Setup\Model\Description\DescriptionSentenceGenerator;
use Magento\Setup\Model\Dictionary;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class DescriptionSentenceGeneratorTest extends TestCase
{
    /**
     * @var MockObject|Dictionary
     */
    private $dictionaryMock;

    /**
     * @var DescriptionSentenceGenerator
     */
    private $sentenceGenerator;

    /**
     * @var array
     */
    private $sentenceConfig = [
        'words' => [
            'count-min' => 7,
            'count-max' => 7
        ]
    ];

    protected function setUp(): void
    {
        $this->dictionaryMock = $this->createMock(Dictionary::class);
        $this->sentenceGenerator = new DescriptionSentenceGenerator(
            $this->dictionaryMock,
            $this->sentenceConfig
        );
    }

    public function testSentenceGeneration()
    {
<<<<<<< HEAD
        $words = ['Lorem', 'ipsum', 'dolor', 'sit', 'amet', 'consectetur', 'adipiscing'];
        $callCount = 0;
        $this->dictionaryMock
            ->expects($this->exactly(7))
            ->method('getRandWord')
            ->willReturnCallback(function() use (&$callCount, $words) {
                return $words[$callCount++];
            });
=======
        $this->dictionaryMock
            ->expects($this->exactly(7))
            ->method('getRandWord')
            ->will($this->onConsecutiveCalls(
                'Lorem',
                'ipsum',
                'dolor',
                'sit',
                'amet',
                'consectetur',
                'adipiscing'
            ));
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

        $this->assertEquals(
            'Lorem ipsum dolor sit amet consectetur adipiscing.',
            $this->sentenceGenerator->generate()
        );
    }
}
