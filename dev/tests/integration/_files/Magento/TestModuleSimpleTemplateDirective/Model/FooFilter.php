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
 * Filters a value for testing purposes
 */
class FooFilter implements \Magento\Framework\Filter\DirectiveProcessor\FilterInterface
{
    /**
     * @inheritDoc
     */
    public function filterValue(string $value, array $params): string
    {
        $arg1 = $params[0] ?? null;

        return strtoupper(strrev($value . $arg1 ?? ''));
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return 'foofilter';
    }
}
