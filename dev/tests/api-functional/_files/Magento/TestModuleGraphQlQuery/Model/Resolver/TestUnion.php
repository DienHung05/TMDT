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

namespace Magento\TestModuleGraphQlQuery\Model\Resolver;

use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;

/**
 * Resolver for Union type TestUnion
 */
class TestUnion implements ResolverInterface
{
    /**
     * @inheritDoc
     */
    public function resolve(
        Field $field,
        $context,
        ResolveInfo $info,
<<<<<<< HEAD
        ?array $value = null,
        ?array $args = null
=======
        array $value = null,
        array $args = null
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    ) {
        return [
            'custom_name1' => 'custom_name1_value',
            'custom_name2' => 'custom_name2_value',
        ];
    }
}
