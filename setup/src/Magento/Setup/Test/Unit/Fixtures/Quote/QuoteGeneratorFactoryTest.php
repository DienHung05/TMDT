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

namespace Magento\Setup\Test\Unit\Fixtures\Quote;

use Magento\Framework\ObjectManagerInterface;
use Magento\Framework\TestFramework\Unit\Helper\ObjectManager;
use Magento\Setup\Fixtures\Quote\QuoteGenerator;
use Magento\Setup\Fixtures\Quote\QuoteGeneratorFactory;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

/**
 * Test for Magento\Setup\Fixtures\Quote\QuoteGeneratorFactory class.
 */
class QuoteGeneratorFactoryTest extends TestCase
{
    /**
     * @var ObjectManagerInterface|MockObject
     */
    private $objectManager;

    /**
     * @var QuoteGeneratorFactory
     */
    private $fixture;

    /**
     * @inheritdoc
     */
    protected function setUp(): void
    {
        $this->objectManager = $this->getMockBuilder(ObjectManagerInterface::class)
            ->disableOriginalConstructor()
<<<<<<< HEAD
            ->getMock();
=======
            ->getMockForAbstractClass();
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $objectManager = new ObjectManager($this);

        $this->fixture = $objectManager->getObject(
            QuoteGeneratorFactory::class,
            [
                'objectManager' => $this->objectManager,
                'instanceName' => QuoteGenerator::class,
            ]
        );
    }

    /**
     * Test create method.
     *
     * @return void
     */
    public function testCreate()
    {
        $result =  $this->getMockBuilder(QuoteGenerator::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->objectManager->expects($this->once())
            ->method('create')
            ->with(QuoteGenerator::class, [])
            ->willReturn($result);

        $this->assertSame($result, $this->fixture->create([]));
    }
}
