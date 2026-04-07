<?php
/**
<<<<<<< HEAD
 * Copyright 2017 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

namespace Magento\TestModuleGraphQlQuery\Model\Resolver;

use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Query\ResolverInterface;

/**
 * Resolver for Item
 */
class Item implements ResolverInterface
{
    /**
     * @inheritdoc
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
        $id = 0;
        foreach ($args as $key => $argValue) {
            if ($key === "id") {
                $id = (int)$argValue;
            }
        }
        $itemData = [
            'item_id' => $id,
            'name' => "itemName"
        ];
        return $itemData;
    }
}
