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

namespace Magento\Cms\Model\ResourceModel\Page\Grid;

use Magento\Cms\Model\ResourceModel\Page;
use Magento\Framework\ObjectManagerInterface;
use Magento\Framework\Stdlib\DateTime\TimezoneInterface;
use Magento\TestFramework\Helper\Bootstrap;
use PHPUnit\Framework\TestCase;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

class CollectionTest extends TestCase
{
    /**
     * @var ObjectManagerInterface
     */
    private $objectManager;

    /**
     * @inheritDoc
     */
    protected function setUp(): void
    {
        $this->objectManager = Bootstrap::getObjectManager();
    }

    /**
     * Verifies that filter condition date is being converted to config timezone before select sql query
     *
<<<<<<< HEAD
     * @return void
     */
    #[DataProvider('getCollectionFiltersDataProvider')]
=======
     * @dataProvider getCollectionFiltersDataProvider
     * @return void
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testAddFieldToFilter($field): void
    {
        $filterDate = "2021-12-06 00:00:00";
        /** @var TimezoneInterface $timeZone */
        $timeZone = $this->objectManager->get(TimezoneInterface::class);
        /** @var Collection $gridCollection */
        $gridCollection = $this->objectManager->create(
            Collection::class,
            [
                'mainTable' => 'cms_page',
                'resourceModel' => Page::class
            ]
        );
<<<<<<< HEAD
        $filterDate = new \DateTime($filterDate);
        $filterDate->setTimezone(new \DateTimeZone($timeZone->getConfigTimezone()));
        $convertedDate = $timeZone->convertConfigTimeToUtc($filterDate);

        $collection = $gridCollection->addFieldToFilter($field, ['qteq' => $filterDate->format('Y-m-d H:i:s')]);
=======
        $convertedDate = $timeZone->convertConfigTimeToUtc($filterDate);

        $collection = $gridCollection->addFieldToFilter($field, ['qteq' => $filterDate]);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $expectedSelectCondition = "`{$field}` = '{$convertedDate}'";

        $this->assertStringContainsString($expectedSelectCondition, $collection->getSelectSql(true));
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function getCollectionFiltersDataProvider(): array
=======
    public function getCollectionFiltersDataProvider(): array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            'cms_page_collection_for_creation_time' => [
                'field' => 'creation_time',
            ],
            'cms_page_collection_for_order_update_time' => [
                'field' => 'update_time',
            ],
        ];
    }
}
