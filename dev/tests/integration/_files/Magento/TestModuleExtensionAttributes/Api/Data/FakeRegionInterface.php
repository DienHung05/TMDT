<?php
/**
<<<<<<< HEAD
 * Copyright 2018 Adobe
 * All Rights Reserved.
=======
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

namespace Magento\TestModuleExtensionAttributes\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;

/**
 * Customer address region interface.
 */
interface FakeRegionInterface extends ExtensibleDataInterface
{
    /**#@+
     * Constants for keys of data array
     */
    const REGION_CODE = 'region_code';
    const REGION = 'region';
    const REGION_ID = 'region_id';
    /**#@-*/

    /**
     * Get region code
     *
     * @return string
     */
    public function getRegionCode();

    /**
     * Get region
     *
     * @return string
     */
    public function getRegion();

    /**
     * Get region id
     *
     * @return int
     */
    public function getRegionId();

    /**
     * Retrieve existing extension attributes object or create a new one.
     *
     * @return \Magento\TestModuleExtensionAttributes\Api\Data\FakeRegionExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     *
     * @param \Magento\TestModuleExtensionAttributes\Api\Data\FakeRegionExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Magento\TestModuleExtensionAttributes\Api\Data\FakeRegionExtensionInterface $extensionAttributes
    );
}
