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

namespace Magento\TestModuleOverrideConfig\MagentoConfigFixture;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;
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

    /**
     * @inheritdoc
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->config = $this->objectManager->get(ScopeConfigInterface::class);
    }

    /**
     * Checks that fixture can be replaced in global node
     *
     * @magentoConfigFixture current_store test_section/test_group/field_5 new_value
     *
     * @return void
     */
    public function testGloballyReplaceFixture(): void
    {
        $value = $this->config->getValue('test_section/test_group/field_5', ScopeInterface::SCOPE_STORES);
        $this->assertEquals('5th field globally replaced value', $value);
    }

    /**
     * Checks that fixture can be replaced in test class node
     *
     * @magentoConfigFixture current_store test_section/test_group/field_1 new_value
     *
     * @return void
     */
    public function testReplaceFixtureForClass(): void
    {
        $value = $this->config->getValue('test_section/test_group/field_1', ScopeInterface::SCOPE_STORES);
        $this->assertEquals('Overridden fixture for class', $value);
    }

    /**
     * Checks that fixture can be replaced in method and data set nodes
     *
     * @magentoConfigFixture current_store test_section/test_group/field_1 new_value
     *
<<<<<<< HEAD
     * @param string $expectedConfigValue
     * @return void
     */
    #[DataProvider('configDataProvider')]
=======
     * @dataProvider testDataProvider
     *
     * @param string $expectedConfigValue
     * @return void
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testReplaceFixtureForMethod(string $expectedConfigValue): void
    {
        $value = $this->config->getValue('test_section/test_group/field_1', ScopeInterface::SCOPE_STORES);
        $this->assertEquals($expectedConfigValue, $value);
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function configDataProvider(): array
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
     * @magentoConfigFixture current_website test_section/test_group/field_1 new_value
     *
     * @return void
     */
    public function testReplaceWebsiteScopedFixture(): void
    {
        $value = $this->config->getValue('test_section/test_group/field_1', ScopeInterface::SCOPE_WEBSITES);
        $this->assertEquals('Overridden value for website scope', $value);
    }

    /**
     * Checks that replace config from last loaded file will be applied
     *
     * @magentoConfigFixture current_store test_section/test_group/field_1 new_value
     *
<<<<<<< HEAD
     * @param string $expectedConfigValue
     * @return void
     */
    #[DataProvider('configValuesProvider')]
=======
     * @dataProvider configValuesProvider
     *
     * @param string $expectedConfigValue
     * @return void
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testReplaceFixtureViaThirdModule(string $expectedConfigValue): void
    {
        $value = $this->config->getValue('test_section/test_group/field_1', ScopeInterface::SCOPE_STORES);
        $this->assertEquals($expectedConfigValue, $value);
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
}
