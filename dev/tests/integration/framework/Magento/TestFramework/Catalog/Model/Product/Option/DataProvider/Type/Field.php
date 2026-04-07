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

namespace Magento\TestFramework\Catalog\Model\Product\Option\DataProvider\Type;

use Magento\Catalog\Api\Data\ProductCustomOptionInterface;
use Magento\TestFramework\Catalog\Model\Product\Option\DataProvider\Type\AbstractText;

/**
 * Data provider for custom options from text group with type "field".
 */
class Field extends AbstractText
{
    /**
     * @inheritdoc
     */
<<<<<<< HEAD
    protected static function getType(): string
=======
    protected function getType(): string
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return ProductCustomOptionInterface::OPTION_TYPE_FIELD;
    }
}
