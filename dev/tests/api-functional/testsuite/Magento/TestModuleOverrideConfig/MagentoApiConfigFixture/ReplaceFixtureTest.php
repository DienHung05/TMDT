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

namespace Magento\TestModuleOverrideConfig\MagentoApiConfigFixture;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;
use Magento\TestFramework\Config\Model\ConfigStorage;
use Magento\TestModuleOverrideConfig\AbstractOverridesTest;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * Class check that fixtures can be replaced using override config
 *
 * @magentoAppIsolation enabled
 */
class ReplaceFixtureTest extends AbstractOverridesTest
{
    /** @var ScopeConfigInterface */
    private $config;

    /** @var ConfigStorage */
    private $configStorage;

    /**
     * @inheritdoc
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->config = $this->objectManager->get(ScopeConfigInterface::class);
        $this->configStorage = $this->objectManager->get(ConfigStorage::class);
    }

    /**
     * Checks that fixture can be replaced in test class node
     *
     * @magentoConfigFixture default_store test_section/test_group/field_1 new_value
     *
     * @return void
     */
    public function testReplaceFixtureForClass(): void
    {
        $expectedValue = 'Overridden fixture for class';
        $value = $this->config->getValue('test_section/test_group/field_1', ScopeInterface::SCOPE_STORES, 'default');
        $this->assertEquals($expectedValue, $value);
        $this->assertEquals(
            $expectedValue,
            $this->configStorage->getValueFromDb(
                'test_section/test_group/field_1',
                ScopeInterface::SCOPE_STORES,
                'default'
            )
        );
    }

    /**
     * Checks that fixture can be replaced in method and data set nodes
     *
     * @magentoConfigFixture default_store test_section/test_group/field_1 new_value
<<<<<<< HEAD
     * @param string $expectedConfigValue
     * @return void
     */
    #[DataProvider('testDataProvider')]
=======
     *
     * @dataProvider testDataProvider
     *
     * @param string $expectedConfigValue
     * @return void
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testReplaceFixtureForMethod(string $expectedConfigValue): void
    {
        $value = $this->config->getValue('test_section/test_group/field_1', ScopeInterface::SCOPE_STORES, 'default');
        $this->assertEquals($expectedConfigValue, $value);
        $this->assertEquals(
            $expectedConfigValue,
            $this->configStorage->getValueFromDb(
                'test_section/test_group/field_1',
                ScopeInterface::SCOPE_STORES,
                'default'
            )
        );
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function testDataProvider(): array
    {
        return [
            'first_data_set' => [
                'Overridden fixture for method',
            ],
            'second_data_set' => [
                'Overridden fixture for data set',
=======
    public function testDataProvider(): array
    {
        return [
            'first_data_set' => [
                'expected_config_value' => 'Overridden fixture for method',
            ],
            'second_data_set' => [
                'expected_config_value' => 'Overridden fixture for data set',
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            ],
        ];
    }

    /**
     * Checks that website scope fixture can be replaced
     *
     * @magentoConfigFixture base_website test_section/test_group/field_1 new_value
     *
     * @return void
     */
    public function testReplaceWebsiteScopedFixture(): void
    {
        $expectedConfigValue = 'Overridden value for website scope';
        $value = $this->config->getValue('test_section/test_group/field_1', ScopeInterface::SCOPE_WEBSITES, 'base');
        $this->assertEquals($expectedConfigValue, $value);
        $this->assertEquals(
            $expectedConfigValue,
            $this->configStorage->getValueFromDb(
                'test_section/test_group/field_1',
                ScopeInterface::SCOPE_WEBSITE,
                'base'
            )
        );
    }

    /**
     * Checks that replace config from last loaded file will be applied
     *
     * @magentoConfigFixture default_store test_section/test_group/field_1 new_value
<<<<<<< HEAD
     * @param string $expectedConfigValue
     * @return void
     */
    #[DataProvider('configValuesProvider')]
=======
     *
     * @dataProvider configValuesProvider
     *
     * @param string $expectedConfigValue
     * @return void
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testReplaceFixtureViaThirdModule(string $expectedConfigValue): void
    {
        $value = $this->config->getValue('test_section/test_group/field_1', ScopeInterface::SCOPE_STORES, 'default');
        $this->assertEquals($expectedConfigValue, $value);
        $this->assertEquals(
            $expectedConfigValue,
            $this->configStorage->getValueFromDb(
                'test_section/test_group/field_1',
                ScopeInterface::SCOPE_STORES,
                'default'
            )
        );
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function configValuesProvider(): array
    {
        return [
            'first_data_set' => [
                'Overridden fixture for method from third module',
            ],
            'second_data_set' => [
                'Overridden fixture for data set from third module',
=======
    public function configValuesProvider(): array
    {
        return [
            'first_data_set' => [
                'expected_config_value' => 'Overridden fixture for method from third module',
            ],
            'second_data_set' => [
                'expected_config_value' => 'Overridden fixture for data set from third module',
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            ],
        ];
    }

    /**
     * Checks that fixture for global scope can be replaced
     *
     * @magentoConfigFixture test_section/test_group/field_1 new_value
     *
     * @return void
     */
    public function testReplaceDefaultConfig(): void
    {
        $expectedConfigValue = 'Overridden value for default scope';
        $value = $this->config->getValue('test_section/test_group/field_1');
        $this->assertEquals('Overridden value for default scope', $value);
        $this->assertEquals(
            $expectedConfigValue,
            $this->configStorage->getValueFromDb('test_section/test_group/field_1')
        );
    }
}
