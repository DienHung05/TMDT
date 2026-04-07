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

namespace Magento\Catalog\Controller\Adminhtml\Category\Save;

use Magento\CatalogUrlRewrite\Model\Map\DataCategoryUrlRewriteDatabaseMap;
use Magento\UrlRewrite\Model\ResourceModel\UrlRewriteCollectionFactory;
use Magento\UrlRewrite\Service\V1\Data\UrlRewrite;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * Class defines url rewrite creation for category save controller
 *
 * @magentoAppArea adminhtml
 * @magentoDbIsolation enabled
 */
class UrlRewriteTest extends AbstractSaveCategoryTest
{
    /**
     * @var UrlRewriteCollectionFactory
     */
    private $urlRewriteCollectionFactory;

    /**
     * @inheritdoc
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->urlRewriteCollectionFactory = $this->_objectManager->get(UrlRewriteCollectionFactory::class);
    }

    /**
     * @magentoConfigFixture default/catalog/seo/generate_category_product_rewrites 1
<<<<<<< HEAD
     * @param array $data
     * @return void
     */
    #[DataProvider('categoryDataProvider')]
=======
     * @dataProvider categoryDataProvider
     * @param array $data
     * @return void
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testUrlRewrite(array $data): void
    {
        $responseData = $this->performSaveCategoryRequest($data);
        $this->assertRequestIsSuccessfullyPerformed($responseData);
        $categoryId = $responseData['category']['entity_id'];
        $this->assertNotNull($categoryId, 'The category was not created');
        $urlRewriteCollection = $this->urlRewriteCollectionFactory->create();
        $urlRewriteCollection->addFieldToFilter(UrlRewrite::ENTITY_ID, ['eq' => $categoryId])
            ->addFieldToFilter(UrlRewrite::ENTITY_TYPE, ['eq' => DataCategoryUrlRewriteDatabaseMap::ENTITY_TYPE]);
        $this->assertEquals(1, $urlRewriteCollection->getSize(), 'Wrong count of url rewrites was created');
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function categoryDataProvider(): array
=======
    public function categoryDataProvider(): array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            'url_rewrite_is_created_during_category_save' => [
                [
                    'path' => '1/2',
                    'name' => 'Custom Name',
                    'parent' => 2,
                    'is_active' => '0',
                    'include_in_menu' => '1',
                    'display_mode' => 'PRODUCTS',
                    'is_anchor' => true,
                    'use_config' => [
                        'available_sort_by' => 1,
                        'default_sort_by' => 1,
                        'filter_price_range' => 1,
                    ],
                ],
            ],
        ];
    }
}
