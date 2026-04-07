<?php
/**
<<<<<<< HEAD
 * Copyright 2018 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

namespace Magento\Framework\Code\File\Validator;

use Magento\TestFramework\Helper\Bootstrap;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * Class NotProtectedExtension
 */
class NotProtectedExtensionTest extends \PHPUnit\Framework\TestCase
{
    /**
     * Test that phpt, pht is invalid extension type
<<<<<<< HEAD
     */
    #[DataProvider('isValidDataProvider')]
=======
     * @dataProvider isValidDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testIsValid($extension)
    {
        $objectManager = Bootstrap::getObjectManager();
        /** @var \Magento\MediaStorage\Model\File\Validator\NotProtectedExtension $model */
        $model = $objectManager->create(\Magento\MediaStorage\Model\File\Validator\NotProtectedExtension::class);
        $this->assertFalse($model->isValid($extension));
    }

<<<<<<< HEAD
    public static function isValidDataProvider()
=======
    public function isValidDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            ['phpt'],
            ['pht']
        ];
    }
}
