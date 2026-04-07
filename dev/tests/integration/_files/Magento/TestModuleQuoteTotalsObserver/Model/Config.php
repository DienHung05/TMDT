<?php
/**
<<<<<<< HEAD
 * Copyright 2018 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

namespace Magento\TestModuleQuoteTotalsObserver\Model;

class Config
{
    private $active = false;

    public function enableObserver()
    {
        $this->active = true;
    }

    public function disableObserver()
    {
        $this->active = false;
    }

    public function isActive()
    {
        return $this->active;
    }
}
