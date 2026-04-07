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

namespace Magento\TestModule4\Service\V1\Entity;

/**
 * Class ExtensibleRequest
 *
 * @method \Magento\TestModule4\Service\V1\Entity\ExtensibleRequestExtensionInterface getExtensionAttributes()
 */
class ExtensibleRequest extends \Magento\Framework\Model\AbstractExtensibleModel implements ExtensibleRequestInterface
{
    public function getName()
    {
        return $this->getData("name");
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        return $this->setData("name", $name);
    }

    /**
     * @param int $entityId
     * @return $this
     */
    public function setEntityId($entityId)
    {
        return $this->setData("entity_id", $entityId);
    }
}
