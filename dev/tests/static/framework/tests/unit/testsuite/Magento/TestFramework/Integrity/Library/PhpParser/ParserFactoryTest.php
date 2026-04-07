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
namespace Magento\TestFramework\Integrity\Library\PhpParser;

/**
 */
class ParserFactoryTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Magento\TestFramework\Integrity\Library\PhpParser\Tokens
     */
    protected $tokens;

    /**
     * @inheritdoc
     */
    protected function setUp(): void
    {
        $this->tokens = $this->getMockBuilder(
            \Magento\TestFramework\Integrity\Library\PhpParser\Tokens::class
        )->disableOriginalConstructor()->getMock();
    }

    /**
     * Covered createParsers method
     *
     * @test
     */
    public function testCreateParsers()
    {
        $parseFactory = new ParserFactory();
        $parseFactory->createParsers($this->tokens);
        $this->assertInstanceOf(
            \Magento\TestFramework\Integrity\Library\PhpParser\Uses::class,
            $parseFactory->getUses()
        );
        $this->assertInstanceOf(
            \Magento\TestFramework\Integrity\Library\PhpParser\StaticCalls::class,
            $parseFactory->getStaticCalls()
        );
        $this->assertInstanceOf(
            \Magento\TestFramework\Integrity\Library\PhpParser\Throws::class,
            $parseFactory->getThrows()
        );
    }
}
