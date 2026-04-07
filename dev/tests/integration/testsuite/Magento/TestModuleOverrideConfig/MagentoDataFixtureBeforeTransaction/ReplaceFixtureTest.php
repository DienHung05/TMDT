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

namespace Magento\TestModuleOverrideConfig\MagentoDataFixtureBeforeTransaction;

use Magento\TestModuleOverrideConfig\AbstractOverridesTest;
use Magento\TestModuleOverrideConfig\Model\FixtureCallStorage;

/**
 * Class check that magentoDataFixturesBeforeTransaction can be replaced using override config
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
     * Checks that fixture can be replaced in global node
     *
     * @magentoDataFixtureBeforeTransaction Magento/TestModuleOverrideConfig/_files/fixture2_first_module.php
     *
     * @return void
     */
    public function testReplaceFixture(): void
    {
        $this->assertEquals(0, $this->fixtureCallStorage->getFixturesCount('fixture2_first_module.php'));
        $this->assertEquals(1, $this->fixtureCallStorage->getFixturesCount('fixture3_first_module.php'));
    }
}
