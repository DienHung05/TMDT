<?php
/**
 * Helper for EAV functionality in integration tests.
 *
<<<<<<< HEAD
 * Copyright 2013 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
namespace Magento\TestFramework\Helper;

class Eav
{
    /**
     * Set increment id prefix in entity model.
     *
     * @param string $entityType
     * @param string $prefix
     */
    public static function setIncrementIdPrefix($entityType, $prefix)
    {
        $website = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->get(
            \Magento\Store\Model\StoreManagerInterface::class
        )->getWebsite();
        $storeId = $website->getDefaultStore()->getId();
        $entityTypeModel = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
            \Magento\Eav\Model\Entity\Type::class
        )->loadByCode(
            $entityType
        );
        /** @var \Magento\Eav\Model\Entity\Store $entityStore */
        $entityStore = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
            \Magento\Eav\Model\Entity\Store::class
        )->loadByEntityStore(
            $entityTypeModel->getId(),
            $storeId
        );
        $entityStore->setEntityTypeId($entityTypeModel->getId());
        $entityStore->setStoreId($storeId);
        $entityStore->setIncrementPrefix($prefix);
        $entityStore->save();
    }
}
