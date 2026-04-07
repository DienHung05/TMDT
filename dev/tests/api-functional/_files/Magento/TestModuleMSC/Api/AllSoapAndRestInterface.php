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
namespace Magento\TestModuleMSC\Api;

interface AllSoapAndRestInterface
{
    /**
     * @param int $itemId
     * @return \Magento\TestModuleMSC\Api\Data\ItemInterface
     */
    public function item($itemId);

    /**
     * @param string $name
     * @return \Magento\TestModuleMSC\Api\Data\ItemInterface
     */
    public function create($name);

    /**
     * @param \Magento\TestModuleMSC\Api\Data\ItemInterface $entityItem
     * @return \Magento\TestModuleMSC\Api\Data\ItemInterface
     */
    public function update(\Magento\TestModuleMSC\Api\Data\ItemInterface $entityItem);

    /**
     * @return \Magento\TestModuleMSC\Api\Data\ItemInterface[]
     */
    public function items();

    /**
     * @param string $name
     * @return \Magento\TestModuleMSC\Api\Data\ItemInterface
     */
    public function testOptionalParam($name = null);

    /**
     * @param \Magento\TestModuleMSC\Api\Data\ItemInterface $entityItem
     * @return \Magento\TestModuleMSC\Api\Data\ItemInterface
     */
    public function itemAnyType(\Magento\TestModuleMSC\Api\Data\ItemInterface $entityItem);

    /**
     * @return \Magento\TestModuleMSC\Api\Data\ItemInterface
     */
    public function getPreconfiguredItem();
}
