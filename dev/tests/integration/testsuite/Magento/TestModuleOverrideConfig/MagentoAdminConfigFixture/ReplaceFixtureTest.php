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

namespace Magento\TestModuleOverrideConfig\MagentoAdminConfigFixture;

use Magento\Framework\App\Config\ScopeConfigInterface;
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
     * Checks that fixture can be replaced in test class node
     *
     * @magentoAdminConfigFixture test_section/test_group/field_1 new_value
     *
     * @return void
     */
    public function testReplaceFixtureForClass(): void
    {
        $value = $this->config->getValue('test_section/test_group/field_1', ScopeConfigInterface::SCOPE_TYPE_DEFAULT);
        $this->assertEquals('Overridden admin config fixture for class', $value);
    }

    /**
     * Checks that fixture can be replaced in method and data set nodes
     *
     * @magentoAdminConfigFixture test_section/test_group/field_1 new_value
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
        $value = $this->config->getValue('test_section/test_group/field_1', ScopeConfigInterface::SCOPE_TYPE_DEFAULT);
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
                'Overridden admin config fixture for method',
            ],
            'second_data_set' => [
                'Overridden admin config fixture for data set',
=======
    public function testDataProvider(): array
    {
        return [
            'first_data_set' => [
                'expected_config_value' => 'Overridden admin config fixture for method',
            ],
            'second_data_set' => [
                'expected_config_value' => 'Overridden admin config fixture for data set',
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            ],
        ];
    }

    /**
     * Checks that replace config from last loaded file will be applied
     *
     * @magentoAdminConfigFixture test_section/test_group/field_1 new_value
     *
<<<<<<< HEAD
     * @param string $expectedConfigValue
     * @return void
     */
    #[DataProvider('configValuesDataProvider')]
=======
     * @dataProvider configValuesDataProvider
     *
     * @param string $expectedConfigValue
     * @return void
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testReplaceFixtureViaThirdModule(string $expectedConfigValue): void
    {
        $value = $this->config->getValue('test_section/test_group/field_1', ScopeConfigInterface::SCOPE_TYPE_DEFAULT);
        $this->assertEquals($expectedConfigValue, $value);
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function configValuesDataProvider(): array
    {
        return [
            'first_data_set' => [
                'Overridden admin config fixture for method from third module',
            ],
            'second_data_set' => [
                'Overridden admin config fixture for data set from third module',
=======
    public function configValuesDataProvider(): array
    {
        return [
            'first_data_set' => [
                'expected_config_value' => 'Overridden admin config fixture for method from third module',
            ],
            'second_data_set' => [
                'expected_config_value' => 'Overridden admin config fixture for data set from third module',
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            ],
        ];
    }
}
