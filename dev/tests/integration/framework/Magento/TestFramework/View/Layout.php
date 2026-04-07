<?php
/**
<<<<<<< HEAD
 * Copyright 2014 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

namespace Magento\TestFramework\View;

class Layout extends \Magento\Framework\View\Layout
{
    /**
     * @var bool
     */
    protected $isCacheable = true;

    /**
     * @return bool
     */
    public function isCacheable()
    {
        return $this->isCacheable && parent::isCacheable();
    }

    /**
     * @param bool $isCacheable
     * @return void
     */
    public function setIsCacheable($isCacheable)
    {
        $this->isCacheable = $isCacheable;
    }
}
