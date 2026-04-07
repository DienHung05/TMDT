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

namespace Magento\Customer\Model;

class FileResolverStub implements \Magento\Framework\Config\FileResolverInterface
{
    /**
     * {@inheritdoc}
     */
    public function get($filename, $scope)
    {
        $objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();
        $fileReadFactory = $objectManager->create(\Magento\Framework\Filesystem\File\ReadFactory::class);
        $paths = [realpath(__DIR__ . '/../_files/etc/') . '/extension_attributes.xml'];
        return new \Magento\Framework\Config\FileIterator($fileReadFactory, $paths);
    }
}
