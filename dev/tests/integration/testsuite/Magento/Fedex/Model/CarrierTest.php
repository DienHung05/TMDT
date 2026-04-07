<?php
/**
<<<<<<< HEAD
 * Copyright 2014 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

namespace Magento\Fedex\Model;

<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;

=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
class CarrierTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Magento\Fedex\Model\Carrier
     */
    protected $_model;

    protected function setUp(): void
    {
        $this->_model = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
            \Magento\Fedex\Model\Carrier::class
        );
    }

    /**
<<<<<<< HEAD
     * @param string $type
     * @param int $expectedCount
     */
    #[DataProvider('getCodeDataProvider')]
=======
     * @dataProvider getCodeDataProvider
     * @param string $type
     * @param int $expectedCount
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testGetCode($type, $expectedCount)
    {
        $result = $this->_model->getCode($type);
        $this->assertCount($expectedCount, $result);
    }

    /**
     * Data Provider for testGetCode
     * @return array
     */
<<<<<<< HEAD
    public static function getCodeDataProvider()
    {
        return [
            ['method', 28],
=======
    public function getCodeDataProvider()
    {
        return [
            ['method', 21],
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            ['dropoff', 5],
            ['packaging', 7],
            ['containers_filter', 4],
            ['delivery_confirmation_types', 4],
            ['unit_of_measure', 2],
        ];
    }

    /**
<<<<<<< HEAD
     * @param string $code
     */
    #[DataProvider('getCodeUnitOfMeasureDataProvider')]
=======
     * @dataProvider getCodeUnitOfMeasureDataProvider
     * @param string $code
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testGetCodeUnitOfMeasure($code)
    {
        $result = $this->_model->getCode('unit_of_measure', $code);
        $this->assertNotEmpty($result);
    }

    /**
     * Data Provider for testGetCodeUnitOfMeasure
     * @return array
     */
<<<<<<< HEAD
    public static function getCodeUnitOfMeasureDataProvider()
=======
    public function getCodeUnitOfMeasureDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            ['LB'],
            ['KG'],
        ];
    }
}
