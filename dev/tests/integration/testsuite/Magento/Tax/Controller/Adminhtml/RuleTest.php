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
namespace Magento\Tax\Controller\Adminhtml;

use Magento\Directory\Model\CountryFactory;
use Magento\Directory\Model\RegionFactory;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Json\Helper\Data;
use Magento\Tax\Api\Data\TaxRateInterfaceFactory;
use Magento\Tax\Api\TaxRateRepositoryInterface;
use Magento\TestFramework\Helper\Bootstrap;
use Magento\Tax\Api\Data\TaxRateInterface;
use Magento\Tax\Model\TaxRuleFixtureFactory;
use Magento\Tax\Model\Rate\Provider as RatesProvider;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * Tests for Tax Rules controllers.
 *
 * @magentoAppArea adminhtml
 */
class RuleTest extends \Magento\TestFramework\TestCase\AbstractBackendController
{
    /**
     * TaxRate factory
     *
     * @var TaxRateInterfaceFactory
     */
    private $taxRateFactory;

    /**
     * TaxRateService
     *
     * @var TaxRateRepositoryInterface
     */
    private $rateRepository;

    /**
     * Helps in creating required tax rules.
     *
     * @var TaxRuleFixtureFactory
     */
    private $taxRateFixtureFactory;

    /**
     * @var CountryFactory
     */
    private $countryFactory;

    /**
     * @var  RegionFactory
     */
    private $regionFactory;

    /**
     * @var DataObjectHelper
     */
    private $dataObjectHelper;

    /**
     * @var RatesProvider
     */
    private $taxRatesProvider;

    /**
     * @inheritdoc
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->rateRepository = $this->_objectManager->get(TaxRateRepositoryInterface::class);
        $this->taxRateFactory = $this->_objectManager->create(TaxRateInterfaceFactory::class);
        $this->dataObjectHelper = $this->_objectManager->create(DataObjectHelper::class);
        $this->taxRateFixtureFactory = new TaxRuleFixtureFactory();
        $this->countryFactory = $this->_objectManager->create(CountryFactory::class);
        $this->regionFactory = $this->_objectManager->create(RegionFactory::class);
        $this->taxRatesProvider = $this->_objectManager->create(RatesProvider::class);

        $this->_generateTaxRates();
    }

    /**
     * Tests request of tax rates collection set.
     *
     * @param array $postData
     * @param int $itemsCount
<<<<<<< HEAD
     * @magentoDbIsolation enabled
     */
    #[DataProvider('ajaxActionDataProvider')]
=======
     * @dataProvider ajaxActionDataProvider
     * @magentoDbIsolation enabled
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testAjaxLoadRates($postData, $itemsCount)
    {
        $this->getRequest()->setPostValue($postData);
        $this->dispatch('backend/tax/rule/ajaxLoadRates');
        $jsonBody = $this->getResponse()->getBody();

        $response = Bootstrap::getObjectManager()->get(Data::class)
            ->jsonDecode($jsonBody);

        $this->assertArrayHasKey('success', $response);
        $this->assertTrue($response['success']);
        $this->assertArrayHasKey('errorMessage', $response);
        $this->assertEmpty($response['errorMessage']);
        $this->assertArrayHasKey('result', $response);
        $this->assertCount($itemsCount, $response['result']);
    }

    /**
     * Creates tax rates items in repository.
     */
    private function _generateTaxRates()
    {
        $ratesCount = $this->taxRatesProvider->getPageSize() + 1;
        for ($i = 0; $i <= $ratesCount; $i++) {
            $taxData = [
                'tax_country_id' => 'US',
                'tax_region_id' => '8',
                'rate' => '8.25',
                'code' => 'US-CA-*-Rate' . $i . rand(),
                'zip_is_range' => true,
                'zip_from' => 78765,
                'zip_to' => 78780,
            ];

            // Tax rate data object created
            $taxRate = $this->taxRateFactory->create();
            $this->dataObjectHelper->populateWithArray($taxRate, $taxData, TaxRateInterface::class);

            //Tax rate service call
            $this->rateRepository->save($taxRate);
        }
    }

    /**
     * Provides POST data
     *
     * @return array
     */
<<<<<<< HEAD
    public static function ajaxActionDataProvider()
=======
    public function ajaxActionDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        $taxRatesProvider = Bootstrap::getObjectManager()->create(RatesProvider::class);

        return [
            [['p' => 1], $taxRatesProvider->getPageSize()],
            [['p' => 1, 's' => 'no_such_code'], 0]
        ];
    }
}
