<?php
/**
<<<<<<< HEAD
 * Copyright 2020 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

declare(strict_types=1);

namespace Magento\PhpStan\Reflection\DataObject\Fixtures;

use Magento\Framework\DataObject;

class ClassWithIncorrectUsageOfDataObject
{
    /**
     * @var DataObject
     */
    private $container;

    /**
     * ClassWithIncorrectUsageOfDataObject constructor.
     */
    public function __construct()
    {
        $this->container = new DataObject();
    }

    /**
     * Do Magic Stuff.
     *
     * 'get' - args: $index[optional] - string|int, return: mixed;
     * 'set' - args: $value - mixed, return: self;
     * 'uns' - args: -, return: self;
     * 'has' - args: -, return: bool;
     */
    public function doStuff(): void
    {
        $this->container->getBaz(
            $this->container->unsFoo(
                $this->container->setBaz()
            )
        );
        $this->container->hasFoo(
            $this->container->setStuff()
        );

        $this->container->getSomething($this->container->hasFoo());
    }
}
