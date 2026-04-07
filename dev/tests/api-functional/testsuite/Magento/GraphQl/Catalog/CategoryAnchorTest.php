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
 * Test is categories anchor or not
 *
 * Preconditions:
 *   Fixture with anchor and not-anchored categories created
 * Steps:
 *  Send Request:
 *   query{
 *    category(id: %categoryId%){
 *     id
 *     name
 *     is_anchor
 *     product_count
 *     products(pageSize: 10, currentPage: 1){
 *     items{
 *     name
 *     }
 *    }
 *   }
 *  Expected response:
 * {
 *    "category": {
 *       "id": %category1Id%,
 *       "name": Category_Anchor,
 *       "is_anchor": 1,
 *       "product_count": 2,
 *       "products": {
 *         "items": [
 *           {
 *             "name": "Product1",
 *             "name": "Product2"
 *           }
 *         ]
 *      }
 *   }
 * }
 */
class CategoryAnchorTest extends GraphQlAbstract
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
     * Verify that request returns correct values for given category
     *
     * @magentoApiDataFixture Magento/Catalog/_files/category_anchor.php
     * @param string $query
     * @param string $storeCode
     * @param array $category
     * @return void
     * @throws \Exception
<<<<<<< HEAD
     */
    #[DataProvider('categoryAnchorDataProvider')]
=======
     * @dataProvider categoryAnchorDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testCategoryAnchor(string $query, string $storeCode, array $category): void
    {
        $response = $this->graphQlQuery($query, [], '', ['store' => $storeCode]);

        // check are there any items in the return data
        self::assertNotNull($response['category'], 'category must not be null');

        // check entire response
        $this->assertResponseFields($response, $category);
    }

    /**
     * Data provider for anchored category and product inside
     *
     * @return array[][]
     */
<<<<<<< HEAD
    public static function categoryAnchorDataProvider(): array
    {
        return [
            [
                'query' => self::getQuery(22),
                'storeCode' => 'default',
                'category' => [
=======
    public function categoryAnchorDataProvider(): array
    {
        return [
            [
                'query' => $this->getQuery(22),
                'store' => 'default',
                'data' => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    'category' => [
                        'id' => 22,
                        'name' => 'Category_Anchor',
                        'is_anchor' => 1,
                        'product_count' => 2,
                        'products' => [
                            'items' => [
                                ['name' => 'Product1'],
                                ['name' => 'Product2'],
                            ],
                        ],
                    ],
                ],
            ],
            [
<<<<<<< HEAD
                'query' => self::getQuery(11),
                'storeCode' => 'default',
                'category' => [
=======
                'query' => $this->getQuery(11),
                'store' => 'default',
                'data' => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    'category' => [
                        'id' => 11,
                        'name' => 'Category_Default',
                        'is_anchor' => 0,
                        'product_count' => 1,
                        'products' => [
                            'items' => [
                                ['name' => 'Product1'],
                            ],
                        ],
                    ],
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
        is_anchor
        product_count
        products(pageSize: 10, currentPage: 1, sort: {name: ASC}){
            items{
                name
            }
        }
    }
}
QUERY;
    }
}
