<?php
/**
<<<<<<< HEAD
 * Copyright 2015 Adobe
 * All Rights Reserved.
 */
namespace Magento\Developer\Model\Config\Backend;

use PHPUnit\Framework\Attributes\DataProvider;

=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Developer\Model\Config\Backend;

>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
class AllowedIpsTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @param string $value
     * @param string $expected
     * @magentoDbIsolation enabled
<<<<<<< HEAD
     */
    #[DataProvider('fieldDataProvider')]
=======
     * @dataProvider fieldDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testSaveWithEscapeHtml($value, $expected)
    {
        /**
         * @var \Magento\Developer\Model\Config\Backend\AllowedIps
         */
        $model = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
            \Magento\Developer\Model\Config\Backend\AllowedIps::class
        );
        $model->setValue($value);
        $model->setPath('path');
        $model->beforeSave();
        $model->save();
        $this->assertEquals($expected, $model->getValue());
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function fieldDataProvider()
=======
    public function fieldDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            ['<'.'script>alert(\'XSS\')</script>', '' ],
            ['10.64.202.22, <'.'script>alert(\'XSS\')</script>', '10.64.202.22' ]
        ];
    }
}
