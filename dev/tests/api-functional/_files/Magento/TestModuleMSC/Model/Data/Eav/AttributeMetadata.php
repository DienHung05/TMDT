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

namespace Magento\TestModuleMSC\Model\Data\Eav;

use Magento\Framework\Api\AbstractExtensibleObject;
use Magento\Framework\Api\MetadataObjectInterface;

/**
 * Class AttributeMetadata
 */
class AttributeMetadata extends AbstractExtensibleObject implements MetadataObjectInterface
{
    /**#@+
     * Constants used as keys into $_data
     */
    const ATTRIBUTE_ID = 'attribute_id';

    const ATTRIBUTE_CODE = 'attribute_code';
    /**#@-*/

    /**
     * Retrieve id of the attribute.
     *
     * @return string|null
     */
    public function getAttributeId()
    {
        return $this->_get(self::ATTRIBUTE_ID);
    }

    /**
     * Set id of the attribute.
     *
     * @param string $attributeId
     * @return $this
     */
    public function setAttributeId($attributeId)
    {
        return $this->setData(self::ATTRIBUTE_ID, $attributeId);
    }

    /**
     * Retrieve code of the attribute.
     *
     * @return string|null
     */
    public function getAttributeCode()
    {
        return $this->_get(self::ATTRIBUTE_CODE);
    }

    /**
     * Set code of the attribute.
     *
     * @param string $attributeCode
     * @return $this
     */
    public function setAttributeCode($attributeCode)
    {
        return $this->setData(self::ATTRIBUTE_CODE, $attributeCode);
    }
}
