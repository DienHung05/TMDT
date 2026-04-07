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

namespace Magento\SomeModule\Model;

use Magento\SomeModule\DummyFactory;

class StubWithAnonymousClass
{
    /**
     * @var DummyFactory
     */
    private $factory;

    public function __construct(DummyFactory $factory)
    {
        $this->factory = $factory;
    }

    public function getSerializable(): \JsonSerializable
    {
        return new class() implements \JsonSerializable {
            /**
             * @inheritDoc
             */
            public function jsonSerialize()
            {
                return [1, 2, 3];
            }
        };
    }
}
