<?php
/**
<<<<<<< HEAD
 * Copyright 2018 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

namespace Magento\TestModuleGraphQlQueryExtension\Model\Resolver;

use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Query\ResolverInterface;

/**
 * Class IntegerList
 */
class IntegerList implements ResolverInterface
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
        if (!isset($value['item_id'])) {
            return null;
        }

        $itemId = $value['item_id'];

        $resultData = [$itemId + 1, $itemId + 2, $itemId + 3];
        return $resultData;
    }
}
