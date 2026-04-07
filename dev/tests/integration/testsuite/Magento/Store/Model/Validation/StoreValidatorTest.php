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

namespace Magento\Store\Model\Validation;

use Magento\Store\Model\Store;
use Magento\TestFramework\Helper\Bootstrap;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
use PHPUnit\Framework\TestCase;

class StoreValidatorTest extends TestCase
{
    /**
     * @var StoreValidator
     */
    private $storeValidator;

    protected function setUp(): void
    {
        $this->storeValidator =  Bootstrap::getObjectManager()->create(StoreValidator::class);
    }

    /**
<<<<<<< HEAD
     * @param Store $store
     * @param bool $isValid
     */
    #[DataProvider('isValidDataProvider')]
=======
     * @dataProvider isValidDataProvider
     * @param Store $store
     * @param bool $isValid
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testIsValid(Store $store, bool $isValid): void
    {
        $result = $this->storeValidator->isValid($store);
        $this->assertEquals($isValid, $result);
    }

<<<<<<< HEAD
    public static function isValidDataProvider(): array
=======
    public function isValidDataProvider(): array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        $validStore = Bootstrap::getObjectManager()->create(Store::class);
        $validStore->setName('name');
        $validStore->setCode('code');
        $emptyStore = Bootstrap::getObjectManager()->create(Store::class);
        $storeWithEmptyName = Bootstrap::getObjectManager()->create(Store::class);
        $storeWithEmptyName->setCode('code');
        $storeWithEmptyCode = Bootstrap::getObjectManager()->create(Store::class);
        $storeWithEmptyCode->setName('name');
        $storeWithInvalidCode = Bootstrap::getObjectManager()->create(Store::class);
        $storeWithInvalidCode->setName('name');
        $storeWithInvalidCode->setCode('5');

        return [
            [$validStore, true],
            [$emptyStore, false],
            [$storeWithEmptyName, false],
            [$storeWithEmptyCode, false],
            [$storeWithInvalidCode, false],
        ];
    }
}
