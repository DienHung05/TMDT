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

class NestedDataObjectRequest extends \Magento\Framework\Api\AbstractExtensibleObject
{
    /**
     * @return \Magento\TestModule4\Service\V1\Entity\DataObjectRequest
     */
    public function getDetails()
    {
        return $this->_get('details');
    }

    /**
     * @param \Magento\TestModule4\Service\V1\Entity\DataObjectRequest $details
     * @return $this
     */
<<<<<<< HEAD
    public function setDetails(?\Magento\TestModule4\Service\V1\Entity\DataObjectRequest $details = null)
=======
    public function setDetails(\Magento\TestModule4\Service\V1\Entity\DataObjectRequest $details = null)
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return $this->setData('details', $details);
    }
}
