<?php
/**
<<<<<<< HEAD
 * Copyright 2015 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

namespace Magento\Review\Model\ResourceModel\Review\Product;

<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;

=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
/**
 * Tests some functionality of the Product Review collection
 */
class CollectionTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @param string $status
     * @param int $expectedCount
     * @param string $sortAttribute
     * @param string $dir
     * @param callable $assertion
<<<<<<< HEAD
     * @magentoDataFixture Magento/Review/_files/different_reviews.php
     */
    #[DataProvider('sortOrderAssertionsDataProvider')]
=======
     * @dataProvider sortOrderAssertionsDataProvider
     * @magentoDataFixture Magento/Review/_files/different_reviews.php
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testGetResultingIds(
        ?int $status,
        int $expectedCount,
        string $sortAttribute,
        string $dir,
        callable $assertion
    ) {
        /**
         * @var $collection \Magento\Review\Model\ResourceModel\Review\Product\Collection
         */
        $collection = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
            \Magento\Review\Model\ResourceModel\Review\Product\Collection::class
        );
        if ($status) {
            $collection->addStatusFilter($status);
        }
        $collection->setOrder($sortAttribute, $dir);
        $actual = $collection->getResultingIds();
        $this->assertCount($expectedCount, $actual);
        $assertion($actual);
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function sortOrderAssertionsDataProvider() :array
=======
    public function sortOrderAssertionsDataProvider() :array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            [
                \Magento\Review\Model\Review::STATUS_APPROVED,
                2,
                'rt.review_id',
                'DESC',
                function (array $actual) :void {
<<<<<<< HEAD
                    self::assertLessThan($actual[0], $actual[1]);
=======
                    $this->assertLessThan($actual[0], $actual[1]);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                }
            ],
            [
                \Magento\Review\Model\Review::STATUS_APPROVED,
                2,
                'rt.review_id',
                'ASC',
                function (array $actual) :void {
<<<<<<< HEAD
                    self::assertLessThan($actual[1], $actual[0]);
=======
                    $this->assertLessThan($actual[1], $actual[0]);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                }
            ],
            [
                \Magento\Review\Model\Review::STATUS_APPROVED,
                2,
                'rt.created_at',
                'ASC',
                function (array $actual) :void {
<<<<<<< HEAD
                    self::assertLessThan($actual[1], $actual[0]);
=======
                    $this->assertLessThan($actual[1], $actual[0]);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                }
            ],
            [
                null,
                3,
                'rt.review_id',
                'ASC',
                function (array $actual) :void {
<<<<<<< HEAD
                    self::assertLessThan($actual[1], $actual[0]);
=======
                    $this->assertLessThan($actual[1], $actual[0]);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                }
            ]
        ];
    }
}
