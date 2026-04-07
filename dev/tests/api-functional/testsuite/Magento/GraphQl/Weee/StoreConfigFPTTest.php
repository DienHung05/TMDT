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

namespace Magento\GraphQl\Weee;

<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\App\Config\Storage\WriterInterface;
use Magento\Framework\ObjectManager\ObjectManager;
use Magento\TestFramework\Helper\Bootstrap;
use Magento\TestFramework\TestCase\GraphQlAbstract;
use Magento\Weee\Model\Tax as WeeeDisplayConfig;
use Magento\Weee\Model\Config;

/**
 * Test for storeConfig FPT config values
 */
class StoreConfigFPTTest extends GraphQlAbstract
{
    /** @var ObjectManager $objectManager */
    private $objectManager;

    /**
     * @inheritdoc
     */
    protected function setUp(): void
    {
        $this->objectManager = Bootstrap::getObjectManager();
    }

    /**
     * FPT All Display settings
     *
     * @param array $weeTaxSettings
     * @param string $displayValue
     * @return void
<<<<<<< HEAD
     */
    #[DataProvider('sameFPTDisplaySettingsProvider')]
=======
     *
     * @dataProvider sameFPTDisplaySettingsProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testSameFPTDisplaySettings(array $weeTaxSettings, $displayValue)
    {
       /** @var WriterInterface $configWriter */
        $configWriter = $this->objectManager->get(WriterInterface::class);

        foreach ($weeTaxSettings as $path => $value) {
            $configWriter->save($path, $value);
        }

        /** @var ScopeConfigInterface $scopeConfig */
        $scopeConfig = $this->objectManager->get(ScopeConfigInterface::class);
        $scopeConfig->clean();

        $query = $this->getStoreConfigQuery();
        $result = $this->graphQlQuery($query);
        $this->assertArrayNotHasKey('errors', $result);

        $this->assertNotEmpty($result['storeConfig']['product_fixed_product_tax_display_setting']);
        $this->assertNotEmpty($result['storeConfig']['category_fixed_product_tax_display_setting']);
        $this->assertNotEmpty($result['storeConfig']['sales_fixed_product_tax_display_setting']);

        $this->assertEquals($displayValue, $result['storeConfig']['product_fixed_product_tax_display_setting']);
        $this->assertEquals($displayValue, $result['storeConfig']['category_fixed_product_tax_display_setting']);
        $this->assertEquals($displayValue, $result['storeConfig']['sales_fixed_product_tax_display_setting']);
    }

    /**
     * SameFPTDisplaySettings settings data provider
     *
     * @return array
     */
<<<<<<< HEAD
    public static function sameFPTDisplaySettingsProvider()
    {
        return [
            [
                'weeTaxSettings' => [
=======
    public function sameFPTDisplaySettingsProvider()
    {
        return [
            [
                'weeTaxSettingsDisplayIncludedOnly' => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    'tax/weee/enable' => '1',
                    Config::XML_PATH_FPT_DISPLAY_PRODUCT_VIEW => WeeeDisplayConfig::DISPLAY_INCL,
                    Config::XML_PATH_FPT_DISPLAY_PRODUCT_LIST => WeeeDisplayConfig::DISPLAY_INCL,
                    Config::XML_PATH_FPT_DISPLAY_SALES => WeeeDisplayConfig::DISPLAY_INCL,
                ],
                'displayValue' => 'INCLUDE_FPT_WITHOUT_DETAILS',
            ],
            [
<<<<<<< HEAD
                'weeTaxSettings' => [
=======
                'weeTaxSettingsDisplayIncludedAndDescription' => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    'tax/weee/enable' => '1',
                    Config::XML_PATH_FPT_DISPLAY_PRODUCT_VIEW => WeeeDisplayConfig::DISPLAY_INCL_DESCR,
                    Config::XML_PATH_FPT_DISPLAY_PRODUCT_LIST => WeeeDisplayConfig::DISPLAY_INCL_DESCR,
                    Config::XML_PATH_FPT_DISPLAY_SALES => WeeeDisplayConfig::DISPLAY_INCL_DESCR,
                ],
                'displayValue' => 'INCLUDE_FPT_WITH_DETAILS',
            ],
            [
<<<<<<< HEAD
                'weeTaxSettings' => [
=======
                'weeTaxSettingsDisplayIncludedAndExcludedAndDescription' => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    'tax/weee/enable' => '1',
                    Config::XML_PATH_FPT_DISPLAY_PRODUCT_VIEW => WeeeDisplayConfig::DISPLAY_EXCL_DESCR_INCL,
                    Config::XML_PATH_FPT_DISPLAY_PRODUCT_LIST => WeeeDisplayConfig::DISPLAY_EXCL_DESCR_INCL,
                    Config::XML_PATH_FPT_DISPLAY_SALES => WeeeDisplayConfig::DISPLAY_EXCL_DESCR_INCL,
                ],
                'displayValue' => 'EXCLUDE_FPT_AND_INCLUDE_WITH_DETAILS',
            ],
            [
<<<<<<< HEAD
                'weeTaxSettings' => [
=======
                'weeTaxSettingsDisplayExcluded' => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    'tax/weee/enable' => '1',
                    Config::XML_PATH_FPT_DISPLAY_PRODUCT_VIEW => WeeeDisplayConfig::DISPLAY_EXCL,
                    Config::XML_PATH_FPT_DISPLAY_PRODUCT_LIST => WeeeDisplayConfig::DISPLAY_EXCL,
                    Config::XML_PATH_FPT_DISPLAY_SALES => WeeeDisplayConfig::DISPLAY_EXCL,
                ],
                'displayValue' => 'EXCLUDE_FPT_WITHOUT_DETAILS',
            ],
            [
<<<<<<< HEAD
                'weeTaxSettings' => [
=======
                'weeTaxSettingsDisplayExcluded' => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    'tax/weee/enable' => '0',
                    Config::XML_PATH_FPT_DISPLAY_PRODUCT_VIEW => WeeeDisplayConfig::DISPLAY_EXCL,
                    Config::XML_PATH_FPT_DISPLAY_PRODUCT_LIST => WeeeDisplayConfig::DISPLAY_EXCL,
                    Config::XML_PATH_FPT_DISPLAY_SALES => WeeeDisplayConfig::DISPLAY_EXCL,
                ],
                'displayValue' => 'FPT_DISABLED',
            ],
        ];
    }

    /**
     * FPT Display setting shuffled
     *
     * @param array $weeTaxSettings
     * @return void
<<<<<<< HEAD
     */
    #[DataProvider('differentFPTDisplaySettingsProvider')]
=======
     *
     * @dataProvider differentFPTDisplaySettingsProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testDifferentFPTDisplaySettings(array $weeTaxSettings)
    {
        /** @var WriterInterface $configWriter */
        $configWriter = $this->objectManager->get(WriterInterface::class);

        foreach ($weeTaxSettings as $path => $value) {
            $configWriter->save($path, $value);
        }

        /** @var ScopeConfigInterface $scopeConfig */
        $scopeConfig = $this->objectManager->get(ScopeConfigInterface::class);
        $scopeConfig->clean();

        $query = $this->getStoreConfigQuery();
        $result = $this->graphQlQuery($query);
        $this->assertArrayNotHasKey('errors', $result);

        $this->assertNotEmpty($result['storeConfig']['product_fixed_product_tax_display_setting']);
        $this->assertNotEmpty($result['storeConfig']['category_fixed_product_tax_display_setting']);
        $this->assertNotEmpty($result['storeConfig']['sales_fixed_product_tax_display_setting']);

        $this->assertEquals(
            'INCLUDE_FPT_WITHOUT_DETAILS',
            $result['storeConfig']['product_fixed_product_tax_display_setting']
        );
        $this->assertEquals(
            'INCLUDE_FPT_WITH_DETAILS',
            $result['storeConfig']['category_fixed_product_tax_display_setting']
        );
        $this->assertEquals(
            'EXCLUDE_FPT_AND_INCLUDE_WITH_DETAILS',
            $result['storeConfig']['sales_fixed_product_tax_display_setting']
        );
    }

    /**
     * DifferentFPTDisplaySettings settings data provider
     *
     * @return array
     */
<<<<<<< HEAD
    public static function differentFPTDisplaySettingsProvider()
    {
        return [
            [
                'weeTaxSettings' => [
=======
    public function differentFPTDisplaySettingsProvider()
    {
        return [
            [
                'weeTaxSettingsDisplay' => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    'tax/weee/enable' => '1',
                    Config::XML_PATH_FPT_DISPLAY_PRODUCT_VIEW => WeeeDisplayConfig::DISPLAY_INCL,
                    Config::XML_PATH_FPT_DISPLAY_PRODUCT_LIST => WeeeDisplayConfig::DISPLAY_INCL_DESCR,
                    Config::XML_PATH_FPT_DISPLAY_SALES => WeeeDisplayConfig::DISPLAY_EXCL_DESCR_INCL,
                ]
            ],
        ];
    }

    /**
     * Get GraphQl query to fetch storeConfig and FPT serttings
     *
     * @return string
     */
    private function getStoreConfigQuery(): string
    {
        return <<<QUERY
{
    storeConfig {
          product_fixed_product_tax_display_setting
          category_fixed_product_tax_display_setting
          sales_fixed_product_tax_display_setting
    }
}
QUERY;
    }
}
