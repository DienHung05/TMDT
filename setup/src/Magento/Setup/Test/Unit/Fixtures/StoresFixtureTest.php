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

namespace Magento\Setup\Test\Unit\Fixtures;

use Magento\Catalog\Api\Data\CategoryInterface;
use Magento\Catalog\Model\CategoryFactory;
use Magento\Framework\App\Config\Storage\Writer;
use Magento\Framework\Event\ManagerInterface;
use Magento\Framework\Locale\Config;
<<<<<<< HEAD
use Magento\Framework\TestFramework\Unit\Helper\MockCreationTrait;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
use Magento\Setup\Fixtures\FixtureModel;
use Magento\Setup\Fixtures\StoresFixture;
use Magento\Store\Api\Data\GroupInterface;
use Magento\Store\Api\Data\StoreInterface;
use Magento\Store\Api\Data\WebsiteInterface;
use Magento\Store\Model\StoreManager;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class StoresFixtureTest extends TestCase
{
<<<<<<< HEAD
    use MockCreationTrait;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

    /**
     * @var MockObject|FixtureModel
     */
    private $fixtureModelMock;

    /**
     * @var StoresFixture
     */
    private $model;

    /**
     * @var StoreManager
     */
    private $storeManagerMock;

    /**
     * @var ManagerInterface
     */
    private $eventManagerMock;

    /**
     * @var CategoryFactory
     */
    private $categoryFactoryMock;

    /**
     * @var Writer
     */
    private $scopeConfigMock;

    /**
     * @var Config
     */
    private $localeConfigMock;

    /**
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function testExecute()
    {
        $this->fixtureModelMock = $this->getMockBuilder(FixtureModel::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->storeManagerMock = $this->getMockBuilder(StoreManager::class)
            ->disableOriginalConstructor()
<<<<<<< HEAD
            ->onlyMethods(
=======
            ->setMethods(
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                [
                    'getGroup',
                    'getGroups',
                    'getWebsite',
                    'getDefaultStoreView',
                    'getStore',
                    'getStores',
                ]
            )->getMock();

        $this->eventManagerMock = $this->getMockBuilder(ManagerInterface::class)
            ->disableOriginalConstructor()
<<<<<<< HEAD
            ->getMock();

        $this->categoryFactoryMock = $this->getMockBuilder(CategoryFactory::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['create'])
            ->getMock();

        $categoryMock = $this->createPartialMockWithReflection(
            CategoryInterface::class,
            [
                'getId', 'setId', 'getParentId', 'setParentId', 'getName', 'setName',
                'getIsActive', 'setIsActive', 'getPosition', 'setPosition', 'getLevel', 'setLevel',
                'getChildren', 'getCreatedAt', 'setCreatedAt', 'getUpdatedAt', 'setUpdatedAt',
                'getPath', 'setPath', 'getAvailableSortBy', 'setAvailableSortBy',
                'getIncludeInMenu', 'setIncludeInMenu', 'getExtensionAttributes', 'setExtensionAttributes',
                'getCustomAttribute', 'setCustomAttribute', 'getCustomAttributes', 'setCustomAttributes',
                'setDefaultSortBy', 'save'
            ]
        );
=======
            ->getMockForAbstractClass();

        $this->categoryFactoryMock = $this->getMockBuilder(CategoryFactory::class)
            ->disableOriginalConstructor()
            ->setMethods(['create'])
            ->getMock();

        $categoryMock = $this->getMockBuilder(CategoryInterface::class)
            ->disableOriginalConstructor()
            ->setMethods(
                [
                    'create',
                    'setName',
                    'setPath',
                    'setLevel',
                    'setAvailableSortBy',
                    'setDefaultSortBy',
                    'setIsActive',
                    'save'
                ]
            )
            ->getMockForAbstractClass();
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

        $this->categoryFactoryMock->expects($this->exactly(5))
            ->method('create')
            ->willReturn($categoryMock);

        $categoryMock->expects($this->exactly(5))
            ->method('setName')
            ->willReturn($categoryMock);

        $categoryMock->expects($this->exactly(5))
            ->method('setPath')
            ->willReturn($categoryMock);

        $categoryMock->expects($this->exactly(5))
            ->method('setLevel')
            ->willReturn($categoryMock);

        $categoryMock->expects($this->exactly(5))
            ->method('setAvailableSortBy')
            ->willReturn($categoryMock);

        $categoryMock->expects($this->exactly(5))
            ->method('setDefaultSortBy')
            ->willReturn($categoryMock);

        $categoryMock->expects($this->exactly(5))
            ->method('setIsActive')
            ->willReturn($categoryMock);

        $categoryMock->expects($this->exactly(5))
            ->method('getId')
            ->willReturn($categoryMock);

        $categoryMock->expects($this->exactly(5))
            ->method('save')
            ->willReturn($categoryMock);

        $this->localeConfigMock = $this->getMockBuilder(Config::class)
            ->disableOriginalConstructor()
<<<<<<< HEAD
            ->onlyMethods(['getAllowedLocales'])
=======
            ->setMethods(['getAllowedLocales'])
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            ->getMock();

        $this->localeConfigMock->expects($this->once())
            ->method('getAllowedLocales')
            ->willReturn(['en_US']);

        $this->scopeConfigMock = $this->getMockBuilder(Writer::class)
            ->disableOriginalConstructor()
            ->getMock();

<<<<<<< HEAD
        $storeMock = $this->createPartialMockWithReflection(
            StoreInterface::class,
            [
                'getId', 'setId', 'getCode', 'setCode', 'getName', 'setName',
                'getWebsiteId', 'setWebsiteId', 'getStoreGroupId', 'setIsActive',
                'getIsActive', 'setStoreGroupId', 'getExtensionAttributes', 'setExtensionAttributes',
                'addData', 'save'
            ]
        );
=======
        $storeMock = $this->getMockBuilder(StoreInterface::class)
            ->disableOriginalConstructor()
            ->setMethods(['getId', 'getRootCategoryId', 'addData', 'save'])
            ->getMockForAbstractClass();
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

        $storeMock->expects($this->exactly(11))
            ->method('getId')
            ->willReturn(1);

        $storeMock->expects($this->exactly(11))
            ->method('addData')
<<<<<<< HEAD
            ->willReturnCallback(function ($arg) use ($storeMock) {
                if (isset($arg['code'])) {
                    return $storeMock;
                }
            });

        $storeGroupMock = $this->createPartialMockWithReflection(
            GroupInterface::class,
            [
                'getId', 'setId', 'getWebsiteId', 'setWebsiteId', 'getRootCategoryId', 'setRootCategoryId',
                'getDefaultStoreId', 'setDefaultStoreId', 'getName', 'setName', 'getCode', 'setCode',
                'getExtensionAttributes', 'setExtensionAttributes', 'addData', 'save'
            ]
        );
=======
            ->withConsecutive(
                [
                    [
                        'store_id' => null,
                        'name' => 'Store view 2 - website_id_1 - group_id_1',
                        'website_id' => 1,
                        'group_id' => 1,
                        'code' => 'store_view_2',
                    ]
                ],
                [
                    [
                        'store_id' => null,
                        'name' => 'Store view 3 - website_id_1 - group_id_1',
                        'website_id' => 1,
                        'group_id' => 1,
                        'code' => 'store_view_3',
                    ]
                ]
            )
            ->willReturn($storeMock);

        $storeGroupMock = $this->getMockBuilder(GroupInterface::class)
            ->disableOriginalConstructor()
            ->setMethods(['getId', 'addData', 'save'])
            ->getMockForAbstractClass();
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

        $storeGroupMock->expects($this->exactly(11))
            ->method('getId')
            ->willReturn(1);

        $storeGroupMock->expects($this->exactly(5))
            ->method('addData')
<<<<<<< HEAD
            ->willReturnCallback(function ($arg) use ($storeGroupMock) {
                if ($arg['code'] == 'store_group_2' || $arg['code'] == 'store_group_3') {
                    return $storeGroupMock;
                }
            });

        $websiteMock = $this->createPartialMockWithReflection(
            WebsiteInterface::class,
            [
                'getId', 'setId', 'getCode', 'setCode', 'getName', 'setName',
                'getDefaultGroupId', 'setDefaultGroupId', 'getExtensionAttributes', 'setExtensionAttributes',
                'addData', 'save'
            ]
        );
=======
            ->withConsecutive(
                [
                    [
                        'group_id' => null,
                        'website_id' => 1,
                        'name' => 'Store Group 2 - website_id_1',
                        'code' => 'store_group_2',
                        'root_category_id' => $categoryMock,
                    ]
                ],
                [
                    [
                        'group_id' => null,
                        'website_id' => 1,
                        'name' => 'Store Group 3 - website_id_1',
                        'code' => 'store_group_3',
                        'root_category_id' => $categoryMock,
                    ]
                ]
            )
            ->willReturn($storeGroupMock);

        $websiteMock = $this->getMockBuilder(WebsiteInterface::class)
            ->disableOriginalConstructor()
            ->setMethods(['getId', 'addData', 'save'])
            ->getMockForAbstractClass();
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

        $websiteMock->expects($this->exactly(3))
            ->method('getId')
            ->willReturn(1);

        $websiteMock->expects($this->exactly(2))
            ->method('addData')
<<<<<<< HEAD
            ->willReturnCallback(function ($arg) use ($storeGroupMock) {
                if ($arg['code'] == 'website_2' || $arg['code'] == 'website_3') {
                    return $storeGroupMock;
                }
            });
=======
            ->withConsecutive(
                [
                    [
                        'website_id' => null,
                        'code' => 'website_2',
                        'name' => 'Website 2',
                        'is_default' => false,
                    ]
                ],
                [
                    [
                        'website_id' => null,
                        'code' => 'website_3',
                        'name' => 'Website 3',
                        'is_default' => false,
                    ]
                ]
            )
            ->willReturn($storeGroupMock);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

        $this->storeManagerMock->expects($this->once())
            ->method('getGroups')
            ->willReturn([$storeGroupMock]);

        $this->storeManagerMock->expects($this->once())
            ->method('getGroup')
            ->willReturn($storeGroupMock);

        $this->storeManagerMock->expects($this->once())
            ->method('getWebsite')
            ->willReturn($websiteMock);

        $this->storeManagerMock->expects($this->once())
            ->method('getStores')
            ->willReturn([$storeMock]);

        $this->storeManagerMock->expects($this->once())
            ->method('getDefaultStoreView')
            ->willReturn($storeMock);

        $this->fixtureModelMock
            ->expects($this->exactly(4))
            ->method('getValue')
            ->willReturnMap([
                ['websites', 1, 3],
                ['store_groups', 1, 6],
                ['store_views', 1, 12],
                ['assign_entities_to_all_websites', false]
            ]);

        $this->model = new StoresFixture(
            $this->fixtureModelMock,
            $this->storeManagerMock,
            $this->eventManagerMock,
            $this->categoryFactoryMock,
            $this->localeConfigMock,
            $this->scopeConfigMock
        );

        $this->model->execute();
    }
}
