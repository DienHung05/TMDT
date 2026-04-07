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

namespace Magento\TestModuleSimpleTemplateDirective\Model;

use Magento\Framework\Filter\SimpleDirective\ProcessorInterface;
use Magento\Framework\Filter\Template;

/**
 * Handles the {{mydir}} directive
 */
class MyDirProcessor implements ProcessorInterface
{
    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return 'mydir';
    }

    /**
     * @inheritDoc
     */
    public function process(
        $value,
        array $parameters,
        ?string $html
    ): string {
        return $value . $parameters['param1'] . $html;
    }

    /**
     * @inheritDoc
     */
    public function getDefaultFilters(): ?array
    {
        return ['foofilter'];
    }
}
