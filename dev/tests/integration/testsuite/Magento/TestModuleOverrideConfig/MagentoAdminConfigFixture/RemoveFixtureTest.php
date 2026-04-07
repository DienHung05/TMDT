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
 * Class checks that magentoAdminConfigFixtures can be removed using override config
 *
 * @magentoAppIsolation enabled
 */
class RemoveFixtureTest extends AbstractOverridesTest
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
     * Checks that fixture can be removed in test class node
     *
     * @magentoAdminConfigFixture test_section/test_group/field_1 new_value
     *
     * @return void
     */
    public function testRemoveFixtureForClass(): void
    {
        $value = $this->config->getValue('test_section/test_group/field_1', ScopeConfigInterface::SCOPE_TYPE_DEFAULT);
        $this->assertEquals('1st field default value', $value);
    }

    /**
     * Checks that fixtures can be removed in method and data set nodes
     *
     * @magentoAdminConfigFixture test_section/test_group/field_2 new_value
     * @magentoAdminConfigFixture test_section/test_group/field_3 new_value
     *
<<<<<<< HEAD
=======
     * @dataProvider testDataProvider
     *
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @param string $expectedFirstValue
     * @param string $expectedSecondValue
     * @return void
     */
<<<<<<< HEAD
    #[DataProvider('datasetDataProvider')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testRemoveFixtureForMethod(string $expectedFirstValue, string $expectedSecondValue): void
    {
        $fistValue = $this->config->getValue(
            'test_section/test_group/field_2',
            ScopeConfigInterface::SCOPE_TYPE_DEFAULT
        );
        $secondValue = $this->config->getValue(
            'test_section/test_group/field_3',
            ScopeConfigInterface::SCOPE_TYPE_DEFAULT
        );
        $this->assertEquals($expectedFirstValue, $fistValue);
        $this->assertEquals($expectedSecondValue, $secondValue);
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function datasetDataProvider(): array
    {
        return [
            'first_data_set' => [
                '2nd field default value',
                'new_value',
            ],
            'second_data_set' => [
                '2nd field default value',
                '3rd field default value',
=======
    public function testDataProvider(): array
    {
        return [
            'first_data_set' => [
                'expected_first_config_value' => '2nd field default value',
                'expected_second_config_value' => 'new_value',
            ],
            'second_data_set' => [
                'expected_first_config_value' => '2nd field default value',
                'expected_second_config_value' => '3rd field default value',
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            ],
        ];
    }
}
