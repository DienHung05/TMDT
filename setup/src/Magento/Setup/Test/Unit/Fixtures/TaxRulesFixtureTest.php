<?php
/**
<<<<<<< HEAD
 * Copyright 2017 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

namespace Magento\Setup\Test\Unit\Fixtures;

use Magento\Framework\App\Config\Storage\Writer as ConfigWriter;
use Magento\Setup\Fixtures\FixtureModel;
use Magento\Setup\Fixtures\TaxRulesFixture;
use Magento\Tax\Api\Data\TaxRateInterfaceFactory;
<<<<<<< HEAD
use Magento\Tax\Api\Data\TaxRateInterface;
use Magento\Tax\Api\Data\TaxRuleInterface;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
use Magento\Tax\Api\Data\TaxRuleInterfaceFactory;
use Magento\Tax\Api\TaxRateRepositoryInterface;
use Magento\Tax\Api\TaxRuleRepositoryInterface;
use Magento\Tax\Model\ResourceModel\Calculation\Rate\CollectionFactory;
<<<<<<< HEAD
use Magento\Tax\Model\ResourceModel\Calculation\Rate\Collection;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class TaxRulesFixtureTest extends TestCase
{

    /**
     * @var MockObject|FixtureModel
     */
    private $fixtureModelMock;

    /**
     * @var TaxRulesFixture
     */
    private $model;

    /**
     * @var ConfigWriter
     */
    private $configWriterMock;

    /**
     * @var TaxRateInterfaceFactory
     */
    private $taxRateRepositoryMock;

    /**
     * @var
     */
    private $taxRateFactoryMock;

    /**
     * @var CollectionFactory
     */
    private $taxRateCollectionFactoryMock;

    /**
     * @var TaxRuleInterfaceFactory
     */
    private $taxRuleFactoryMock;

    /**
     * @var TaxRuleRepositoryInterface
     */
    private $taxRuleRepositoryMock;

    public function testExecute()
    {
        $this->fixtureModelMock = $this->getMockBuilder(FixtureModel::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->taxRateFactoryMock = $this->getMockBuilder(TaxRateInterfaceFactory::class)
            ->disableOriginalConstructor()
            ->getMock();

<<<<<<< HEAD
        // Configure taxRateFactory to return a mock TaxRateInterface
        $taxRateMock = $this->createMock(TaxRateInterface::class);
        $taxRateMock->method('setCode')->willReturnSelf();
        $taxRateMock->method('setRate')->willReturnSelf();
        $taxRateMock->method('setTaxCountryId')->willReturnSelf();
        $taxRateMock->method('setTaxPostcode')->willReturnSelf();
        $this->taxRateFactoryMock->method('create')->willReturn($taxRateMock);

        $this->taxRateRepositoryMock = $this->getMockBuilder(TaxRateRepositoryInterface::class)
            ->disableOriginalConstructor()
            ->getMock();
        
        // Configure taxRateRepository to return a mock with getId() when save() is called
        $taxRateDataMock = $this->createMock(TaxRateInterface::class);
        $taxRateDataMock->method('getId')->willReturn(1);
        $this->taxRateRepositoryMock->method('save')->willReturn($taxRateDataMock);
=======
        $this->taxRateRepositoryMock = $this->getMockBuilder(TaxRateRepositoryInterface::class)
            ->disableOriginalConstructor()
            ->getMockForAbstractClass();
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

        $this->configWriterMock = $this->getMockBuilder(ConfigWriter::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->taxRuleFactoryMock = $this->getMockBuilder(TaxRuleInterfaceFactory::class)
            ->disableOriginalConstructor()
            ->getMock();
<<<<<<< HEAD
        
        // Configure taxRuleFactory to return a mock TaxRuleInterface
        $taxRuleMock = $this->createMock(TaxRuleInterface::class);
        $taxRuleMock->method('setCode')->willReturnSelf();
        $taxRuleMock->method('setTaxRateIds')->willReturnSelf();
        $taxRuleMock->method('setCustomerTaxClassIds')->willReturnSelf();
        $taxRuleMock->method('setProductTaxClassIds')->willReturnSelf();
        $taxRuleMock->method('setPriority')->willReturnSelf();
        $taxRuleMock->method('setPosition')->willReturnSelf();
        $this->taxRuleFactoryMock->method('create')->willReturn($taxRuleMock);

        $this->taxRuleRepositoryMock = $this->getMockBuilder(TaxRuleRepositoryInterface::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['save', 'get', 'delete', 'deleteById', 'getList'])
            ->getMock();
=======

        $this->taxRuleRepositoryMock = $this->getMockBuilder(TaxRuleRepositoryInterface::class)
            ->disableOriginalConstructor()
            ->setMethods(['save', 'get', 'delete', 'deleteById', 'getList'])
            ->getMockForAbstractClass();
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

        $this->fixtureModelMock
            ->expects($this->exactly(2))
            ->method('getValue')
            ->willReturnMap([
                ['tax_mode', 'VAT'],
                ['tax_rules', 2]
            ]);

        $this->taxRateCollectionFactoryMock = $this->getMockBuilder(CollectionFactory::class)
            ->disableOriginalConstructor()
<<<<<<< HEAD
            ->onlyMethods(['create'])
=======
            ->setMethods(['create'])
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            ->getMock();

        $taxRateCollectionMock = $this->getMockBuilder(Collection::class)
            ->disableOriginalConstructor()
<<<<<<< HEAD
            ->onlyMethods(['getAllIds'])
=======
            ->setMethods(['getAllIds'])
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            ->getMock();

        $this->taxRateCollectionFactoryMock->expects($this->once())
            ->method('create')
            ->willReturn($taxRateCollectionMock);

        $taxRateCollectionMock->expects($this->once())
            ->method('getAllIds')
            ->willReturn([1]);

        $this->model = new TaxRulesFixture(
            $this->fixtureModelMock,
            $this->taxRuleRepositoryMock,
            $this->taxRuleFactoryMock,
            $this->taxRateCollectionFactoryMock,
            $this->taxRateFactoryMock,
            $this->taxRateRepositoryMock,
            $this->configWriterMock
        );

        $this->model->execute();
    }
}
