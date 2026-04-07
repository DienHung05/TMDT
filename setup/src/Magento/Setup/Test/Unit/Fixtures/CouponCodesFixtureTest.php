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

namespace Magento\Setup\Test\Unit\Fixtures;

use Magento\Framework\ObjectManager\ObjectManager;
use Magento\SalesRule\Model\Coupon;
<<<<<<< HEAD
use Magento\SalesRule\Model\ResourceModel\Coupon\Collection as CouponCollection;
use Magento\SalesRule\Model\ResourceModel\Coupon\CollectionFactory as CouponCollectionFactory;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
use Magento\SalesRule\Model\Rule;
use Magento\Setup\Fixtures\CartPriceRulesFixture;
use Magento\Setup\Fixtures\CouponCodesFixture;
use Magento\Setup\Fixtures\FixtureModel;
use Magento\Store\Model\StoreManager;
use Magento\Store\Model\Website;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class CouponCodesFixtureTest extends TestCase
{
    /**
     * @var CartPriceRulesFixture
     */
    private $model;

    /**
     * @var MockObject|FixtureModel
     */
    private $fixtureModelMock;

    /**
     * @var \Magento\SalesRule\Model\RuleFactory|MockObject
     */
    private $ruleFactoryMock;

    /**
     * @var \Magento\SalesRule\Model\CouponFactory|MockObject
     */
    private $couponCodeFactoryMock;

    /**
<<<<<<< HEAD
     * @var CouponCollectionFactory|MockObject
     */
    private $couponCollectionFactoryMock;

    /**
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * setUp
     */
    protected function setUp(): void
    {
        $this->fixtureModelMock = $this->createMock(FixtureModel::class);
        $this->ruleFactoryMock = $this->createPartialMock(\Magento\SalesRule\Model\RuleFactory::class, ['create']);
        $this->couponCodeFactoryMock = $this->createPartialMock(
            \Magento\SalesRule\Model\CouponFactory::class,
            ['create']
        );
<<<<<<< HEAD
        $this->couponCollectionFactoryMock = $this->createMock(CouponCollectionFactory::class);
        $this->model = new CouponCodesFixture(
            $this->fixtureModelMock,
            $this->ruleFactoryMock,
            $this->couponCodeFactoryMock,
            $this->couponCollectionFactoryMock
=======
        $this->model = new CouponCodesFixture(
            $this->fixtureModelMock,
            $this->ruleFactoryMock,
            $this->couponCodeFactoryMock
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        );
    }

    /**
     * testExecute
     */
    public function testExecute()
    {
<<<<<<< HEAD
        $couponCollectionMock = $this->createMock(CouponCollection::class);
        $this->couponCollectionFactoryMock->expects($this->once())
            ->method('create')
            ->willReturn($couponCollectionMock);
        $couponCollectionMock->expects($this->once())
            ->method('getSize')
            ->willReturn(0);

=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $websiteMock = $this->createMock(Website::class);
        $websiteMock->expects($this->once())
            ->method('getId')
            ->willReturn('website_id');

        $storeManagerMock = $this->createMock(StoreManager::class);
        $storeManagerMock->expects($this->once())
            ->method('getWebsites')
            ->willReturn([$websiteMock]);

        $objectManagerMock = $this->createMock(ObjectManager::class);
        $objectManagerMock->expects($this->once())
            ->method('create')
            ->willReturn($storeManagerMock);

        $valueMap = [
            ['coupon_codes', 0, 1]
        ];

        $this->fixtureModelMock
            ->expects($this->exactly(1))
            ->method('getValue')
            ->willReturnMap($valueMap);
        $this->fixtureModelMock
            ->expects($this->exactly(1))
            ->method('getObjectManager')
            ->willReturn($objectManagerMock);

        $ruleMock = $this->createMock(Rule::class);
        $this->ruleFactoryMock->expects($this->once())
            ->method('create')
            ->willReturn($ruleMock);

        $couponMock = $this->createMock(Coupon::class);
        $couponMock->expects($this->once())
            ->method('setRuleId')
            ->willReturnSelf();
        $couponMock->expects($this->once())
            ->method('setCode')
            ->willReturnSelf();
        $couponMock->expects($this->once())
            ->method('setIsPrimary')
            ->willReturnSelf();
        $couponMock->expects($this->once())
            ->method('setType')
            ->willReturnSelf();
        $couponMock->expects($this->once())
            ->method('save')
            ->willReturnSelf();
        $this->couponCodeFactoryMock->expects($this->once())
            ->method('create')
            ->willReturn($couponMock);

        $this->model->execute();
    }

    /**
     * testNoFixtureConfigValue
     */
    public function testNoFixtureConfigValue()
    {
<<<<<<< HEAD
        $couponCollectionMock = $this->createMock(CouponCollection::class);
        $this->couponCollectionFactoryMock->expects($this->once())
            ->method('create')
            ->willReturn($couponCollectionMock);
        $couponCollectionMock->expects($this->once())
            ->method('getSize')
            ->willReturn(0);

=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $ruleMock = $this->createMock(Rule::class);
        $ruleMock->expects($this->never())->method('save');

        $objectManagerMock = $this->createMock(ObjectManager::class);
        $objectManagerMock->expects($this->never())
            ->method('get')
            ->with(Rule::class)
            ->willReturn($ruleMock);

        $this->fixtureModelMock
            ->expects($this->never())
            ->method('getObjectManager')
            ->willReturn($objectManagerMock);
        $this->fixtureModelMock
            ->expects($this->once())
            ->method('getValue')
            ->willReturn(false);

        $this->model->execute();
    }

<<<<<<< HEAD
    public function testFixtureAlreadyCreated()
    {
        $couponCollectionMock = $this->createMock(CouponCollection::class);
        $this->couponCollectionFactoryMock->expects($this->once())
            ->method('create')
            ->willReturn($couponCollectionMock);
        $couponCollectionMock->expects($this->once())
            ->method('getSize')
            ->willReturn(1);

        $this->fixtureModelMock
            ->expects($this->once())
            ->method('getValue')
            ->willReturn(1);

        $this->fixtureModelMock->expects($this->never())->method('getObjectManager');
        $this->ruleFactoryMock->expects($this->never())->method('create');
        $this->couponCodeFactoryMock->expects($this->never())->method('create');

        $this->model->execute();
    }

=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    /**
     * testGetActionTitle
     */
    public function testGetActionTitle()
    {
        $this->assertSame('Generating coupon codes', $this->model->getActionTitle());
    }

    /**
     * testIntroduceParamLabels
     */
    public function testIntroduceParamLabels()
    {
        $this->assertSame(['coupon_codes' => 'Coupon Codes'], $this->model->introduceParamLabels());
    }
}
