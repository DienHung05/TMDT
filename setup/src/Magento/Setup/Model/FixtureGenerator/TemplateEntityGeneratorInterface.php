<?php
/**
<<<<<<< HEAD
 * Copyright 2017 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

namespace Magento\Setup\Model\FixtureGenerator;

/**
 * Generate entity template which is used for entity generation
 */
interface TemplateEntityGeneratorInterface
{
    /**
     * @return \Magento\Framework\Model\AbstractModel
     */
    public function generateEntity();
}
