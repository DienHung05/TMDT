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

namespace Magento\Setup\Model;

use Magento\Theme\Model\Theme\ThemeDependencyChecker;

/**
 * Class ThemeDependencyCheckerFactory creates instance of ThemeDependencyChecker
 */
class ThemeDependencyCheckerFactory
{
    /**
     * @var ObjectManagerProvider
     */
    private $objectManagerProvider;

    /**
     * Constructor
     *
     * @param ObjectManagerProvider $objectManagerProvider
     */
    public function __construct(ObjectManagerProvider $objectManagerProvider)
    {
        $this->objectManagerProvider = $objectManagerProvider;
    }

    /**
     * Creates ThemeDependencyChecker object
     *
     * @return ThemeDependencyChecker
     */
    public function create()
    {
        return $this->objectManagerProvider->get()->get(\Magento\Theme\Model\Theme\ThemeDependencyChecker::class);
    }
}
