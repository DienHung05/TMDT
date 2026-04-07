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

namespace Magento\GraphQl\Catalog;

use Magento\TestFramework\Helper\Bootstrap;
use Magento\TestFramework\ObjectManager;
use Magento\TestFramework\TestCase\GraphQlAbstract;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * Test is categories enabled for specific storeView
 *
 * Preconditions:
 *   Fixture with enabled and disabled categories in two stores created
 * Steps:
 *  Set Headers - Store = ukrainian
 *  Send Request:
 *   query{
 *    category(id: %categoryId%){
 *     id
 *     name
 *    }
 *   }
 *  Expected response:
 *   {
 *    "category": {
 *     "id": %categoryId%,
 *     "name": "Category_UA"
 *    }
 *   }
 *
 * @magentoApiDataFixture Magento/Catalog/_files/category_enabled_for_store.php
 */
class CategoryEnabledTest extends GraphQlAbstract
{
    /**
     * @var ObjectManager
     */
    private $objectManager;

    /**
     * @inheritdoc
     */
    protected function setUp(): void
    {
        $this->objectManager = Bootstrap::getObjectManager();
    }

    /**
     * Verify that category enabled for specific store view
     *
     * @param string $query
     * @param string $storeCode
     * @param array $category
     * @return void
     * @throws \Exception
<<<<<<< HEAD
     */
    #[DataProvider('categoryEnabledDataProvider')]
=======
     * @dataProvider categoryEnabledDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testCategoryEnabledForSpecificStoreView(string $query, string $storeCode, array $category): void
    {
        $response = $this->graphQlQuery($query, [], '', ['store' => $storeCode]);

        // check are there any items in the return data
        self::assertNotNull($response['category'], 'category must not be null');

        // check entire response
        $this->assertResponseFields($response, $category);
    }

    /**
     * Verify that category disabled for specific store view
     *
     * @param string $query
     * @param string $storeCode
     * @param array $category
     * @return void
     * @throws \Exception
<<<<<<< HEAD
     */
    #[DataProvider('categoryDisabledDataProvider')]
=======
     * @dataProvider categoryDisabledDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testCategoryDisabledForSpecificStoreView(string $query, string $storeCode, array $category): void
    {
        $this->markTestSkipped(
            'GraphQL response currently return Exception instead of data structure - MC-20132'
        );
        $response = $this->graphQlQuery($query, [], '', ['store' => $storeCode]);

        // check are there any items in the return data
        self::assertNotNull($response['category'], 'category must not be null');

        // check entire response
        $this->assertResponseFields($response, $category);
    }

    /**
     * Data provider for enabled category
     *
     * @return array
     */
<<<<<<< HEAD
    public static function categoryEnabledDataProvider(): array
    {
        return [
            [
                'query' => self::getQuery(44),
                'storeCode' => 'default',
                'category' => [
=======
    public function categoryEnabledDataProvider(): array
    {
        return [
            [
                'query' => $this->getQuery(44),
                'store' => 'default',
                'data' => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    'category' => [
                        'id' => 44,
                        'name' => 'Category_UA',
                    ],
                ]
            ],
        ];
    }

    /**
     * Data provider for disabled category
     *
     * @return array[][]
     */
<<<<<<< HEAD
    public static function categoryDisabledDataProvider(): array
    {
        return [
            [
                'query' => self::getQuery(33),
                'storeCode' => 'english',
                'category' => [
=======
    public function categoryDisabledDataProvider(): array
    {
        return [
            [
                'query' => $this->getQuery(33),
                'store' => 'english',
                'data' => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    'category' => null,
                ],
            ],
        ];
    }

    /**
     * Return GraphQL query string by categoryId
     *
     * @param int $categoryId
     * @return string
     */
<<<<<<< HEAD
    private static function getQuery(int $categoryId): string
=======
    private function getQuery(int $categoryId): string
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return <<<QUERY
{
    category(id: {$categoryId}){
        id
        name
    }
}
QUERY;
    }
}
