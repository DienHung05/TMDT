<?php
/**
<<<<<<< HEAD
 * Copyright 2015 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
namespace Magento\TestModule5\Service\V2\Entity;

/**
 * Some Data Object short description.
 *
 * Data Object long
 * multi line description.
 */
class AllSoapAndRest extends \Magento\TestModule5\Service\V2\AllSoapAndRest
{
    /**
     * Price field
     */
    const PRICE = 'price';

    /**
     * @return int
     */
    public function getPrice()
    {
        return $this->_get(self::PRICE);
    }
}
