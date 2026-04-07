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
 * Class checks that magentoAdminConfigFixtures can be added via override config
 *
 * @magentoAppIsolation enabled
 */
class AddFixtureTest extends AbstractOverridesTest
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
     * Checks that fixture added in test class node successfully applied
     *
     * @return void
     */
    public function testAddFixtureToClass(): void
    {
        $value = $this->config->getValue('test_section/test_group/field_1', ScopeConfigInterface::SCOPE_TYPE_DEFAULT);
        $this->assertEquals('overridden config fixture value for full class', $value);
    }

    /**
     * Checks that fixtures added in method and data set nodes successfully applied
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
    public function testAddFixtureToMethod(string $expectedConfigValue): void
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
            'first_data_set' => ['overridden config fixture value for method'],
            'second_data_set' => ['overridden config fixture value for data set']
=======
    public function testDataProvider(): array
    {
        return [
            'first_data_set' => ['expected_config_value' => 'overridden config fixture value for method'],
            'second_data_set' => ['expected_config_value' => 'overridden config fixture value for data set']
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        ];
    }
}
