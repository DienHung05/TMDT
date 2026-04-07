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

namespace Magento\Catalog\Model\Entity\Product\Attribute\Design\Options;

use Magento\Framework\ObjectManagerInterface;
use Magento\TestFramework\Helper\Bootstrap;
use PHPUnit\Framework\TestCase;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * Checks that product design options container return correct options.
 *
 * @see \Magento\Catalog\Model\Entity\Product\Attribute\Design\Options\Container
 */
class ContainerTest extends TestCase
{
    /** @var ObjectManagerInterface */
    private $objectManager;

    /** @var Container */
    private $container;

    /**
     * @inheritdoc
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->objectManager = Bootstrap::getObjectManager();
        $this->container = $this->objectManager->get(Container::class);
    }

    /**
<<<<<<< HEAD
=======
     * @dataProvider getOptionTextDataProvider
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @param string $value
     * @param string|bool $expectedValue
     * @return void
     */
<<<<<<< HEAD
    #[DataProvider('getOptionTextDataProvider')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testGetOptionText(string $value, $expectedValue): void
    {
        $actualValue = $this->container->getOptionText($value);
        $this->assertEquals($expectedValue, $actualValue);
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function getOptionTextDataProvider(): array
=======
    public function getOptionTextDataProvider(): array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            'with_value' => [
                'value' => 'container2',
<<<<<<< HEAD
                'expectedValue' => __('Block after Info Column'),
            ],
            'with_not_valid_value' => [
                'value' => 'container3',
                'expectedValue' => false,
=======
                'expected_value' => __('Block after Info Column'),
            ],
            'with_not_valid_value' => [
                'value' => 'container3',
                'expected_value' => false,
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            ],
        ];
    }
}
