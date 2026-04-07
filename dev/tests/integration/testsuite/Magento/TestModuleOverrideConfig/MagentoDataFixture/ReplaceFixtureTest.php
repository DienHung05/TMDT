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

namespace Magento\TestModuleOverrideConfig\MagentoDataFixture;

use Magento\TestModuleOverrideConfig\AbstractOverridesTest;
use Magento\TestModuleOverrideConfig\Model\FixtureCallStorage;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * Class check that magentoDataFixtures can be replaced using override config
 *
 * @magentoAppIsolation enabled
 */
class ReplaceFixtureTest extends AbstractOverridesTest
{
    /** @var FixtureCallStorage */
    private $fixtureCallStorage;

    /**
     * @inheritdoc
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->fixtureCallStorage = $this->objectManager->get(FixtureCallStorage::class);
    }

    /**
     * Checks that fixture can be replaced in test class node
     *
     * @magentoDataFixture Magento/TestModuleOverrideConfig/_files/fixture1_first_module.php
     *
     * @return void
     */
    public function testReplaceFixtureForClass(): void
    {
        $this->assertEquals(0, $this->fixtureCallStorage->getFixturesCount('fixture1_first_module.php'));
        $this->assertEquals(1, $this->fixtureCallStorage->getFixturesCount('fixture1_second_module.php'));
    }

    /**
     * Checks that fixture can be replaced in method and data set nodes
     *
<<<<<<< HEAD
=======
     * @dataProvider replacedFixturesProvider
     *
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @magentoDataFixture Magento/TestModuleOverrideConfig/_files/fixture1_first_module.php
     *
     * @param string $fixture
     * @return void
     */
<<<<<<< HEAD
    #[DataProvider('replacedFixturesProvider')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testReplaceFixturesForMethod(string $fixture): void
    {
        $this->assertEquals(0, $this->fixtureCallStorage->getFixturesCount('fixture1_first_module.php'));
        $this->assertEquals(1, $this->fixtureCallStorage->getFixturesCount($fixture));
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function replacedFixturesProvider(): array
=======
    public function replacedFixturesProvider(): array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            'first_data_set' => [
                'fixture2_second_module.php',
            ],
            'second_data_set' => [
                'fixture3_second_module.php',
            ],
        ];
    }

    /**
     * Checks that replace config from last loaded file will be applied
     *
<<<<<<< HEAD
=======
     * @dataProvider dataProvider
     *
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @magentoDataFixture Magento/TestModuleOverrideConfig/_files/fixture1_first_module.php
     *
     * @param string $fixture
     * @return void
     */
<<<<<<< HEAD
    #[DataProvider('dataProvider')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testReplaceFixtureViaThirdModule(string $fixture): void
    {
        $this->assertEquals(0, $this->fixtureCallStorage->getFixturesCount('fixture1_first_module.php'));
        $this->assertEquals(1, $this->fixtureCallStorage->getFixturesCount($fixture));
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function dataProvider(): array
=======
    public function dataProvider(): array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            'first_data_set' => [
                'fixture2_second_module.php',
            ],
            'second_data_set' => [
                'fixture3_second_module.php',
            ],
        ];
    }

    /**
     * Checks that fixture required in the another fixture can be replaced using override
     *
     * @magentoDataFixture Magento/TestModuleOverrideConfig2/_files/fixture_with_required_fixture.php
     *
     * @return void
     */
    public function testReplaceRequiredFixture(): void
    {
        $this->assertEquals(1, $this->fixtureCallStorage->getFixturesCount('fixture_with_required_fixture.php'));
        $this->assertEquals(1, $this->fixtureCallStorage->getFixturesCount('fixture2_second_module.php'));
        $this->assertEmpty($this->fixtureCallStorage->getFixturesCount('fixture3_second_module.php'));
    }

    /**
     * Checks that fixture required in the another fixture will be replaced according to last loaded override
     *
     * @magentoDataFixture Magento/TestModuleOverrideConfig2/_files/fixture_with_required_fixture.php
     *
     * @return void
     */
    public function testReplaceRequiredFixtureViaThirdModule(): void
    {
        $this->assertEquals(1, $this->fixtureCallStorage->getFixturesCount('fixture_with_required_fixture.php'));
        $this->assertEquals(1, $this->fixtureCallStorage->getFixturesCount('fixture1_third_module.php'));
        $this->assertEmpty($this->fixtureCallStorage->getFixturesCount('fixture2_second_module.php'));
        $this->assertEmpty($this->fixtureCallStorage->getFixturesCount('fixture3_second_module.php'));
    }
}
