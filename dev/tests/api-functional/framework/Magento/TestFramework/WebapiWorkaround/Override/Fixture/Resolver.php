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

namespace Magento\TestFramework\WebapiWorkaround\Override\Fixture;

use Magento\TestFramework\Annotation\AdminConfigFixture;
use Magento\TestFramework\Annotation\ApiConfigFixture;
use Magento\TestFramework\Annotation\ApiDataFixture;
use Magento\TestFramework\Annotation\DataFixture;
use Magento\TestFramework\Annotation\DataFixtureBeforeTransaction;
use Magento\TestFramework\Workaround\Override\Fixture\Applier\AdminConfigFixture as AdminConfigFixtureApplier;
use Magento\TestFramework\Workaround\Override\Fixture\Applier\ApplierInterface;
use Magento\TestFramework\Workaround\Override\Fixture\Applier\ConfigFixture as ConfigFixtureApplier;
use Magento\TestFramework\Workaround\Override\Fixture\Applier\DataFixture as DataFixtureApplier;
use Magento\TestFramework\Workaround\Override\Fixture\Resolver as IntegrationResolver;

/**
 * Class determines fixture applying according to configurations
 */
class Resolver extends IntegrationResolver
{
    /**
     * Get appropriate fixture applier according to fixture type
     *
     * @param string $fixtureType
     * @return ApplierInterface
     */
    protected function getApplierByFixtureType(string $fixtureType): ApplierInterface
    {
        switch ($fixtureType) {
            case ApiDataFixture::ANNOTATION:
            case DataFixture::ANNOTATION:
            case DataFixtureBeforeTransaction::ANNOTATION:
                $applier = $this->objectManager->get(DataFixtureApplier::class);
                break;
            case ApiConfigFixture::ANNOTATION:
                $applier = $this->objectManager->get(ConfigFixtureApplier::class);
                break;
            case AdminConfigFixture::ANNOTATION:
                $applier = $this->objectManager->get(AdminConfigFixtureApplier::class);
                break;
            default:
                throw new \InvalidArgumentException(sprintf('Unsupported fixture type %s provided', $fixtureType));
        }

        return $applier;
    }
}
