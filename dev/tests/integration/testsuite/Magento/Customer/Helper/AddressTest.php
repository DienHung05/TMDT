<?php
/**
<<<<<<< HEAD
 * Copyright 2014 Adobe
 * All Rights Reserved.
 */
namespace Magento\Customer\Helper;

use PHPUnit\Framework\Attributes\DataProvider;

=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Customer\Helper;

>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
class AddressTest extends \PHPUnit\Framework\TestCase
{
    /** @var \Magento\Customer\Helper\Address */
    protected $helper;

    protected function setUp(): void
    {
        $this->helper = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->get(
            \Magento\Customer\Helper\Address::class
        );
    }

    /**
     * @param $attributeCode
<<<<<<< HEAD
     */
    #[DataProvider('getAttributeValidationClass')]
=======
     * @dataProvider getAttributeValidationClass
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testGetAttributeValidationClass($attributeCode, $expectedClass)
    {
        $this->assertEquals($expectedClass, $this->helper->getAttributeValidationClass($attributeCode));
    }

<<<<<<< HEAD
    public static function getAttributeValidationClass()
=======
    public function getAttributeValidationClass()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            ['bad-code', ''],
            ['city', 'required-entry'],
            ['company', ''],
            ['country_id', 'required-entry'],
            ['fax', ''],
            ['firstname', 'required-entry'],
            ['lastname', 'required-entry'],
            ['middlename', ''],
            ['postcode', '']
        ];
    }
}
