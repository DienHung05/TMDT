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
namespace Magento\Catalog\Model\AbstractModel;

abstract class Stub extends \Magento\Catalog\Model\AbstractModel implements \Magento\Catalog\Api\Data\ProductInterface
{
    /**
     * Retrieve Store Id
     *
     * @return int
     */
    public function getStoreId()
    {
        return $this->getData(\Magento\Catalog\Model\Product::STORE_ID);
    }

    /**
     * Set product store id
     *
     * @param int $storeId
     * @return $this
     */
    public function setStoreId($storeId)
    {
        return $this->setData(\Magento\Catalog\Model\Product::STORE_ID, $storeId);
    }
}
