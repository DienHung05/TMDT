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

namespace Magento\TestFramework\Workaround\Override\Fixture\Applier;

/**
 * Class represent admin config fixtures applying logic
 */
class AdminConfigFixture extends ConfigFixture
{
    /**
     * @inheritdoc
     */
    protected function isFixtureMatch(array $attributes, string $currentFixture): bool
    {
        $pattern = sprintf('/\s?%s\s*/i', str_replace('/', '\/', $attributes['path']));

        return (bool)preg_match($pattern, $currentFixture);
    }

    /**
     * @inheritdoc
     */
    protected function initConfigFixture(array $attributes): string
    {
        $value = !empty($attributes['newValue']) ? $attributes['newValue'] : $attributes['value'];

        return sprintf('%s %s', $attributes['path'], $value);
    }
}
