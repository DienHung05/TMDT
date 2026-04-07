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

namespace Magento\Setup\Framework\Mail\Template;

use Magento\Framework\Mail\Template\TransportBuilder;
use Magento\Setup\Framework\Mail\TransportInterfaceMock;

/**
 * Mock for mail template transport builder.
 */
class TransportBuilderMock extends TransportBuilder
{
    /**
     * @inheritDoc
     */
    public function getTransport()
    {
        $this->prepareMessage();
        $this->reset();

        return new TransportInterfaceMock($this->message);
    }
}
