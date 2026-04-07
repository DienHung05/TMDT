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
namespace Magento\ImportExport\Controller\Adminhtml\Import;

use Magento\Framework\HTTP\Adapter\FileTransferFactory;

class HttpFactoryMock extends FileTransferFactory
{
    public function create(array $options = [])
    {
        return new \Magento\Framework\Validator\NotEmpty($options);
    }
}
