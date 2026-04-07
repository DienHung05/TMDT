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

namespace Magento\Catalog\Model\ResourceModel\Attribute;

use Magento\Catalog\Model\ResourceModel\Product\Attribute\CollectionFactory;
use Magento\TestFramework\Helper\Bootstrap;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
use PHPUnit\Framework\TestCase;

/**
 * Tests \Magento\Catalog\Model\ResourceModel\Product\Attribute\Collection
 */
class CollectionTest extends TestCase
{
    /**
     * @var CollectionFactory .
     */
    private $attributesCollectionFactory;

    /**
     * @inheritDoc
     */
    protected function setUp(): void
    {
        $objectManager = Bootstrap::getObjectManager();
        $this->attributesCollectionFactory = $objectManager->get(CollectionFactory::class);
    }

    /**
     * @magentoAppArea adminhtml
<<<<<<< HEAD
=======
     * @dataProvider attributesCollectionGetCurrentPageDataProvider
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     *
     * @param array|null $condition
     * @param int $currentPage
     * @param int $expectedCurrentPage
     * @return void
     */
<<<<<<< HEAD
    #[DataProvider('attributesCollectionGetCurrentPageDataProvider')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testAttributesCollectionGetCurrentPage(
        ?array $condition,
        int $currentPage,
        int $expectedCurrentPage
    ): void {
        $attributeCollection = $this->attributesCollectionFactory->create();
        $attributeCollection->setCurPage($currentPage)->setPageSize(20);

        if ($condition !== null) {
            $attributeCollection->addFieldToFilter('is_global', $condition);
        }

        $this->assertEquals($expectedCurrentPage, (int)$attributeCollection->getCurPage());
    }

    /**
     * @return array[]
     */
<<<<<<< HEAD
    public static function attributesCollectionGetCurrentPageDataProvider(): array
=======
    public function attributesCollectionGetCurrentPageDataProvider(): array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            [
                'condition' => null,
                'currentPage' => 1,
                'expectedCurrentPage' => 1,
            ],
            [
                'condition' => ['eq' => 0],
                'currentPage' => 1,
                'expectedCurrentPage' => 1,
            ],
            [
                'condition' => ['eq' => 0],
                'currentPage' => 15,
                'expectedCurrentPage' => 1,
            ],
        ];
    }
}
