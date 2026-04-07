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

namespace Magento\Ui\Component\Form\Element\DataType;

use Magento\Framework\Locale\ResolverInterface;
use Magento\Framework\ObjectManagerInterface;
use Magento\TestFramework\Helper\Bootstrap;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
use PHPUnit\Framework\TestCase;

/**
 * Test for date component.
 */
class DateTest extends TestCase
{
    /** @var ObjectManagerInterface */
    private $objectManager;

    /** @var DateFactory */
    private $dateFactory;

    /** @var ResolverInterface */
    private $localeResolver;

    /**
     * @inheritDoc
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->objectManager = Bootstrap::getObjectManager();
        $this->dateFactory = $this->objectManager->get(DateFactory::class);
        $this->localeResolver = $this->objectManager->get(ResolverInterface::class);
    }

<<<<<<< HEAD
    #[DataProvider('localeDataProvider')]
=======
    /**
     * @dataProvider localeDataProvider
     *
     * @param string $locale
     * @param string $dateFormat
     * @return void
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testDateFormat(string $locale, string $dateFormat): void
    {
        $this->localeResolver->setLocale($locale);
        $date = $this->dateFactory->create();
        $date->prepare();
        $this->assertEquals($dateFormat, $date->getData('config')['options']['dateFormat']);
    }

<<<<<<< HEAD
    public static function localeDataProvider(): array
=======
    /**
     * @return array
     */
    public function localeDataProvider(): array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            ['en_GB', 'dd/MM/y'], ['en_US', 'M/d/yy'],
        ];
    }
}
