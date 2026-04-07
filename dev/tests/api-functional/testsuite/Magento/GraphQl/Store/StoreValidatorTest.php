<?php
/**
<<<<<<< HEAD
 * Copyright 2019 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

namespace Magento\GraphQl\Store;

use Magento\TestFramework\TestCase\GraphQlAbstract;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * Test the GraphQL `Store` header validation
 */
class StoreValidatorTest extends GraphQlAbstract
{
    /**
<<<<<<< HEAD
     * Test invalid store header
     *
     * @param string $storeCode
     * @param string $errorMessage
     * @magentoApiDataFixture Magento/Store/_files/inactive_store.php
     */
    #[DataProvider('dataProviderInvalidStore')]
=======
     * @param string $storeCode
     * @param string $errorMessage
     *
     * @dataProvider dataProviderInvalidStore
     * @magentoApiDataFixture Magento/Store/_files/inactive_store.php
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testInvalidStoreHeader(string $storeCode, string $errorMessage)
    {
        $query
            = <<<QUERY
{
  storeConfig{
    code
  }
}
QUERY;
        $this->expectExceptionMessage($errorMessage);
        $this->graphQlMutation($query, [], '', ['Store' => $storeCode]);
    }

    /**
     * Data provider with invalid store codes and expected error messages
     *
     * @return array
     */
<<<<<<< HEAD
    public static function dataProviderInvalidStore(): array
=======
    public function dataProviderInvalidStore(): array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            'non_existing' => [
                'non_existing',
                'Requested store is not found'
            ],
            'inactive_store' => [
                'inactive_store',
                'Requested store is not found'
            ]
        ];
    }
}
