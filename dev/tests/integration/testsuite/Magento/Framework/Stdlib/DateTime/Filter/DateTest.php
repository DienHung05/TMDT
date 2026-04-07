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
namespace Magento\Framework\Stdlib\DateTime\Filter;

use Magento\TestFramework\ObjectManager;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

class DateTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var ObjectManager
     */
    private $objectManager;

    /**
     * @var \Magento\Framework\Locale\ResolverInterface
     */
    private $localeResolver;

    /**
     * @var \Magento\Framework\Stdlib\DateTime\TimezoneInterface
     */
    private $localeDate;

    /**
     * @var \Magento\Framework\Stdlib\DateTime\Filter\Date
     */
    private $dateFilter;

    protected function setUp(): void
    {
        $this->objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();

        $this->localeResolver = $this->objectManager->get(\Magento\Framework\Locale\ResolverInterface::class);

        $this->localeDate = $this->objectManager->get(\Magento\Framework\Stdlib\DateTime\TimezoneInterface::class, [
            'localeResolver' => $this->localeResolver
        ]);

        $this->dateFilter = $this->objectManager->get(\Magento\Framework\Stdlib\DateTime\Filter\Date::class, [
            'localeDate' => $this->localeDate
        ]);
    }

    /**
     * @param string $inputData
     * @param string $expectedDate
<<<<<<< HEAD
     */
    #[DataProvider('filterDataProvider')]
=======
     *
     * @dataProvider filterDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testFilter($inputData, $expectedDate)
    {
        $this->markTestSkipped(
            'Input data not realistic with actual request payload from admin UI. See MAGETWO-59810'
        );
        $this->assertEquals($expectedDate, $this->dateFilter->filter($inputData));
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function filterDataProvider()
=======
    public function filterDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            ['2000-01-01', '2000-01-01'],
            ['2014-03-30T02:30:00', '2014-03-30'],
            ['12/31/2000', '2000-12-31']
        ];
    }

    /**
     * @param string $locale
     * @param string $inputData
     * @param string $expectedDate
     *
<<<<<<< HEAD
     * @return void
     */
    #[DataProvider('localeDateFilterProvider')]
=======
     * @dataProvider localeDateFilterProvider
     * @return void
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testLocaleDateFilter($locale, $inputData, $expectedDate)
    {
        $this->localeResolver->setLocale($locale);
        $this->assertEquals($expectedDate, $this->dateFilter->filter($inputData));
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function localeDateFilterProvider()
=======
    public function localeDateFilterProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            ['en_US', '01/02/2010', '2010-01-02'],
            ['fr_FR', '01/02/2010', '2010-02-01'],
            ['de_DE', '01/02/2010', '2010-02-01'],
        ];
    }
}
